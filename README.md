# pcsd-featured-area

Simple Plugin to better control our featured area. This easily allows our content creators to add a image or video across the top of our news articles

## Requires 
Advanced Custom Fields -> https://wordpress.org/plugins/advanced-custom-fields/

## Changelog

1.0.0
initial release-to control our featured area better

1.0.1
forgot to add a fallback if no featured image is present to just return the content

1.0.2
switched the featured image html structure from a img to a div with the featured image as a background image to use our styling to control the image.

1.0.3
fixed final fallback to wordpress core featured image to use the proper markup if used.

1.0.4
add featured image into the head meta as og:image for social media sites

1.0.5
added field to provide alternative text for images.

1.0.6-r2
ensure post variables are set before trying to use them