<?php echo get_header();

/**
 * Template Name: E-commerce Website Design
 */

?>


<?php get_template_part("template-parts/lp-banner") ?>

<?php get_template_part("template-parts/flatform-use") ?>


<section class="discover-ecomm global-padding ">
    <div class="wrapper">
        <div class="content">
            <div class="title" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;" >
                <?php echo get_field('discover_ecomm_title'); ?>
            </div>
            <div class="card-container" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;" >
                <?php
                    // Check rows exists.
                    if (have_rows('discover_ecomm_cards')):

                        // Loop through rows.
                        while (have_rows('discover_ecomm_cards')):
                            the_row();
                    ?>

                        <div class="card">
                            <div class="sub-title">
                                <div class="logo">
                                    <img src="<?php echo get_sub_field('logo') ?>" alt="Logo">
                                </div>
                                <h3><?php echo get_sub_field('title') ?></h3>
                            </div>
                            <p>
                                <?php echo get_sub_field('description') ?>
                            </p>

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


<section class="essentials global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; delay: 500; repeat: true;" >
                <?php echo get_field('essential_content') ?>
            </div>
            <?php
                 $image_url = get_field('essential_image');
                $image_name = basename($image_url);
            ?>
                <div class="image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                </div>
        </div>
    </div>
</section>

<section class="timeline global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="title" uk-scrollspy="cls: uk-animation-fade; target: h2, p; delay: 500; repeat: true;">
                <?php echo get_field('timeline_title') ?>
            </div>
            <div class="timeskip" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;" >
                <?php if (have_rows('timeline_card')):
                    $index = 0;
                    while (have_rows('timeline_card')): the_row();
                        $index++;
                        $is_odd = $index % 2 === 1;
                ?>
                    <?php if ($is_odd): ?>
                        <!-- Blank card left -->
                        <div class="card blank"></div>
                    <?php endif; ?>

                    <!-- Real content card -->
                    <div class="card">
                        <div class="sub-title">
                            <div class="logo">
                                <img src="<?php echo esc_url(get_sub_field('logo')); ?>" alt="">
                            </div>
                            <h3><?php echo esc_html(get_sub_field('sub_title')); ?></h3>
                        </div>
                        <p><?php echo esc_html(get_sub_field('text')); ?></p>
                    </div>

                    <?php if (!$is_odd): ?>
                        <!-- Blank card right -->
                        <div class="card blank"></div>
                    <?php endif; ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('template-parts/lp-overview') ?>

<?php get_template_part('template-parts/faqs') ?>

<?php get_template_part('template-parts/contact-form'); ?>


<?php echo get_footer();  ?>