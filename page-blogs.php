<?php get_header();

/**
 * Template Name: Blogs Page
 */

?>

<?php get_template_part("template-parts/lp-banner") ?>

<section class="blogs">
    <div class="wrapper">
        <div class="content">
            <div class="title-search">
                <h2>Recent blog posts</h2>
            </div>
            <div class="latest-blogs" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;">
                <?php
                    $latestBlogs = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $latestBlogPost = array(
                        'paged' => 1,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'order' => 'DESC', // Order by latest posts first
                        'orderby' => 'date'  // Sort by date
                    
                    );
                    $latestPost = new WP_Query($latestBlogPost);

                    $excluded_post = array();

                    if ($latestPost->have_posts()):

                        $counter = 1;

                        while ($latestPost->have_posts()):
                            $latestPost->the_post();

                            $excluded_post[] = get_the_ID();

                            $feautredIMG = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                            
                            if ($counter === 1) {
                                $word_count = 20;
                            } elseif ($counter === 2 || $counter === 3) {
                                $word_count = 14;
                            } elseif ($counter === 4) {
                                $word_count = 50;
                            }
                            
                            ?>

                <div class="card uk-position-relative">

                    <?php if (has_post_thumbnail()): ?>
                    <?php
                                            // Get the URL of the featured image
                                            $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                        ?>
                    <div class="image">
                        <img src="<?php echo esc_url($featuredIMG[0]); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <?php else: ?>

                    <div class="image">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gowebscape_logo.jpg"
                            alt="<?php esc_attr_e('Default Image', 'your-text-domain'); ?>">
                    </div>
                    <?php endif; ?>

                    <div class="card-content ">
                        <div class="author">
                            <p><?php echo get_the_author(); ?></p>
                            <i class="fa-solid fa-circle"></i>
                            <p><?php echo get_the_date("d M Y"); ?></p>
                        </div>
                        <h3>
                            <?php echo the_title(); ?>
                        </h3>

                        <p>
                            <?php echo wp_trim_words(apply_filters('the_content', get_the_content()), $word_count, '. . .'); ?>
                        </p>

                        <div class="tags">
                            <?php
                                $tags = get_the_tags();
                                    if ($tags) {
                                        foreach ($tags as $tag) {
                                            // Generate random RGB values
                                            $r = mt_rand(0, 255);
                                            $g = mt_rand(0, 255);
                                            $b = mt_rand(0, 255);

                                            $background = "rgba($r, $g, $b, 0.1)"; // Transparent background
                                            $textColor = "rgb($r, $g, $b)";         // Solid text color

                                            echo '<p style="background-color: ' . $background . '; color: ' . $textColor . '; padding: 5px 20px; display: inline-block; margin: 5px 5px 0 0;">' . esc_html($tag->name) . '</p>';
                                        }
                                    }
                            ?>
                        </div>

                        <a href="<?php echo get_permalink()?>" class="uk-position-cover"></a>

                    </div>

                </div>

                <?php endwhile; else:
                        ?>
                <h2>Sorry, no more featured blogs</h2>
                <?php endif;
                    // Reset post data to avoid issues with ACF or global $post.
                    wp_reset_postdata();
                    ?>

            </div>
        </div>
    </div>
</section>


<section class="other-blogs global-padding">
    <div class="wrapper">
        <div class="content">
            <h2>All blog posts</h2>

            <div class="card-con" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $blogPosts = array(
                        'paged' => $paged,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 9,
                        'order' => 'DESC', // Order by latest posts first
                        'orderby' => 'date',  // Sort by date
                        // 'post__not_in' => $excluded_post,
                    );
                    $blogsSec = new WP_Query($blogPosts);
                    if ($blogsSec->have_posts()):
                        while ($blogsSec->have_posts()):
                            $blogsSec->the_post();
                            $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                            ?>

                <div class="card uk-position-relative">

                    <?php if (has_post_thumbnail()): ?>
                    <?php
                                    // Get the URL of the featured image
                                    $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                ?>
                    <div class="image">
                        <img src="<?php echo esc_url($featuredIMG[0]); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <?php else: ?>

                    <div class="image">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gowebscape_logo.jpg"
                            alt="<?php esc_attr_e('Default Image', 'your-text-domain'); ?>">
                    </div>
                    <?php endif; ?>

                    <div class="card-content">
                        <div class="author">
                            <p><?php echo get_the_author(); ?></p>
                            <i class="fa-solid fa-circle"></i>
                            <p><?php echo get_the_date("d M Y"); ?></p>
                        </div>
                        <h3>
                            <?php echo wp_trim_words(apply_filters('the_title', get_the_title()), 5, '. . .'); ?>
                        </h3>

                        <p>
                            <?php echo wp_trim_words(apply_filters('the_content', get_the_content()), $word_count, '. . .'); ?>
                        </p>

                        <div class="tags">
                            <?php
                                $tags = get_the_tags();
                                    if ($tags) {
                                    foreach ($tags as $tag) {
                                     // Generate random RGB values
                                    $r = mt_rand(0, 255);
                                    $g = mt_rand(0, 255);
                                    $b = mt_rand(0, 255);

                                    $background = "rgba($r, $g, $b, 0.1)"; // Transparent background
                                    $textColor = "rgb($r, $g, $b)";         // Solid text color

                                    echo '<p style="background-color: ' . $background . '; color: ' . $textColor . '; padding: 5px 20px; display: inline-block; margin: 5px 5px 0 0;">' . esc_html($tag->name) . '</p>';
                                    }
                                }
                            ?>
                        </div>

                        <a href="<?php echo get_permalink()?>" class="uk-position-cover"></a>
                    </div>

                </div>

                <?php endwhile; else:
                        ?>
                <h2>Sorry, no more featured blogs</h2>
                <?php endif;
                    // Reset post data to avoid issues with ACF or global $post.
                    wp_reset_postdata();
                    ?>
            </div>

            <!-- Pagination -->

            <?php
                function custom_paginate_links($total_pages, $current_page) {
                    $prev = '';
                    $numbers = '';
                    $next = '';

                    // Previous button (always show)
                    if ($current_page > 1) {
                        $prev = sprintf(
                            '<a href="%s" class="prev">Previous</a>',
                            esc_url(get_pagenum_link($current_page - 1))
                        );
                    } else {
                        $prev = '<span class="prev disabled">Previous</span>';
                    }

                    // Page numbers
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $class = ($i === $current_page) ? 'current' : '';
                        $numbers .= sprintf(
                            '<a href="%s" class="%s">%d</a>',
                            esc_url(get_pagenum_link($i)),
                            esc_attr($class),
                            $i
                        );
                    }

                    // Next button (always show)
                    if ($current_page < $total_pages) {
                        $next = sprintf(
                            '<a href="%s" class="next">Next</a>',
                            esc_url(get_pagenum_link($current_page + 1))
                        );
                    } else {
                        $next = '<span class="next disabled">Next</span>';
                    }

                    return [
                        'prev' => $prev,
                        'numbers' => $numbers,
                        'next' => $next,
                    ];
                }

                $current_page = max(1, get_query_var('paged'));
                $total_pages = $blogsSec->max_num_pages;

                if ($total_pages > 1) {
                    $pagination = custom_paginate_links($total_pages, $current_page);
                    echo '<div class="pagination other-blogs-pagination">';
                    echo '<div class="previos">' . $pagination['prev'] . '</div>';
                    echo '<div class="number">' . $pagination['numbers'] . '</div>';
                    echo '<div class="next">' . $pagination['next'] . '</div>';
                    echo '</div>';
                }
            ?>

        </div>
    </div>
</section>








<?php get_footer(); ?>