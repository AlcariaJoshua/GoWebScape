<section class="faqs global-padding">
			<div class="wrapper">
				<div class="content">
					<div class="title">
						<h2>Frequently 
							Asked Questions
						</h2>
					</div>
					<?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $faqsPosts = array(
                            'paged' => $paged,
                            'post_type' => 'faqs',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        );

                        $blogs = new WP_Query($faqsPosts);

                        if ($blogs->have_posts()):
                            $counter = 0;
                        ?>
                            <ul uk-accordion>
                                <?php while ($blogs->have_posts()): $blogs->the_post(); $counter++; ?>
                                    <li class="<?php echo $counter === 0 ? 'uk-open' : ''; ?>">
                                        <a class="uk-accordion-title" href="#"><?php the_title(); ?></a>
                                        <div class="uk-accordion-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <h2>Sorry, no FAQs have been found.</h2>
                        <?php endif; wp_reset_postdata(); ?>                    
				</div>
			</div>

		</section>

