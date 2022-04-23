<footer class="footer">
            <div class="container footer__container">
                <div class="logo footer__logo">
                    <?php the_custom_logo(); ?>
                </div>
                
                <?php
                    if ( function_exists('dynamic_sidebar') ) {
                        dynamic_sidebar('tt_sidebar');
                    }
                        
                ?>

<div id="footer-widgets">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
        <?php endif; ?>
    </div>
                
                <div class="copyright">
                    Copyright © 2021 All right reserved
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>

</body>
</html>