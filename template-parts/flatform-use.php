<section class="platform-used global-padding">
    <div class="title" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;">
        <?php echo get_field('flatform_use_title') ?>
    </div>
        <?php

            // Check rows exists.
            if (have_rows('flatfrom_used_content')):

                // Loop through rows.
                while (have_rows('flatfrom_used_content')):
                    the_row();
        ?>
            <div class="content" >
                <?php
                    $image_url = get_sub_field('image');
                    $image_name = basename($image_url);
                ?>
                <div class="image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">

                    <div class="small-images">
                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="slider: true; sets: true; autoplay: true; autoplay-interval: 2000;" >

                            <div class="uk-slider-items  uk-child-width-1-2@l uk-child-width-1-1@m uk-child-width-1-1@s">
                                <?php
                                // Check rows exists.
                                if (have_rows('shop_example')):

                                    // Loop through rows.
                                    while (have_rows('shop_example')):
                                        the_row();
                                        ?>

                                    <div class="smImg">
                                        <a href="<?php echo get_sub_field('shop_link') ?>">
                                            <img src="<?php echo get_sub_field('image') ?>" alt="">
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

                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>

                        </div>
                    </div>

                </div>

                <div class="text" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;" >
                    <?php echo get_sub_field('text') ?>
                </div>
            </div>
        <?php // End loop. 
            endwhile; // No value.
            else: // Do something...
            endif;
        ?>
</section>