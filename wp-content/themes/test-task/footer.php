        <footer class="footer">
            <div class="container footer__container">
                <div class="logo footer__logo">
                    <?php the_custom_logo(); ?>
                </div>
                
                <?php
                    if ( function_exists('dynamic_sidebar') ) {
                        dynamic_sidebar('tt_footer');
                    }
                        
                ?>

                <div class="copyright">
                    <?php
                        if ( function_exists('dynamic_sidebar') ) {
                            dynamic_sidebar('tt_copyright');
                        }
                    ?>
                </div>
            </div>
        </footer>
    </div>

	<div id="loader">
		<img src="<?php echo get_template_directory_uri() ?>/assets/img/ripple.svg" alt="ripple">
	</div>

	<div id="overlay">
		<div id="thx">
            <?php the_field( 'form_submission_message' ); ?>
		</div>
   	</div>

    <?php wp_footer(); ?>

</body>
</html>