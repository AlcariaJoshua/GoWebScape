<?php get_header();


/**
 * Template Name: Web Design Page
 */

?>



<?php get_template_part("template-parts/lp-banner") ?>


<section class="website-design-container">
    <div class="wrapper">
        <div class="content">
            <div class="card-container" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;" >
                <?php
                $count = 0;
                $blogs = new WP_Query([
                        'paged' => $paged,
                        'post_type' => 'web-design',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC',

                ]);
                if ($blogs->have_posts()):
                    while ($blogs->have_posts()):
                        $blogs->the_post();
                        $featuredIMG = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        ?>
                        <div class="card" style="<?php echo $count >= 9 ? 'display: none;' : ''; ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php if ($featuredIMG): ?>
                                    <div class="image">
                                        <img src="<?php echo esc_url($featuredIMG[0]); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php $count++; endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
            </div>

            <div class="loadmore">
                <button id="load-more">Load More</button>
            </div>

        </div>
    </div>
</section>




<!-- loadmore singles post-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const loadMoreBtn = document.getElementById("load-more");
    const cards = document.querySelectorAll(".card-container .card");
    let visibleCount = 9;
    const loadCount = 3;

    loadMoreBtn.addEventListener("click", function () {
        let revealed = 0;
        for (let i = visibleCount; i < cards.length && revealed < loadCount; i++) {
            cards[i].style.display = "block";
            revealed++;
        }
        visibleCount += revealed;

        if (visibleCount >= cards.length) {
            loadMoreBtn.textContent = "No more to show";
            loadMoreBtn.disabled = true;
        }
    });
});
</script>



<?php get_footer(); ?>