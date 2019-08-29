<!-- ============================================================================ -->
<!-- ============================ Home Pieces Slider ============================ -->
<!-- ============================================================================ -->


<?php
$tracem_body_extra_font_family = '';
if( function_exists( 'cs_get_option' ) ) {
    $tracem_body_extra_font_family      = cs_get_option( 'tracem_body_extra_font_family' );
}
?>

<!-- Pieces Slider -->
<div class="pieces-slider" data-font-family="<?php echo esc_attr( $tracem_body_extra_font_family['family'] ); ?>">
    <!-- Each slide with corresponding image and text -->
    <?php
    while( $portfolio->have_posts() ) : $portfolio->the_post();
    $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
    <div class="pieces-slider__slide">
        <img class="pieces-slider__image" src="<?php echo esc_url( $portfolio_thumb ) ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
        <?php
        the_title( '<h2 class="pieces-slider__text">', '</h2>' ); ?>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
    <!-- Canvas to draw the pieces -->
    <canvas class="pieces-slider__canvas"></canvas>
    <!-- Slider buttons: prev and next -->
    <button class="pieces-slider__button pieces-slider__button--prev"><span class="ti-arrow-left"></span></button>
    <button class="pieces-slider__button pieces-slider__button--next"><span class="ti-arrow-right"></span></button>
</div>