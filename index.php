<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gowebscape
 * 
 * Template Name: Home
 * 
 */



get_header();
?>

<main id="primary" class="site-main">

    <section class="banner global-padding ">
        <div class="wrapper">
            <div class="content">
                <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h1, p, a; delay: 200; repeat: true;">
                    <?php echo get_field('banner_content') ?>

                    <div class="banner-btn">
                        <?php

                        // Check rows exists.
                        if (have_rows('banner_button')):

                            // Loop through rows.
                            while (have_rows('banner_button')):
                                the_row();
                                ?>
                        <a href="<?php echo get_sub_field('link') ?>"><?php echo get_sub_field('text') ?></a>
                        <?php

                            // End loop.
                            endwhile;

                            // No value.
                            else:
                            // Do something...
                            endif;
                        ?>
                    </div>

                </div>

                <div class="uk-position-relative banner-slider uk-visible-toggle uk-light" tabindex="-1"
                    uk-slider="slider: true; autoplay: true autoplay-interval: 2000;">

                    <div class="uk-slider-items uk-child-width-1-1@l uk-child-width-1-1@s uk-child-width-1-1@m">
                        <?php

					// Check rows exists.
					if (have_rows('banner_image')):

						// Loop through rows.
						while (have_rows('banner_image')):
							the_row();
							?>

                        <div class="image">
                            <?php
									$image_url = get_sub_field('image'); // Get full image URL
									$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
								?>

                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">

                            <?php echo get_sub_field('text') ?>
                        </div>
                        <?php

							// End loop.
							endwhile;

							// No value.
							else:
							// Do something...
							endif;
						?>
                    </div>

                </div>


            </div>
        </div>
    </section>

    <div class="overview">
        <div class="wrapper">
            <div class="content" uk-scrollspy="cls: uk-animation-fade; target: img; delay: 500; repeat: true;">

                <?php

				// Check exists.
				if (have_rows('overview')):

					// Loop through rows.
					while (have_rows('overview')):
						the_row();
						?>
                <a href="">
                    <?php
						$overviewImage = get_sub_field('overview_image'); // Get full image URL
						$overviewName = basename($overviewImage );     // Get just the file name (e.g., banner.jpg)
					?>

                    <img src="<?php echo esc_url($overviewImage ); ?>" alt="<?php echo esc_attr($overviewName); ?>">
                    <div class="text" uk-scrollspy="cls: uk-animation-fade; target: p; delay: 500; repeat: true;">
                        <?php echo get_sub_field('overview_content') ?>
                    </div>
                </a>

                <?php
				// End loop.
                        endwhile;

                        // No value.
                        else:
                        // Do something...
                        endif;
                ?>


            </div>
        </div>
    </div>

    <section class="our-services global-padding">
        <div class="wrapper">
            <div class="content">
                <div class="title" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;" >
                    <?php echo get_field('our_services_content') ?>
                </div>
            </div>
        </div>

        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
            uk-slider="sets: true; autoplay: true;" id="our-services">

            <div class="uk-slider-container">
                <ul
                    class="slider uk-slider-items uk-flex-center uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@l">
                    <?php

							// Check rows exists.
							if (have_rows('our_services_slider')):

								// Loop through rows.
								while (have_rows('our_services_slider')):
									the_row();
						?>
                    <li>
                        <a href="<?php echo get_sub_field('our_services_link') ?>">
                            <div class="uk-panel">
                                <?php
											$image_url = get_sub_field('image'); // Get full image URL
											$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
										?>

                                <img src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($image_name); ?>">
                                <h3 class="uk-text-center"><?php echo get_sub_field('text') ?></h3>
                            </div>
                        </a>

                    </li>
                    <?php

                                // End loop.
                            endwhile;

                            // No value.
                        else:
                            // Do something...
                        endif;
                        ?>

                </ul>
            </div>

            <!-- Add navigation arrows if you want -->
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous
                uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next
                uk-slider-item="next"></a>

        </div>
    </section>

    <section class="we-adapt-our-values global-padding">
        <div class="wrapper">
            <div class="content">
                <div class="we-adapt">
                    <div class="text">
                        <div class="title" uk-scrollspy="cls: uk-animation-slide-left; target: h2, p; delay: 500; repeat: true;">
                            <?php echo get_field('we_adapt_content') ?>
                        </div>

                        <div class="range-container" uk-scrollspy="cls: uk-animation-slide-left; target: p; delay: 500; repeat: true;">
                            <?php

                            // Check rows exists.
                            if (have_rows('range')):

                                // Loop through rows.
                                while (have_rows('range')):
                                    the_row();
                                    ?>
                            <div class="range">
                                <div class="text">
                                    <p><?php echo get_sub_field('range_subtitle'); ?></p>
                                    <p>
                                        <?php 
                                            $value = get_sub_field('range_value'); 
                                            echo esc_html($value) . '%'; 
                                        ?>
                                    </p>
                                </div>
                                <progress class="js-progressbar uk-progress" value="0" max="100"
                                    data-target="<?php echo esc_attr($value); ?>"></progress>
                            </div>

                            <?php

                            // End loop.
                            endwhile;

                            // No value.
                            else:
                            // Do something...
                            endif;
                            ?>
                        </div>

                    </div>
                    <div class="image"
                        uk-scrollspy="cls: uk-animation-slide-right; target: img ; delay: 500; repeat: true;">
                        <?php
								$image_url = get_field('we_adapt_image'); // Get full image URL
								$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
							?>

                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                    </div>

                </div>
            </div>
        </div>
        <div class="our-values">
            <div class="title" uk-scrollspy="cls: uk-animation-slide-left; delay: 500; repeat: true;">
                <?php echo get_field('our_values_title') ?>
                <!-- External Arrow Buttons (Outside the slider container) -->
                <div class="values-btn">
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                        uk-slidenav-previous></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next></a>
                </div>
            </div>

            <!-- Slider Section -->
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" id="values-slider"
                uk-slider="sets: true;">
                <div class="values-slider uk-slider-items uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-4@l"
                    uk-scrollspy="cls: uk-animation-slide-right; delay: 500; repeat: true; target: .books;">

                    <?php

                        // Check rows exists.
                        if (have_rows('values_slider')):

                            // Loop through rows.
                            while (have_rows('values_slider')):
                                the_row();
                                ?>
                    <div class="books">
                        <a href="<?php echo get_field("book_link") ?>">
                            <?php
											$image_url = get_sub_field('image'); // Get full image URL
											$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
										?>

                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>  "
                                width="400" height="600">

                        </a>

                    </div>
                    <?php

                                // End loop.
                            endwhile;

                            // No value.
                        else:
                            // Do something...
                        endif;
                        ?>
                </div>
            </div>
    </section>


    <section class="our-works global-padding">
        <div class="wrapper">
            <div class="title" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;">
                <?php echo get_field('our_works_title') ?>
            </div>
        </div>
        <div class="our-works-sliders-container">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                uk-slider="sets: true; autoplay: true; autoplay-interval: 2000; ">

                <div
                    class="uk-slider-items our-works-slider  uk-child-width-1-3@l uk-child-width-1-2@m  uk-child-width-1-1@s">
                    <?php
					// Check rows exists.
					if (have_rows('works')):

						// Loop through rows.
						while (have_rows('works')):
							the_row();
							?>
                    <a href="<?php echo get_home_url(); ?>">
                        <?php
									$image_url = get_sub_field('image'); // Get full image URL
									$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
								?>

                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">

                    </a>
                    <?php
							// End loop.
							endwhile;
							// No value.
							else:
							// Do something...
							endif;
						?>
                </div>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous
                    uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next
                    uk-slider-item="next"></a>

            </div>
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                uk-slider="sets: true; autoplay: true; autoplay-interval: 3000;">

                <div
                    class="uk-slider-items our-works-slider  uk-child-width-1-3@l uk-child-width-1-2@m  uk-child-width-1-1@s">
                    <?php
						$works = get_field('works');

						if ($works):
							$works = array_reverse($works); // Reverse the order
							foreach ($works as $work):
								?>
                    <a href="<?php echo get_home_url(); ?>">
                        <?php
										$image_url = get_sub_field('image'); // Get full image URL
										$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
									?>

                        <img src="<?php echo esc_url($work['image']); ?>" alt="<?php echo esc_attr($image_name); ?>">

                    </a>
                    <?php
							endforeach;
						else:
							echo '<p>No works found.</p>';
						endif;
					?>

                </div>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous
                    uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next
                    uk-slider-item="next"></a>

            </div>
        </div>
        </div>
    </section>


    <section class="our-tech-stack global-padding">
        <div class="wrapper">
            <div class="content">
                <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, p; delay: 500; repeat: true;">
                    <?php echo get_field('our_tech_stack_content') ?>
                </div>

                <div class="image" uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 200; repeat: true;">
                    <?php

							// Check rows exists.
							if (have_rows('our_tech_stack_img')):

							// Loop through rows.
							while (have_rows('our_tech_stack_img')):
								the_row();
								?>
                    <?php
										$image_url = get_sub_field('image'); // Get full image URL
										$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
									?>
                    <div class="image uk-card">
                        <img class="" src="<?php echo esc_url($image_url); ?>"
                            alt="<?php echo esc_attr($image_name); ?>">
                    </div>

                    <?php

								// End loop.
								endwhile;

								// No value.
								else:
								// Do something...
								endif;
							?>

                </div>

            </div>
        </div>
    </section>


    <section class="ready-to-achieve">
        <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, a; delay: 500; repeat: true;">
            <?php echo get_field('ready_to_achive_content') ?>
            <div class="cta">
                <a href="<?php echo get_field('ready_to_achive_button_link') ?>"
                    class=""><?php echo get_field('ready_to_achive_button_text') ?></a>
            </div>

        </div>
        <div class="image">
            <?php
							$image_url = get_field('ready_to_achive_img'); // Get full image URL
							$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
						?>

            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
        </div>
    </section>


    <section class="featured global-padding">
        <div class="wrapper">
            <div class="content">
                <div class="title" uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: true;">
                    <?php echo get_field('featured_on_title') ?>
                </div>
            </div>
        </div>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
            uk-slider="center: true; autoplay: true;">

            <div class="uk-slider-items featured-on-slider uk-grid uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">

                <?php

                        // Check rows exists.
                        if (have_rows('featured_on_images')):

                            // Loop through rows.
                            while (have_rows('featured_on_images')):
                                the_row();
                                ?>
                        <div class="image">
                            <?php
                                            $image_url = get_sub_field('image'); // Get full image URL
                                            $image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
                                        ?>

                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">

                        </div>
                <?php

                                // End loop.
                            endwhile;

                            // No value.
                        else:
                            // Do something...
                        endif;
                        ?>
            </div>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous
                uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next
                uk-slider-item="next"></a>

        </div>
    </section>


    <section class="help-boost global-padding ">
        <div class="wrapper">
            <div class="content">
                <div class="image" uk-scrollspy="cls: uk-animation-fade; target: img; delay: 500; repeat: true;">
                    <?php

					// Check rows exists.
					if (have_rows('boost_business_imgs')):

						// Loop through rows.
						while (have_rows('boost_business_imgs')):
							the_row();
							?>
                    <?php
							$image_url = get_sub_field('image'); // Get full image URL
							$image_name = basename($image_url);     // Get just the file name (e.g., banner.jpg)
						?>

                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">

                    <?php

						// End loop.
						endwhile;

						// No value.
						else:
						// Do something...
						endif;
						?>
                </div>
                <div class="text"
                    uk-scrollspy="cls: uk-animation-slide-right; target: h2, p; delay: 500; repeat: true;">
                    <?php echo get_field('boost_business_content') ?>

                    <div class="moving-num-con">
                        <?php

                            // Check rows exists.
                            if (have_rows('business_history')):

                                // Loop through rows.
                                while (have_rows('business_history')):
                                    the_row();
                        ?>
                        <div class="moving-number">
                            <div class="count-con">
                                <p class="counter" data-target="<?php echo get_sub_field('number') ?>">0</p>
                                <p>+</p>
                            </div>
                            <h5><?php echo get_sub_field('sub_title') ?></h5>
                        </div>
                        <?php

                            // End loop.
                            endwhile;

                            // No value.
                            else:
                            // Do something...
                            endif;
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </section>




    <section class="blogs global-padding ">
        <div class="wrapper">
            <div class="content">
                <div class="title" uk-scrollspy="cls: uk-animation-slide-left; delay: 500; repeat: true;">
                    <?php echo get_field('blogs_title') ?>
                </div>

                <div class="card-con" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;">
                    <?php
                        $related_blogs = get_field('blogs');

                        if ($related_blogs) {
                            foreach ($related_blogs as $post) {
                                setup_postdata($post); ?>
                                
                                <div class="card">
                                    <div class="images">
                                        <?php if (has_post_thumbnail()): 
                                            $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                                            <img src="<?php echo esc_url($featuredIMG[0]); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gowebscape_logo.jpg"
                                                alt="<?php esc_attr_e('Default Image', 'your-text-domain'); ?>">
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="text">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                                        <a href="<?php the_permalink(); ?>" target="_blank">
                                            Read the article <i class="fa-solid fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>

                            <?php }
                            wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>





    <?php get_template_part('template-parts/faqs') ?>

    <?php get_template_part('template-parts/contact-form'); ?>





</main><!-- #main -->

<?php get_footer(); ?>