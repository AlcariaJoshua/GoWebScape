<?php get_header();

/**
 * Template Name: Reviews Page
 */


?>

<?php if(is_page(20)) : ?>

<style>
.lp-banner h1 {
    font-size: clamp(30px, 6vw, 80px);
}

.lp-banner p {
    font-size: clamp(20px, 6vw, 32px);
}

body {
    background-color: #f8f8f8;
}
</style>

<?php endif; ?>

<?php get_template_part("template-parts/lp-banner") ?>

<section class="reviews-container">
    <div class="wrapper">
        <div class="content">
            <div class="title" uk-scrollspy="cls: uk-animation-fade; targer: h2, p; delay: 500; repeat: true;">
                <?php echo get_field('review_title') ?>
            </div>
            <div class="card-container"
                uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;">
                <?php

                // Check rows exists.
                if (have_rows('customer_reviews')):

                    // Loop through rows.
                    while (have_rows('customer_reviews')):
                        the_row();
                        ?>
                        <div class="card">
                            <div class="info">
                                <div class="rating-category">
                                    <div class="rate">
                                        <?php
                                            $rating = floatval(get_sub_field("customer_rating")); // Ensure it's a float
                                            $fullStars = floor($rating);
                                            $halfStar = ($rating - $fullStars) >= 0.25 && ($rating - $fullStars) < 0.75 ? 1 : 0;
                                            $fullStars += ($rating - $fullStars) >= 0.75 ? 1 : 0; // Round up if >= 0.75
                                            $emptyStars = 5 - ($fullStars + $halfStar);

                                            // Full stars
                                            for ($i = 0; $i < $fullStars; $i++) {
                                                echo '<i class="fas fa-star"></i>';
                                            }

                                            // Half star
                                            if ($halfStar) {
                                                echo '<i class="fas fa-star-half-alt"></i>';
                                            }

                                            // Empty stars
                                            for ($i = 0; $i < $emptyStars; $i++) {
                                                echo '<i class="far fa-star"></i>';
                                            }

                                            echo ' <span>(' . $rating . ')</span>';
                                            ?>
                                    </div>


                                    <div class="category">
                                        <p><?php echo get_sub_field('review_tag') ?></p>
                                    </div>
                                </div>
                                <div class="text">
                                    <p><?php echo get_sub_field('customer_review') ?></p>
                                </div>
                            </div>

                            <div class="user-name">
                                <?php
                                            $image_url = get_sub_field('customer_image');
                                            $image_name = basename($image_url);
                                        ?>
                                <div class="image">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_name); ?>">
                                </div>
                                <p><?php echo get_sub_field('customer_name') ?></p>
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

            <div class="btn" uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: true;" >
                <button id="load-more-reviews">Load More</button>
            </div>


        </div>
    </div>
</section>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.card');
    const loadMoreBtn = document.getElementById('load-more-reviews');
    let currentIndex = 0;
    const initialCount = 9;
    const loadCount = 3;

    // Hide all cards
    cards.forEach(card => {
        card.style.display = 'none';
    });

    // Show initial 9 cards
    for (let i = 0; i < initialCount && i < cards.length; i++) {
        cards[i].style.display = 'flex';
    }
    currentIndex = initialCount;

    loadMoreBtn.addEventListener('click', function() {
        for (let i = currentIndex; i < currentIndex + loadCount && i < cards.length; i++) {
            cards[i].style.display = 'flex';
        }
        currentIndex += loadCount;

        if (currentIndex >= cards.length) {
            loadMoreBtn.textContent = 'No more reviews';
            loadMoreBtn.disabled = true;
        }
    });
});
</script>





<?php get_footer(); ?>