
<?php if(is_page(30)) : ?>

	<style>
		.contact-form .content{
			justify-content: space-between;
		}
	</style>


<?php endif; ?>

<section class="contact-form global-padding">
    <div class="wrapper">
        <div class="content">
            <div class="title">
                <?php if (is_page(30)) : ?>
                <h1><?php echo the_title(); ?></h1>
                <?php else : ?>
                <h2>Let's Make An
                     Impack</h2>
                <?php endif;?>


            </div>

            <?php echo do_shortcode('[contact-form-7 id="489769c" title="Contact form"]') ?>

        </div>
    </div>
</section>