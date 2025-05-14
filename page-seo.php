<?php get_header();

/**
 * Template Name: SEO page
 */

?>

<?php get_template_part("template-parts/lp-banner") ?>


<section class="why_seo_matter">
    <div class="wrapper">
        <div class="content">
            <?php
                 $image_url = get_field('why_seo_matter');
                $image_name = basename($image_url);
            ?>
                <div class="image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                </div>
                <div class="text" uk-scrollspy="cls: uk-animation-slide-right; target: h2, p, .cta, img; delay: 500; repeat: true;" >
                    <?php echo get_field('why_seo_content') ?>
                    <div class="cta">
                        <a href="tel:<?php echo get_field('schedule_call') ?>" ><?php echo get_field('schedule_call_text') ?></a>
                    </div>

                    <div class="links-button">
                        <?php
                            // Check rows exists.
                            if (have_rows('why_seo_matter_buttons')):

                                // Loop through rows.
                                while (have_rows('why_seo_matter_buttons')):
                                    the_row();
                            ?>
                        <a href="<?php echo get_sub_field('button_link') ?>">
                            <?php
                                $image_url = get_sub_field('image');
                                $image_name = basename($image_url);
                            ?>
                
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                
                            <p><?php echo get_sub_field('text') ?></p>
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
    </div>
</section>


<section class="go_web_scape global-padding">
    
        <div class="content">
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2,p; delay: 500; repeat: true;" >
                <?php echo get_field('expert_seo') ?>
            </div>
            <div class="image-con">
                <?php

                // Check rows exists.
                if (have_rows('expert_seo_image')):

                    // Loop through rows.
                    while (have_rows('expert_seo_image')):
                        the_row();
                        ?>
                        <?php
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
                

                <div class="star-con">
                    <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="100,10 120,75 190,75 130,115 150,180 100,140 50,180 70,115 10,75 80,75" fill="gold"></polygon>
                    </svg>
                    <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="100,10 120,75 190,75 130,115 150,180 100,140 50,180 70,115 10,75 80,75" fill="gold"></polygon>
                    </svg>
                    <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="100,10 120,75 190,75 130,115 150,180 100,140 50,180 70,115 10,75 80,75" fill="gold"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    
</section>


<section class="our-process global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="title">
                <?php echo get_field('our_process_title') ?>
            </div>
            <div class="card-con" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;" >
                <?php
                if (have_rows('our_process_content')):
                    $counter = 1; // Start at 1
                    while (have_rows('our_process_content')): the_row();
                        $cardbg = get_sub_field('card_bg')

                        ?>
                        <div class="card" style="background-color: <?php echo $cardbg ?>;" >
                            <span><?php echo $counter; ?></span>
                            <div class="text">
                                <?php echo get_sub_field('text'); ?>
                            </div>
                        </div>
                        <?php
                        $counter++; // Increment counter
                    endwhile;
                else:
                    // No content found
                endif;
                ?>
            </div>

        </div>
    </div>
</section>



<section class="seo_starting global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, p; delay: 500; repeat: true;" >
                <?php echo get_field('seo_starting_content') ?>
            </div>
            <?php
                 $image_url = get_field('seo_starting_image');
                $image_name = basename($image_url);
            ?>
                <div class="image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                </div>
        </div>
    </div>
</section>



<section class="seo_campaign global-padding">
    <div class="overlay-image">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/curve-green.png" alt="SEO Campaign">
    </div>

    <div class="wrapper">
        <div class="content">
            <div class="title">
                <?php echo get_field('seo_campaign_title') ?>
            </div>

            <div class="text" uk-scrollspy="cls: uk-animation-slide-right; target: li; delay 500; repeat: true;">
                <?php echo get_field('seo_campaign_content') ?>
            </div>
            
        </div>
    </div>
</section>


<section class="digital_scape global-padding">
    <div class="wrapper">
        <div class="content">
                <?php

            // Check rows exists.
            if (have_rows('digitial_marketing')):

                // Loop through rows.
                while (have_rows('digitial_marketing')):
                    the_row();
                ?>
            <div class="digital-marketing">
                <?php
                    $image_url = get_sub_field('digital_marketing_image');
                    $image_name = basename($image_url);
                ?>
                <div class="image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                </div>
                <div class="text" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;" >
                    <?php echo get_sub_field('digital_marketing_content') ?>
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
           
        </div>
    </div>
</section>

<?php get_template_part("template-parts/faqs") ?>

<?php get_template_part("template-parts/contact-form") ?>

<?php get_footer(); ?>