<!-- ============================================================================ -->
<!-- ================================== Button ================================== -->
<!-- ============================================================================ -->

<?php
if( $settings['button_text'] ) : ?>
    <a class="btn-circle <?php echo esc_attr( $settings['button_size'] ); ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>">
        <span><?php echo esc_html( $settings['button_text'] ); ?></span>
        <svg width="13px" height="10px" viewBox="0 0 13 10">
            <path d="M1,5 L11,5"></path>
            <polyline points="8 1 12 5 8 9"></polyline>
        </svg>
    </a>
<?php endif; ?>