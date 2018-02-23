<?php
/*dodajem funkciju koja učitava sve css,javascript itd scripte*/
function pets_files() {
  wp_enqueue_style("pets_main_styles", get_stylesheet_uri(),NULL,microtime());/*delete NULL and microtime() when you push this site live ,check this Udemy link https://goo.gl/RLkydt*/
}
add_action("wp_enqueue_scripts","pets_files");
