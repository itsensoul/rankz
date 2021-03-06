<?php

namespace Ensoul\Rankz\DisableWidgets;

/**
 * Disable widgets
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-disable-widgets');
 */

/**
 * Disable widgets from admin menu
 */
function disable_widgets_admin_menu() {
  remove_submenu_page('themes.php', 'widgets.php');
}
add_action('admin_menu', __NAMESPACE__ . '\\disable_widgets_admin_menu');

/**
 * Disable widgets from admin bar
 */
function disable_widgets_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('widgets');
}
add_action('wp_before_admin_bar_render', __NAMESPACE__ . '\\disable_widgets_admin_bar');

/**
 * Redirect any user trying to access widgets page
 */
function widgets_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'widgets.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\widgets_admin_menu_redirect');
