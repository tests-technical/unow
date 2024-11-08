</main>

<footer class="bg-white">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col items-center justify-center space-y-4 sm:flex-row sm:justify-between sm:space-y-0">
            <div class="flex items-center space-x-1 text-gray-600">
                <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</span>
            </div>
            <div class="flex items-center space-x-2 text-gray-600">
                <span>Made with</span>
                <span>by <?php bloginfo('name'); ?> Team</span>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>