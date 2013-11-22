This theme was designed for Wordpress 3.6
======
Exercise caution when updating any of your software.
The theme was built with the following plugins...
(Bold items were modified by us and should not be updated ever)
* __Advanced Custom Fields 4.2.1__
* Akismet 2.5.9
* Codepress Admin Columns 2.0.1
* CP Google Maps 1.0.1
* __Custom Post Type UI 0.8__
* Duplicate Post 2.4.1
* Ninja Forms 2.2.38
* TinyMCE Advanced 3.5.8
* Wordpress SEO 1.2.13

Create a Contact Us Page
Install a Powerpoint Plugin

intro copy from saleamp!
-> turn into digital domination practice, multichannel story, how do you win hearts minds and machines, how do you do that across a global organization
measurable, scalable
this is a wrapper

Analytics practice area section
  approach to Analytics slide

Approach to change is a practice area
bottom practice area slide called purpose and performance or something... could be approach to change slide page 38 of DialogOverviewRedHat

Purpose slide - find slide that talk about idea of purpose
approach to change slide.

Growth Strategy
email deck overview of how we approach segment level growth strategy
1st slide email deck
Dialog Methodology - dynamic implenmentation - value prop on both of those
cuts across practice areas

Categories by practice area could be one piece (copy assignment) {words and music that are descriptive of our beliefs and approach, images}

Videos (remind mark of these) all general
  Pepper them throughout

for every slide, solicit copy to explain image for all these slides

Note: Only make pages for major concepts.
Else CPT instance.

Practice Areas
  Digital Domination
    line: "digital land grab/dominate real estate you need to, owning conversations"
    Digital Strategy
    Authentic Dialog at Scale (SEO, Social, "at scale"/"big social media") -- page, 
      SEO
      Social Media and associated strategy
      Content Creation (Ex: Lenovo, whitepapers for Education, gov)
      Website Design x - no page
      Campaign Management
      scaling social media
      website building, mobile apps, tech stuff
  Healthcare - grab stuff from consilient consulting group website - provides a first pass - generic image grab, write some custom copy for it (responsible: Bob Linderman and Jim)
    Bubble charts that show traffic
    2d plot of circles - in deck: (leadership institute deck)
      take cardiac procedure chart
    Screenshot of healthgrades.com (shows age of transparency thinking)
      Write a comment explaining the screenshot (Responsible: Mark)
        Got to control your destiny online in healthcare, great oppurtunities to do so
        Paraphrase of Mark: "Hospital providers get more traffic than any other people in their market and if yhou can own the conversation around specific treatment data you can see the less dominant player actually has the best cardio numbers because they did well onine with it"
May be getting copy writer soon

Introduction
====

Before reading this guide, you should know how to use the standard wordpress administration panel. If you find that there's something you don't know how to do, feel free to explore the Wordpress documentation at http://codex.wordpress.org/.

Content Management System Overview
====

TL;DR
===

Each page has an associated CPT. The posts of that CPT are rendered in chronological order on the page.
Each post of that CPT has an associated fieldset. A fieldset is a collection of data types, for example you might have a fieldset containing someone's name, their title, and short bio.

Here "edit" means create, read, update, and delete.
To edit Pages: Pages menu in wp-admin sidebar.
To edit CPTs: Custom Post Types menu in wp-admin sidebar. _DO NOT WRITE CPTs INTO functions.php_.
To edit fieldsets: Custom Fields menu in wp-admin sidebar. _DON'T ADD CUSTOM FIELDS ANY OTHER WAY._
To edit templates: Templates are stored in dlgthm/docs/content-templates/template-{TEMPLATE_NAME}.php
So when you make a new template, make sure to put your file in the correct place and name it correctly.
To change a post's assigned template, just delete its template taxonomy term and add a new taxonomy term which is supposed to be the name of your template, i.e. "slide_h1" would be template_slide_h1.php in the templates dir.

Pages
  have exactly one Custom Post Type.
    Each custom post of the specified type
      has exactly one fieldset.
      and has exactly one template.
  have a Theme Color.
  have an option to display a scrollspy sidebar.

Page -> CPT -> Custom Posts
Custom Post -> {fieldset, template}

Fundamental Data Types
===
The website is structured as a collection of Pages. Each page has an associated:
* Custom Post Type (cpt_slug)
* Theme Color (theme_color)
* Scrollspy (scrollspy) option
When a Page is requested, we render a template containing a list of Custom Posts that have the type specified on the Page's edit screen in wp-admin. Pages require a Custom Post Type to be specified when you create them, so the first step to adding new content to the site is to create a Custom Post Type that we can use to display the content we want on some page.

Making a CPT
===
We call Custom Post Types "CPTs" for short. Basically, a CPT is a collection of posts that will be displayed in chronological order on one or more pages. For example, I might have a CPT called "Team Members" that I want to be displayed on the "Team" page.

Pages all need to have a custom field where they can specify what CPT to use for the page.
CPTs use the Content Template Taxonomy. Each CPT instance must be assigned exactly one taxonomy term under "Content Templates" that specifies the path to the CPT instance's assigned PHP template.
We use a Taxonomy to assign templates in this way to avoid coupling the type of Custom Posts with their custom fields/templates.
Instead, the custom fields and the template file can be derived purely from their assigned taxonomy term.


How to create a new CPT 
===

*1. Create custom post type
*2. Create custom field and add fields
*3. Your template taxonomy term is the exact same as the string that comes after the dash in the templates term

TO DO
====
*Add tesla-esque horizontal scrollspy to home page. Nothing crazy fancy for now, just implement it so that Bob knows its there and can comment on it.
*Make any sized hero image centered rather than shifted to the left 
*   DONE - Add padding to footer so that when you scroll down there is more room on the page for scollspy
*Complete no-hero image page title below the subnav
*   DONE - Balance the footer and content padding
*   DONE - Make the subnav text highlight color standard - its starting to look weird with brighter colors and the grey colors. 
*Figure out non-scrollspy page, make sure it also supports having and not having a hero image. 
*Figure out what to display when someone clicks on a top level primary nav element. 
*Build multi-depth scrollspy menu

Plugins that are NOT enabled as of 8/29/2013
===
*Contact Form DB
*CP Google Maps
*Visitor Maps and Who's Online
*WordPress SEO
*WP Minify
*WP Super Cache