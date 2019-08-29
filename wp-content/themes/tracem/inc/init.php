<?php
/**
 * Tracem INIT file
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */
define( 'TRACEM_INC', get_parent_theme_file_path( 'inc' ) );
define( 'TRACEM_CS_INC', get_parent_theme_file_path( 'cs-framework-override/config/inc' ) );

// Core
require TRACEM_INC . '/core/setup.php';
require TRACEM_INC . '/core/theme-setup.php';
require TRACEM_INC . '/core/widgets.php';
require TRACEM_INC . '/core/theme-scripts.php';
require TRACEM_INC . '/core/extra.php';
require TRACEM_INC . '/core/hooks.php';
require TRACEM_INC . '/core/breadcrumbs.php';
require TRACEM_INC . '/core/megamenu.php';

// Inc
require TRACEM_INC . '/custom-header.php';
require TRACEM_INC . '/template-tags.php';
require TRACEM_INC . '/template-functions.php';
require TRACEM_INC . '/tracem-navwalker.php';
require TRACEM_INC . '/customizer.php';
require TRACEM_INC . '/style.php';

require TRACEM_INC . '/tgmpa/tgm-plugin-setup.php';

// Helpers
require TRACEM_INC . '/helpers/comment-template.php';
require TRACEM_INC . '/helpers/pagination.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require TRACEM_INC . '/jetpack.php';
}

// Page
require TRACEM_INC . '/page/layout.php';
require TRACEM_INC . '/page/hooks.php';