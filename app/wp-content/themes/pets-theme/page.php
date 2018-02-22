<?php

while(have_posts()) {
  # code...
  the_post(); ?>
  <h1>This is the page,not the a post</h1>
   <h2><?php the_title() ?></h2>
   <?php the_content(); ?>

  <?php }


 ?>
