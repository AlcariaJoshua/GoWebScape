<?php get_header(); 

/**
 * Template name: Thank you page
 */

?>

<style>
.thankyou {
    height: 50rem;
    display: flex;
    place-content: center;
    place-items: center;
}

.thankyou .content {
    text-align: center;
}

.thankyou .content a {
    font-size: 20px;
    padding: 20px 50px !important;
}

.thankyou .content h1 {
    text-transform: uppercase;
    font-size: 50px !important;
}

</style>

<section class="thankyou global-padding">
    <div class="wrapper">
        <div class="content">
            <h1>Thank you for reaching out!</h1>
            <div class="cta">
                <?php if (!empty($_SERVER['HTTP_REFERER'])) : ?>
                <a href="<?php echo esc_url($_SERVER['HTTP_REFERER']); ?>"  >GO BACK</a>
                <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" >HOME</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>