<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.avif" type="image/png" />
    <?php wp_head(); ?>
</head>

<body <?php body_class('h-screen'); ?>>
    <?php wp_body_open(); ?>
    <header class="bg-blue-950 shadow-md text-white">
        <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.avif" alt="Logo" class="h-8 w-auto mr-2" />
                <span class="text-xl font-bold"><?php bloginfo('name'); ?></span>

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'hidden md:flex items-center space-x-6',
                    'fallback_cb' => false,
                ));
                ?>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <button class="px-4 py-2 text-white rounded">Login</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700">
                    Sign up
                </button>
            </div>

            <button id="menuToggle" class="md:hidden text-white hover:text-slate-300">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </nav>
    </header>

    <div id="mobileMenu" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-[100] hidden">
        <div class="flex flex-col h-full bg-white w-64 p-4">
            <button id="closeMenu" class="self-end text-gray-600 hover:text-gray-900 mb-4">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex flex-col',
                'fallback_cb' => false,
            ));
            ?>
        </div>
    </div>

    <main>