<?php
/*
  Plugin Name: PCSD Featured Area
  Description: Featured Area Controller. allows for single image, and videos in the featured area
  Version: 1.0.6-r2
  Author: Josh Espinoza
  Author URI: tech.provo.edu
*/

//Load ACF fields
// include(plugin_dir_path(__FILE__) . 'acf-fields/acf-fields.php');

//path to where building image may be stored.
$buildingImage = get_stylesheet_directory_uri() . '/assets/images/building-image.jpg';


//Featured area display on posts
add_filter('the_content', 'featured_area_display');
function featured_area_display($content)
{
  global $buildingImage; // Ensure the global $buildingImage variable is available
  global $post; // Ensure the global $post variable is available
  $post_id = $post->ID; // Define the $post_id variable

  // Check if we're inside the main loop in a single Post.
  if (is_singular() && in_the_loop() && is_main_query()) {

    //Checks for Layout Variable
    if (get_field('featured_layout_select')) {
      if (get_field('featured_layout_select') == 'single') {
        //Get Featured image value from Featured Area
?>
        <div class="featured-image-full" style="background-image: url(<?php echo get_field('featured_image'); ?>);" title="<?= get_field('featured_image_alt') ?>"></div>
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
      ?>
      <div class="featured-image-full" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>);"></div>
    <?php
    }
    return $content;
  } else {
    return $content;
  }
}

//add og:image property for social media
add_action('wp_head', 'social_media_image');
function social_media_image()
{
  global $buildingImage; // Ensure the global $buildingImage variable is available
  global $post; // Ensure the global $post variable is available
  $post_id = $post->ID; // Define the $post_id variable

  if (get_field('featured_image', $post_id)) {
    ?>
    <meta property="og:image" content="<?php echo get_field('featured_image'); ?>" />
  <?php
  } elseif (has_post_thumbnail()) {
  ?>
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
  <?php
  } elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . $buildingImage)) {
    $buildingImage = get_stylesheet_directory_uri() . '/assets/images/building-image.jpg';
  ?>
    <meta property="og:image" content="<?php echo $buildingImage; ?>" />
  <?php
  } else {
  ?>
    <meta property="og:image" content="https://provo.edu/wp-content/uploads/2018/03/provo-school-district-logo.jpg" />
<?php
  }
}
?>