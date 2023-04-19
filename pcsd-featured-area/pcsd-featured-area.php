<?php
/*
  Plugin Name: PCSD Featured Area
  Description: Featured Area Controller. This replaces the plugins "Featured Galleries", "Hide Featured Image"
  Version: 1.01
  Author: Josh Espinoza
  Author URI: tech.provo.edu
*/
//Load ACF fields
include( plugin_dir_path( __FILE__ ) . 'acf-fields/acf-fields.php');


add_filter('the_content', 'featured_area_display');
function featured_area_display($content)
{
  // Check if we're inside the main loop in a single Post.
  if (is_singular() && in_the_loop() && is_main_query()) {

    //Checks for Layout Variable
    if (get_field('featured_layout_select')) {
      if (get_field('featured_layout_select') == 'single') {
        //Get Featured image value from Featured Area
      ?>
        <img src="<?php echo get_field('featured_image'); ?>" alt="" class="" />
      <?php
      } elseif (get_field('featured_layout_select') == 'video') {
      ?>
        <video controls poster="<?php echo get_field('video_poster'); ?>">
          <source src="<?php echo get_field('video_file'); ?>" type="video/mp4">
          Download the <a href="<?php echo get_field('video_file'); ?>">MP4</a> video.
        </video>
      <?php
      } elseif (get_field('featured_layout_select') == 'none') {
      }
    } elseif (has_post_thumbnail())
    //for post that existed before this plugin was developed checks for a featured image from the Wordpress core field and displays that image if the featured layout variable does not exist   
    {
      the_post_thumbnail();
    }
    return $content;
  } else {
    return $content;
  }
}
