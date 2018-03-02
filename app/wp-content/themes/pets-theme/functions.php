<?php
/*dodajem funkciju koja učitava sve css,javascript itd scripte*/
function pets_files() {
  wp_enqueue_style("font-awesome","//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
  wp_enqueue_style("custom-google-fonts","//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
  wp_enqueue_script('main-pets-js', get_theme_file_uri( '/js/scripts-bundled.js' ), null, microtime(), true );
  wp_enqueue_style("pets_main_styles",get_stylesheet_uri(),NULL,microtime());

  /*delete NULL and microtime() when you push this site live ,check this Udemy link https://goo.gl/RLkydt*/
}

add_action('wp_enqueue_scripts','pets_files');

/*Enabling  title tag*/
function pets_features() {
    add_theme_support("title-tag");
}

add_action("after_setup_theme","pets_features");
