<?php get_header();?>

<section class="web-design-banner">

    <?php
        $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
    ?>
    <div class="image">
        <img src="<?php echo esc_url($featuredIMG[0]); ?>" alt="<?php the_title_attribute(); ?>">
    </div>

    <div class="wrapper">
        <div class="content">
            <div class="btn">
                <a href="<?php echo get_home_url()?>/website-design/">Back</a>
                <a href="<?php echo get_field('visit_website') ?>">Visit The Website</a>
            </div>
            
        </div>
    </div>
</section>


<section class="web-design-details global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="industry-logo">
                <div class="logo">
                    <img src="<?php echo get_field('website_logo') ?>" alt="">
                </div>
                <div class="text">
                    <?php echo get_field('tyrepower_content') ?>
                </div>
            </div>
            <div class="industry-desc">
                <?php echo get_field('tyrepower_gateshead') ?>
                <ul>
                <?php

                    // Check rows exists.
                    if (have_rows('tyrepower_tools')):

                        // Loop through rows.
                        while (have_rows('tyrepower_tools')):
                            the_row();
                            ?>
                    <li>
                        <h4><?php echo get_sub_field('sub_title') ?></h4>
                        <p><?php echo get_sub_field('description') ?></p>
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
        </div>
    </div>
</section>

<section class="website">
    <div class="wrapper">
        <div class="content">
            <div class="image">
                <?php echo get_field('website_overview') ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>