<?php get_header(); ?>

<main class="main">
    <section class="hero">
        <div class="container hero__container">
            <div class="hero__offer">
                <?php the_content(); ?>
            </div>
            <div class="hero__img" style="background-image: url( '<?php echo get_the_post_thumbnail_url() ?>' )"></div>
        </div>
    </section>
    <section class="superstar">
        <div class="container superstar__container">
            <div class="superstar__content">
                <h2 class="superstar__title"><?php the_field( 'superstar_title' ); ?></h2>
                <p class="superstar__desc">
                    <?php the_field( 'superstar_description' ); ?>
                </p>
                <a href="<?php the_field( 'superstar_link_button' ); ?>" class="btn superstar__btn" target="_blank"><?php the_field( 'superstar_text_button' ); ?></a>
            </div>
        </div>
    </section>
    <section class="reviews swiper">
        <div class="reviews__top">
            <h2 class="reviews__title">What My <span class="text-green">Clients Say</span></h2>
            <div class="reviews__control">
                <div class="swiper-button-prev swiper-button-count">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1_769)">
                        <path d="M0.229141 9.44711C0.229376 9.44687 0.22957 9.4466 0.229843 9.44636L4.31203 5.38387C4.61785 5.07953 5.1125 5.08067 5.41691 5.38653C5.72129 5.69235 5.72012 6.18699 5.4143 6.49137L2.67352 9.21886H19.2188C19.6502 9.21886 20 9.56863 20 10.0001C20 10.4316 19.6502 10.7814 19.2188 10.7814H2.67355L5.41426 13.5089C5.72008 13.8132 5.72125 14.3079 5.41687 14.6137C5.11246 14.9196 4.61777 14.9207 4.31199 14.6164L0.229805 10.5539C0.22957 10.5536 0.229374 10.5534 0.229101 10.5531C-0.0768757 10.2477 -0.0758991 9.75148 0.229141 9.44711Z"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_769">
                        <rect width="20" height="20" fill="white" transform="matrix(-1 0 0 1 20 0)"/>
                        </clipPath>
                        </defs> 
                    </svg>
                </div>
                <div class="swiper-button-next swiper-button-count">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1_763)">
                        <path d="M19.7709 9.44711C19.7706 9.44687 19.7704 9.4466 19.7702 9.44636L15.688 5.38387C15.3821 5.07953 14.8875 5.08067 14.5831 5.38653C14.2787 5.69235 14.2799 6.18699 14.5857 6.49137L17.3265 9.21886H0.78125C0.349766 9.21886 0 9.56863 0 10.0001C0 10.4316 0.349766 10.7814 0.78125 10.7814H17.3264L14.5857 13.5089C14.2799 13.8132 14.2788 14.3079 14.5831 14.6137C14.8875 14.9196 15.3822 14.9207 15.688 14.6164L19.7702 10.5539C19.7704 10.5536 19.7706 10.5534 19.7709 10.5531C20.0769 10.2477 20.0759 9.75148 19.7709 9.44711Z"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_763">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
        <div class="swiper-wrapper slider__list">

            <?php $reviews = new WP_Query( array(
				'post_type' => 'reviews',
				'posts_per_page' => -1,
                'order' => 'ASC',
			));

            if ( $reviews->have_posts() ) :

                while ( $reviews->have_posts() ) : $reviews->the_post();

            ?>
                <div class="swiper-slide slider__item">
                    <div class="slider__img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="slider__content">
                        <p class="slider__text">
                            <?php echo get_the_content(); ?>
                        </p>
                        <p class="slider__name"><?php echo get_the_title(); ?></p>
                        <p class="slider__position"><?php echo get_the_excerpt(); ?></p>
                    </div>
                </div>
            <?php endwhile;
                wp_reset_postdata();
                endif;
            ?>

        </div>
        <div class="swiper-scrollbar"></div>
        <div class="swiper-pagination"></div>
    </section>
    <section class="shape">
        <div class="container shape__container">
            <div class="shape__content">
                <h2 class="shape__title"><?php the_field( 'shape_title' ); ?></h2>
                <?php
                    if ( function_exists('dynamic_sidebar') ) {
                        dynamic_sidebar('tt_contacts');
                    }                        
                ?>
            </div>
            <div class="shape__form">
                <form action="submit.php" class="submit-form" id="popupResult">
                    <input type="text" name="name" class="shape__input" placeholder="Name">
                    <input type="email" name="email" class="shape__input" placeholder="Email">
                    <textarea name="message" id="" cols="30" rows="10" class="shape__message" placeholder="Write something..."></textarea>
                    <button data-submit class="btn shape__btn"><?php the_field( 'shape_button_text' ); ?></button>
                </form>
            </div>
        </div>
    </section>
</main>
        
<?php get_footer();