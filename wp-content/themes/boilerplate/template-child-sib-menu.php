<?php
              $all_pages = get_pages();
              $children = get_page_children(get_the_ID(), $all_pages);
              $children_count = 0;
              foreach($children as $child)
              {
                $children_count++;
                $child_href = get_page_link($child->ID);
                $child_title = $child->post_title;
                ?>
                  <li><a href="<?php echo $child_href; ?>"><?php echo $child_title; ?></a></li>
                <?php
              }
              if(!$children_count){
                $all_pages = get_pages();
                $children = get_page_children($post->post_parent, $all_pages);
                $children_count = 0;
                foreach($children as $child)
                {
                  $children_count++;
                  $child_href = get_page_link($child->ID);
                  $child_title = $child->post_title;
                  ?>
                    <li><a href="<?php echo $child_href; ?>"><?php echo $child_title; ?></a></li>
                  <?php
                }
              }
            ?>