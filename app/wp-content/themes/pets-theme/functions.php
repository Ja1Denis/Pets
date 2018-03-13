  <?php

function pageBanner(){
  //  php logic vill live here
    ?>
    <div class="page-banner">
     <div class="page-banner__bg-image" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes'] ['pageBanner'] ?>);"></div>
     <div class="page-banner__content container container--narrow">

       <h1 class="page-banner__title"><?php the_title(); ?></h1>
       <div class="page-banner__intro">
         <p><?php the_field('page_banner_subtitle') ?></p>
       </div>
     </div>
   </div>
<?php }


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
/*Enabling thumbnails*/
    add_theme_support("post-thumbnails");
    add_image_size('professorLandscape', 400,260, true);
    add_image_size('professorPortrait', 480,650, true);
    add_image_size('pageBanner', 1500, 350, true);
}

add_action("after_setup_theme","pets_features");


function pets_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {

   $query->set('orderby','title');
   $query->set('order','ASC');
   $query->seeet('post_per_page',-1);
  }

  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key','event_date');
    $query->set('orderby','meta_value_num');
    $query->set('order','ASC');
    $query->set('meta_query', array(
      array(
        'key'=> 'event_date',
        'compare'=> '>=',
        'value' => $today,
        'type'=> 'numeric'
      )
    ));


  }
}
add_action('pre_get_posts','pets_adjust_queries');
