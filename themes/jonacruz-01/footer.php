</main>
<footer class="footer">
    <div class="footer-content">
        <?php if (is_active_sidebar('footer-widget-area')) : ?>
            <?php dynamic_sidebar('footer-widget-area'); ?>
        <?php else : ?>
            <div class="footer-section">
                <h3><?php _e('About Us', 'jonacruz-01-theme'); ?></h3>
                <p><?php bloginfo('description'); ?></p>
            </div>
            <div class="footer-section">
                <h3><?php _e('Quick Links', 'jonacruz-01-theme'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => '',
                ));
                ?>
            </div>
            <div class="footer-section">
                <h3><?php _e('Contact Us', 'jonacruz-01-theme'); ?></h3>
                <p>Email: info@example.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
        <?php endif; ?>
    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'jonacruz-01-theme'); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>