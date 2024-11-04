<?php
function jonacruz_01_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'jonacruz-01-theme'),
        'footer' => __('Footer Menu', 'jonacruz-01-theme'),
    ));

    register_sidebar(array(
        'name' => __('Footer Widget Area', 'jonacruz-01-theme'),
        'id' => 'footer-widget-area',
        'description' => __('Appears in the footer section of the site.', 'jonacruz-01-theme'),
        'before_widget' => '<div class="footer-section">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('after_setup_theme', 'jonacruz_01_theme_setup');

function jonacruz_01_theme_css_and_scripts()
{
    wp_enqueue_style('jonacruz-01-theme-style', get_stylesheet_uri());
    wp_enqueue_script('jonacruz-01-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true);

    wp_enqueue_script('jonacruz-01-app', get_template_directory_uri() . '/js/app.js', array(), '1.0', true);
    wp_enqueue_style('jonacruz-01-tailwind', get_template_directory_uri() . '/css/style.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'jonacruz_01_theme_css_and_scripts');
