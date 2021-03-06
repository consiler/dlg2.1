<?php

/**
 * CPAC_Column_Custom_Field
 *
 * @since 1.0
 */
class CPAC_Column_Custom_Field extends CPAC_Column {

	private $user_settings;

	function __construct( $storage_model ) {

		// define properties
		$this->properties['type']	 		= 'column-meta';
		$this->properties['label']	 		= __( 'Custom Field', 'cpac' );
		$this->properties['classes']		= 'cpac-box-metafield';
		$this->properties['is_cloneable']	= true;

		// define additional options
		$this->options['field']				= '';
		$this->options['field_type']		= '';
		$this->options['before']			= '';
		$this->options['after']				= '';

		$this->options['image_size']		= '';
		$this->options['image_size_w']		= 80;
		$this->options['image_size_h']		= 80;

		$this->options['excerpt_length']	= 15;

		$this->options['date_format']		= '';

		// for retireving sorting preference
		$this->user_settings = get_option( 'cpac_general_options' );

		// call contruct
		parent::__construct( $storage_model );
	}

	/**
	 * @see CPAC_Column::sanitize_options()
	 * @since 1.0
	 */
	function sanitize_options( $options ) {

		if ( ! empty( $options['before'] ) ) {
			$options['before'] = trim( $options['before'] );
		}

		if ( ! empty( $options['after'] ) ) {
			$options['after'] = trim( $options['after'] );
		}

		if ( empty( $options['date_format'] ) ) {
			$options['date_format'] = get_option( 'date_format' );
		}

		return $options;
	}

	/**
	 * Get Custom FieldType Options - Value method
	 *
	 * @since 1.0
	 *
	 * @return array Customfield types.
	 */
	public function get_custom_field_types() {

		$custom_field_types = array(
			''				=> __( 'Default'),
			'image'			=> __( 'Image', 'cpac' ),
			'library_id'	=> __( 'Media Library', 'cpac' ),
			'excerpt'		=> __( 'Excerpt'),
			'array'			=> __( 'Multiple Values', 'cpac' ),
			'numeric'		=> __( 'Numeric', 'cpac' ),
			'date'			=> __( 'Date', 'cpac' ),
			'title_by_id'	=> __( 'Post Title (Post ID\'s)', 'cpac' ),
			'user_by_id'	=> __( 'Username (User ID\'s)', 'cpac' ),
			'checkmark'		=> __( 'Checkmark (true/false)', 'cpac' ),
			'color'			=> __( 'Color', 'cpac' ),
		);

		return apply_filters( 'cpac_custom_field_types', $custom_field_types );
	}

	/**
	 * Get Title by ID - Value method
	 *
	 * @since 1.0
	 *
	 * @param string $meta
	 * @return string Titles
	 */
	private function get_titles_by_id( $meta ) {

		//remove white spaces and strip tags
		$meta = $this->strip_trim( str_replace( ' ','', $meta ) );

		// var
		$ids = $titles = array();

		// check for multiple id's
		if ( strpos( $meta, ',' ) !== false )
			$ids = explode( ',', $meta );
		elseif ( is_numeric( $meta ) )
			$ids[] = $meta;

		// display title with link
		if ( $ids && is_array( $ids ) ) {
			foreach ( $ids as $id ) {
				$title = is_numeric( $id ) ? get_the_title( $id ) : '';
				$link  = get_edit_post_link( $id );
				if ( $title )
					$titles[] = $link ? "<a href='{$link}'>{$title}</a>" : $title;
			}
		}

		return implode('<span class="cpac-divider"></span>', $titles);
	}

	/**
	 * Get Users by ID - Value method
	 *
	 * @since 1.0
	 *
	 * @param string $meta
	 * @return string Users
	 */
	private function get_users_by_id( $meta )	{

		//remove white spaces and strip tags
		$meta = $this->strip_trim( str_replace( ' ', '', $meta ) );

		// var
		$ids = $names = array();

		// check for multiple id's
		if ( strpos( $meta, ',' ) !== false ) {
			$ids = explode( ',',$meta );
		}
		elseif ( is_numeric( $meta ) ) {
			$ids[] = $meta;
		}

		// display username
		if ( $ids && is_array( $ids ) ) {
			foreach ( $ids as $id ) {
				if ( ! is_numeric( $id ) )
					continue;

				$userdata = get_userdata( $id );
				if ( is_object( $userdata ) && ! empty( $userdata->display_name ) ) {

					// link
					$link = get_edit_user_link( $id );

					$names[] = $link ? "<a href='{$link}'>{$userdata->display_name}</a>" : $userdata->display_name;
				}
			}
		}

		return implode( '<span class="cpac-divider"></span>', $names );
	}

	/**
	 * Get Users by ID - Value method
	 *
	 * @since 2.0.0
	 *
	 * @param string $meta
	 * @return string Users
	 */
	function get_value_by_meta( $meta ) {

		switch ( $this->options->field_type ) :

			case "image" :
			case "library_id" :
				$meta = implode( $this->get_thumbnails( $meta, array(
					'image_size'	=> $this->options->image_size,
					'image_size_w'	=> $this->options->image_size_w,
					'image_size_h'	=> $this->options->image_size_h,
				)));
				break;

			case "excerpt" :
				$meta = $this->get_shortened_string( $meta, $this->options->excerpt_length );
				break;

			case "date" :
				$meta = $this->get_date( $meta, $this->options->date_format );
				break;

			case "title_by_id" :
				if ( $titles = $this->get_titles_by_id( $meta ) )
					$meta = $titles;
				break;

			case "user_by_id" :
				if ( $names = $this->get_users_by_id( $meta ) )
					$meta = $names;
				break;

			case "checkmark" :
				$checkmark = $this->get_asset_image( 'checkmark.png' );

				if ( empty($meta) || 'false' === $meta || '0' === $meta ) {
					$checkmark = '';
				}

				$meta = $checkmark;
				break;

			case "color" :
				if ( ! empty( $meta ) ) {
					$text_color = $this->get_text_color( $meta );
					$meta = "<div class='cpac-color'><span style='background-color:{$meta};color:{$text_color}'>{$meta}</span></div>";
				}
				break;

		endswitch;

		return $meta;
	}

