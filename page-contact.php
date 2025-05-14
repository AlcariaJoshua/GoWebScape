<?php get_header();

/**
 * Template Name: Contact Us Page
 */

?> 

<style>

    .location p {
        margin: 0px;
    }
</style>


<?php get_template_part("template-parts/contact-form") ?>

<section class="location">
    <?php echo get_field('company_location') ?>
</section>

<?php get_footer(); ?>