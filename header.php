<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    <?php
        // Get the title of the site
        $site_title = get_bloginfo('name');

        // Determine if it's the home page
        if (is_home() || is_front_page()) {
            // Display only the site title for the home page
            echo $site_title;
        } else {
            // Display the site title followed by a separator
            echo $site_title . ' | ';

            // Display the title of the page or post
            if (is_single() || is_page()) {
                the_title();
            }
        }
    ?>
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="container-fluid">
      <div class="container-md">
        <div class="row pt-5 pb-5">
          <div class="col-md-8">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="MS Wiki" class="img-fluid"></a>
          </div>
          <div class="col-md-4 pt-2">
            <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
              <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search" />
            </form>
            <ul class="list-inline text-center txt12 p-2">
              <li class="list-inline-item"><a href="<?php echo esc_url(home_url('/maps')); ?>">Maps</a></li>
              <li class="list-inline-item"><a href="<?php echo esc_url(home_url('/calendar')); ?>">Calendar</a></li>
              <li class="list-inline-item"><a href="<?php echo esc_url(home_url('/book')); ?>">About the book</a></li>
              <li class="list-inline-item"><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>