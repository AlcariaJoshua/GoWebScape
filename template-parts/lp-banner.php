<section class="lp-banner global-padding">
    <div class="wrapper">
        <div class="content" >
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h1, h4, p; delay: 500; repeat: true;">
                <div class="overlay-img">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/curve-green.png" alt="seo services">
                </div>
                <?php echo get_field('lp_content') ?>
            </div>
            <div class="uk-position-relative lp-banner-slider  uk-visible-toggle uk-light" tabindex="-1" uk-slider="slide: true; infite: true; autoplay: true; autoplay-interval: 3000">

                <div class="uk-slider-items uk-child-width-1-1@l uk-child-width-1-1@s uk-child-width-1-1@m">
                    

                    <?php

                    // Check rows exists.
                    if (have_rows('lp_slider_banner')):

                        // Loop through rows.
                        while (have_rows('lp_slider_banner')):
                            the_row();
                            
                        $image_url = get_sub_field('image');
                        $image_name = basename($image_url);
                            ?>

                    <div class="image">
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
            </div>
        </div>
        <div class="diveder"></div>
    </div>
</section>