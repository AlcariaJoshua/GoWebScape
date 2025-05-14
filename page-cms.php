<?php get_header();

/**
 * Template Name: CMS Page
 */

?>


<?php if(is_page(479)) : ?>

    <style>
        .lp-banner .content .text p{
                margin: 0px;
                margin-bottom: 20px;
                font-size: 40px;
        }

        .lp-banner .content .text p:last-child{
            margin: 0px;
            font-size: 20px;
        }

        .lp-overview {
            .text-content {
                background-color: #ffffff;
                height: fit-content;
                padding: 30px;
                border: 1px solid #d6d6d6;
                border-radius: 20px;
                box-shadow: 0px 1px 8px -5px #000;
                .image-text {
                    display: flex;
                    background-color: unset;
                    padding: unset;
                    border: unset;
                    box-shadow: unset;
                    border-radius: unset;
                    gap: 30px;
                    .image {
                        width: 30%;
                        img {
                        border-bottom: unset;
                        margin: 0px;
                        padding: 0px;
                        height: 250px;
                        }
                    }
                    .text {
                        width: 70%;
                    }
                    &:nth-child(odd){
                    margin-bottom: 50px;
                    padding-bottom: 30px;
                    border-bottom: 1px solid #d6d6d6;
                    }
                }
                
            }
        }

        @media(max-width: 1199px){
            .text-content .image-text{
                flex-direction: column;
                .text{
                    width: 100% !important;
                }
            }

            .text-content .image-text .image {
                height: unset;
                width: 100% !important;
                img{
                    object-fit: cover !important;
                }
            }
        }
    </style>

<?php endif; ?>

<?php get_template_part("template-parts/lp-banner") ?>

<?php get_template_part("template-parts/flatform-use") ?>


<section class="cms-can-do">
    <div class="wrapper">
        <div class="content">
            <div class="title">
            <?php echo get_field("what_cms_can_do_title") ?>
            </div>
            <div class="card-con" uk-scrollspy="cls: uk-animation-fade; target: .card; delay: 500; repeat: true;" >
            <?php
            // Check rows exists.
            if (have_rows('what_cms_can_do_card')):

                // Loop through rows.
                while (have_rows('what_cms_can_do_card')):
                    the_row();
                    ?>

                <?php $cardbgColor = get_sub_field('bgcolor') ?>

                <div class="card" style="background-color: <?php echo $cardbgColor ?>" >
                        <h3><?php echo get_sub_field('sub_title') ?></h3>
                        <p><?php echo get_sub_field('description') ?></p>
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

<?php get_template_part("template-parts/lp-overview") ?>


<?php get_template_part("template-parts/faqs") ?>

<?php get_template_part("template-parts/contact-form") ?>

<?php get_footer(); ?>