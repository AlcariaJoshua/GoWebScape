<?php get_header(); 

/**
 * Template Name: App Development Page
 */


?>

<?php get_template_part("template-parts/lp-banner") ?>


<section class="app-developer">
    <div class="wrapper">
        <div class="content">
            <?php echo get_field('app_development_desc') ?>
        </div>
    </div>
</section>

<section class="iphone-android-dev global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="text">
                <?php echo get_field('iphone_and_android_desc') ?>
            </div>
            <div class="image">
                <?php
                    $image_url = get_field('iphone_and_android_image');
                    $image_name = basename($image_url);
                ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
            </div>
        </div>
    </div>

</section>

<section class="app-dev-range global-padding">
    <div class="overlay-image">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/curvesgreen1.png" alt="go web scape">
    </div>
    <div class="wrapper">
        <div class="content">
            <div class="text">
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
    </div>
</section>


<section class="developments global-padding">
    <?php
    // Check rows exists.
    if (have_rows('developments')):

        // Loop through rows.
        while (have_rows('developments')):
            the_row();
            ?>

    <div class="content">
        <div class="image">
            <?php 
                            $image_url = get_sub_field('image');
                            $image_name = basename($image_url);
                        ?>

            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name) ?>">
        </div>
        <div class="text">
            <?php echo get_sub_field('text') ?>
        </div>
    </div>

    <?php

        // End loop.
        endwhile;

        // No value.
        else:
        // Do something...
        endif;
    ?>
</section>

<section class="app-dev-contact global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="app-dev-info">
                <?php echo get_field('app_dev_contact_title') ?>
                <div class="number">
                    <?php
                        // Check rows exists.
                        if (have_rows('app_dev_contact_number')):

                            // Loop through rows.
                            while (have_rows('app_dev_contact_number')):
                                the_row();
                                ?>

                    <a href="tel:<?php echo get_sub_field('number') ?>"><?php echo get_sub_field('number') ?></a>
                    <?php

                            // End loop.
                            endwhile;

                            // No value.
                            else:
                            // Do something...
                            endif;
                        ?>
                </div>
                <div class="email">
                    <?php
                    // Check rows exists.
                    if (have_rows('app_dev_email')):

                        // Loop through rows.
                        while (have_rows('app_dev_email')):
                            the_row();
                            ?>
                    <a href="mailto:<?php echo get_sub_field('email') ?>"><?php echo get_sub_field('email') ?></a>
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
            <!-- <div class="app-dev-form">
                <?php echo do_shortcode('[contact-form-7 id="b12eb7d" title="App Development Contact"]') ?>
            </div> -->

            <div class="app-dev-form">
                <?php echo do_shortcode('[custom_contact_form]') ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>