<?php get_header();

/**
 * Template Name: About Us
 */

?>

<?php get_template_part('template-parts/lp-banner') ?>

<section class="what-we-do">
    <div class="wrapper">
        <div class="content">
            <div class="image" uk-scrollspy="cls: uk-animation-fade; target: img; delay: 500; repeat: true;">
                <?php
                // Check rows exists.
                if (have_rows('what_we_do_image')):

                    // Loop through rows.
                    while (have_rows('what_we_do_image')):
                        the_row();

                        $image_url = get_sub_field('image');
                        $image_name = basename($image_url);

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
            <div class="text" uk-scrollspy="cls: uk-animation-slide-right; target: h2, p; delay: 500; repeat: true;">
                <?php echo get_field('what_we_do_text') ?>
            </div>
        </div>
    </div>
</section>


<section class="website-company global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="title" uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: true;">
                <?php echo get_field('company_you_can_trust_title') ?></div>
            <div class="image-text-con">
                <div class="text" uk-scrollspy="cls: uk-animation-slide-left; delay: 500; repeat: true;">
                    <?php echo get_field('company_you_can_trust_content') ?></div>
                <div class="image" uk-scrollspy="cls: uk-animation-slide-right; delay 500; repeat: true;">
                    <img src="<?php echo get_field('company_you_can_trust_image') ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="overlay-img">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/curvesgreen03.png" alt="">
    </div>
</section>

<section class="our-range global-padding">
    <div class="content">
        <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, li; delay: 500; repeat: true;">
            <?php echo get_field('our_range_content') ?>
        </div>
        <div class="image">
            <?php
                    $image_url = get_field('our_range_image');
                    $image_name = basename($image_url);
                ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
        </div>
    </div>
</section>

<section class="go-web-scape global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, p; delay: 500; repeat: true;">
                <?php echo get_field('go_web_scape_content') ?>
            </div>
            <div class="image" uk-scrollspy="cls: uk-animation-slide-right; target: img; delay: 500; repeat: true;">
                <?php

                    // Check rows exists.
                    if (have_rows('go_web_scape_image')):

                    // Loop through rows.
                    while (have_rows('go_web_scape_image')):
                        the_row();

                        $image_url = get_sub_field('image');
                        $image_name = basename($image_url);
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
        </div>
    </div>
</section>

<?php get_footer(); ?>