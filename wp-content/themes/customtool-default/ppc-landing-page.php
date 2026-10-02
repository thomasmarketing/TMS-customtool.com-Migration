<?php
/*
Template Name: PPC Landing Page
*/
?>

<?php Starkers_Utilities::get_template_parts(
    array(
        'parts/shared/html-header',
        'parts/shared/header-ppc'
    )
); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="site-content ppc-landing" role="main">
    <div class="inner-wrap">

        <div class="landing-module">

            <!-- LEFT CONTENT -->
            <div class="lm-content">

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ebook-image">
                        <?php
                        the_post_thumbnail(
                            'full',
                            array(
                                'alt'   => esc_attr( get_the_title() ),
                                'title' => esc_attr( get_the_title() )
                            )
                        );
                        ?>
                    </div>
                <?php endif; ?>

                <?php the_content(); ?>

            </div>

            <!-- RIGHT FORM -->
            <div class="lm-form">

                <?php
                if ( function_exists( 'get_field' ) ) {
                    $shortcode = get_field( 'lp_form' );

                    if ( ! empty( $shortcode ) ) {
                        echo do_shortcode( $shortcode );
                    }
                }
                ?>

            </div>

        </div>

    </div>
</section>

<?php endwhile; endif; ?>

<?php Starkers_Utilities::get_template_parts(
    array(
        'parts/shared/footer',
        'parts/shared/html-footer'
    )
); ?>