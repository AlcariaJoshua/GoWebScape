<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gowebscape
 */

get_header();
?>

<style>
.blog-inside {
    .content {
        .image {
            margin-bottom: 50px;
            height: 500px;

            img {
                border-radius: 20px;
                height: 100%;
                object-fit: cover;
            }
        }
		.tags{
			margin-bottom: 30px;
			display: flex;
			flex-wrap: wrap;
			gap: 15px;
			p{
				padding: 10px 20px;
				border-radius: 20px;
			}
		}
    }
}
</style>


<section class="blog-inside global-padding">
    <div class="wrapper">
        <div class="content">
            <?php if (has_post_thumbnail()): ?>
            <?php
                // Get the URL of the featured image
                $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            ?>
            <div class="image">
                <img src="<?php echo esc_url($featuredIMG[0]); ?>" alt="<?php the_title_attribute(); ?>">
            </div>
            <?php else: ?>

            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gowebscape_logo.jpg"
                    alt="<?php esc_attr_e('Default Image', 'your-text-domain'); ?>">
            </div>
            <?php endif; ?>
			<div class="tags">
                <?php
                    $tags = get_the_tags();
                    	if ($tags) {
                            foreach ($tags as $tag) {
                                // Generate random RGB values
                                    $r = mt_rand(0, 255);
                                    $g = mt_rand(0, 255);
                                    $b = mt_rand(0, 255);

                                $background = "rgba($r, $g, $b, 0.1)"; // Transparent background
                                 $textColor = "rgb($r, $g, $b)";         // Solid text color

                            	echo '<p style="background-color: ' . $background . '; color: ' . $textColor . '; padding: 5px 20px; display: inline-block; margin: 5px 5px 0 0;">' . esc_html($tag->name) . '</p>';
                            }
                        }
                ?>
            </div>
            <h1><?php the_title(); ?></h1>
            <?php the_content() ?>
        </div>
    </div>
</section>


<?php
get_footer(); ?>