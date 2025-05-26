<?php get_header(); 

/**
 * Template name: Branding and Designing
 */

?>


<?php get_template_part('template-parts/lp-banner') ?>


<section class="unique-branding">
    <div class="wrapper">
        <div class="content">
            <div class="title" uk-scrollspy="cls: uk-animation-slide-left; delay: 500 repeat: true;" >
                <?php echo get_field('unique_branding_text') ?>
            </div>
            <div class="logo-container" uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 300; repeat: true;  " >
                <?php if (have_rows('unique_branding_img')): ?>
                    <?php while (have_rows('unique_branding_img')): the_row(); ?>
                        <?php
                            $image_url = get_sub_field('image');
                            $image_name = basename($image_url);
                        ?>
                        <div class="logo-item uk-card " >
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No logo</p>
                <?php endif; ?>
            </div>

            <div class="cta">
                <a href="#" id="loadMore">View more</a>
            </div>
 
           
        </div> 
    </div>
</section>


<section class="design global-padding ">
    <div class="wrapper">
        <div class="content">
            <div class="why-design" uk-scrollspy="cls: uk-animation-fade; target: h3, p; delay: 500; repeat: true;" >
                <?php echo get_field('why_design') ?>
            </div>
            <div class="design-step" uk-scrollspy="cls: uk-animation-slide-left; target: h3, p; delay: 500; repeat: true;">
                <h3>Design Steps</h3>
                <div class="steps-container" uk-scrollspy="cls: uk-animation-fade; target: .step; delay: 500; repeat: true;">
                <?php if (have_rows('step')): ?>
                    <?php $counter = 1; ?>
                    <?php while (have_rows('step')): the_row(); ?>
                        <?php 
                        $color = get_sub_field('bg_color');
                        $title = get_sub_field('title');
                        $description = get_sub_field('descirption');
                        ?>
                        
                        <div class="step">
                            <div class="count">
                                <p style="background-color:<?php echo esc_attr($color); ?>;">
                                    <?php echo $counter++; ?>
                                </p>
                                <h4><?php echo esc_html($title); ?></h4>
                            </div>
                            <p><?php echo esc_html($description); ?></p>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No steps found.</p>
                <?php endif; ?>


                    
                </div>
                
            </div>
        </div>
    </div>
</section>

<section class="consultation">
    <div class="wrapper">
        <div class="content">
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, p, a; delay: 500; repeat: true;"> 
                <?php echo get_field('schedule_content') ?>
                <div class="cta">
                    <a href="<?php echo get_field('schedule_book_appointment') ?>"><?php echo get_field('schedule_appointment_btn_title') ?></a>
                </div>
            </div>
            <div class="image" uk-scrollspy="cls: uk-animation-slide-right; delay: 500; repeat: true;">
                <?php
                    $image_url = get_field('schedule_image');
                    $image_name = basename($image_url);
                ?>

                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
            </div>
        </div>
        <div class="content">
            <div class="text" uk-scrollspy="cls: uk-animation-slide-left; target: h2, p; delay: 500; repeat: true;" >
                <?php echo get_field('our_approach_content') ?>
                <div class="info">
                    <ul>
                        <?php
                            // Check rows exists.
                            if (have_rows('our_approach_listing')):

                                // Loop through rows.
                                while (have_rows('our_approach_listing')):
                                    the_row();
                                    ?>
                        <li>
                            <img src="<?php echo get_sub_field('image') ?>" alt="info listing"> 
                            <p><?php echo get_sub_field('text') ?></p>
                        </li>
                        <?php endwhile; ?>
                        <?php else: ?>
                            <p>No found.</p>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="image" uk-scrollspy="cls: uk-animation-slide-right; delay: 500; repeat: true;">
                <?php
                    $image_url = get_field('our_approach_image');
                    $image_name = basename($image_url);
                ?>

                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
            </div>
        </div>
    </div>
</section>

<section class="what-you-see">
    <div class="wrapper">
        <div class="content">
            <div class="overlay-image">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/curvesgreen3.png" alt="SEO Campaign">
            </div>
            <div class="text" uk-scrollspy="cls: uk-animation-fade; target: h2, li; delay: 500; repeat: true;">
                <?php echo get_field('what_you_see_content') ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/lp-overview') ?>

<?php get_template_part('template-parts/faqs') ?>

<?php get_template_part('template-parts/contact-form'); ?>



<?php get_footer(); ?>