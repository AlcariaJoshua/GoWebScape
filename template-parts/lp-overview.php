<section class="lp-overview">
    <div class="content">
        <div class="text">
            <?php echo get_field('lp_overview_content') ?>
        </div>
        <div class="text-content">
            <?php
            // Check rows exists.
            if (have_rows('lp_overview_image')):

                // Loop through rows.
                while (have_rows('lp_overview_image')):
                    the_row();
                    ?>
            <div class="image-text">
                <?php
                    $image_url = get_sub_field('image');
                    $image_name = basename($image_url);
                ?>

                <div class="image">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                </div>
               
               <div class="text">
                <p><?php echo get_sub_field('text') ?></p>
               </div>
            </div>
            <?php endwhile; ?>
                <?php else: ?>
                    <p>No branding images found.</p>
                <?php endif; ?>
        </div>
    </div>
</section>

<div class="lp-overview-desc">
<p><?php echo get_field('lp_overview') ?></p>
</div>