	/**
	 * Determines text color absed on bakground coloring.
	 *
	 * @since 1.0
	 */
	function get_text_color( $bg_color ) {

		$rgb = $this->hex2rgb( $bg_color );

		return $rgb && ( ( $rgb[0]*0.299 + $rgb[1]*0.587 + $rgb[2]*0.114 ) < 186 ) ? '#ffffff' : '#333333';
	}

	/**
	 * Convert hex to rgb
	 *
	 * @since 1.0
	 */
	function hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);

		return $rgb;
	}

	/**
	 * Get meta by ID
	 *
	 * @since 1.0
	 *
	 * @param int $id ID
	 * @return string Meta Value
	 */
	public function get_meta_by_id( $id ) {

		// rename hidden custom fields to their original name
		$field = substr( $this->options->field, 0, 10 ) == "cpachidden" ? str_replace( 'cpachidden', '', $this->options->field ) : $this->options->field;

		// get metadata
		$meta = get_metadata( $this->storage_model->type, $id, $field, true );

		// try to turn any array into a comma seperated string for further use
		if ( ( 'array' == $this->options->field_type && is_array( $meta ) ) || is_array( $meta ) ) {
			$meta = $this->recursive_implode( ', ', $meta );
		}

		if ( ! is_string( $meta ) )
			return false;

		return $meta;
	}

	/**
	 * @see CPAC_Column::get_value()
	 * @since 1.0
	 */
	function get_value( $id ) {

		if ( ! $meta = $this->get_meta_by_id( $id ) )
			return false;

		// get value by meta
		$meta = $this->get_value_by_meta( $meta );

		// add before and after string
		if ( $meta ) {
			$meta = "{$this->options->before}{$meta}{$this->options->after}";
		}

		return $meta;
	}

	/**
	 * @see CPAC_Column::display_settings()
	 * @since 1.0
	 */
	function display_settings() {

		$show_hidden_meta = isset( $this->user_settings['show_hidden'] ) && '1' === $this->user_settings['show_hidden'] ? true : false;

		?>

		<tr class="column_field">
			<?php $this->label_view( __( "Custom Field", 'cpac' ), __( "Select your custom field.", 'cpac' ), 'field' ); ?>
			<td class="input">

				<?php if ( $meta_keys = $this->storage_model->get_meta_keys( $show_hidden_meta ) ) : ?>
				<select name="<?php $this->attr_name( 'field' ); ?>" id="<?php $this->attr_id( 'field' ); ?>">
				<?php foreach ( $meta_keys as $field ) : ?>
					<option value="<?php echo $field ?>"<?php selected( $field, $this->options->field ) ?>><?php echo substr( $field, 0, 10 ) == "cpachidden" ? str_replace( 'cpachidden','', $field ) : $field; ?></option>
				<?php endforeach; ?>
				</select>
				<?php else : ?>
					<?php _e( 'No custom fields available.', 'cpac' ); ?>
				<?php endif; ?>

			</td>
		</tr>

		<tr class="column_field_type">
			<?php $this->label_view( __( "Field Type", 'cpac' ), __( 'This will determine how the value will be displayed.', 'cpac' ), 'field_type' ); ?>
			<td class="input">
				<select name="<?php $this->attr_name( 'field_type' ); ?>" id="<?php $this->attr_id( 'field_type' ); ?>">
				<?php foreach ( $this->get_custom_field_types() as $fieldkey => $fieldtype ) : ?>
					<option value="<?php echo $fieldkey ?>"<?php selected( $fieldkey, $this->options->field_type ) ?>><?php echo $fieldtype; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
		</tr>

		<?php

		/**
		 * Add Date Format
		 *
		 */
		$is_hidden = in_array( $this->options->field_type, array( 'date' ) ) ? false : true;

		$this->display_field_date_format( $is_hidden );

		/**
		 * Add Preview size
		 *
		 */
		$is_hidden = in_array( $this->options->field_type, array( 'image', 'library_id' ) ) ? false : true;

		$this->display_field_preview_size( $is_hidden );

		/**
		 * Add Excerpt length
		 *
		 */
		$is_hidden = in_array( $this->options->field_type, array( 'excerpt' ) ) ? false : true;

		$this->display_field_excerpt_length( $is_hidden );

		/**
		 * Before / After
		 *
		 */
		?>

		<tr class="column_before">
			<?php $this->label_view( __( "Before", 'cpac' ), __( 'This text will appear before the custom field value.', 'cpac' ), 'before' ); ?>
			<td class="input">
				<input type="text" class="cpac-before" name="<?php $this->attr_name( 'before' ); ?>" id="<?php $this->attr_id( 'before' ); ?>" value="<?php echo $this->options->before; ?>"/>
			</td>
		</tr>
		<tr class="column_after">
			<?php $this->label_view( __( "After", 'cpac' ), __( 'This text will appear after the custom field value.', 'cpac' ), 'after' ); ?>
			<td class="input">
				<input type="text" class="cpac-after" name="<?php $this->attr_name( 'after' ); ?>" id="<?php $this->attr_id( 'after' ); ?>" value="<?php echo $this->options->after; ?>"/>
			</td>
		</tr>
		<?php

	}
}