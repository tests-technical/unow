<?php get_header(); ?>

<section class="relative flex flex-col items-center pt-10 text-white gap-3 sm:pb-64 overflow-hidden">
    <div class="absolute inset-0 bg-blue-950 z-0"></div>
    <div class="hidden sm:block absolute inset-0 bg-[url('/img/hero1.avif')] bg-right bg-contain bg-no-repeat opacity-50 z-10"></div>
    <div class="hidden sm:block absolute inset-0 bg-[url('/img/hero2.avif')] bg-bottom bg-contain bg-no-repeat opacity-50 z-20"></div>
    <div class="relative z-50 flex flex-col p-4 items-start sm:items-center gap-3">
        <h2 class="text-sm">Super. Simple. Banking.</h2>
        <h1 class="text-5xl sm:max-w-md sm:text-center">
            <?php bloginfo('description'); ?>
        </h1>
        <h2 class="text-sm">
            Simple, transparent banking. No hidden fees and free overdrafts.
        </h2>
        <div class="flex flex-col sm:flex-row gap-4 mt-4 w-full justify-center">
            <button class="px-4 py-2 bg-white text-black border border-gray-300 rounded hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                Demo
            </button>
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700">
                Sign up
            </button>
        </div>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/img/hero3.avif" alt="" class="relative z-50 sm:hidden" />
</section>

<section class="bg-white container mx-auto">
    <div class="px-4 py-10">
        <h6 class="text-purple-700 text-sm">Features</h6>
        <h2 class="text-xl font-semibold tracking-wide">
            The only card you'll ever need. Simple.
        </h2>
        <p class="text-base max-w-[70%]">
            Spend smarter, lower your bills, get cashback on everything you buy, and unlock credit to grow your business.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 mt-12 gap-4 md:gap-24">
            <div class="flex flex-col gap-4">
                <div class="flex gap-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/icons/1.avif" alt="" class="w-8 h-8" />
                    <div class="flex flex-col">
                        <h3 class="text-base font-semibold mb-2">Spend smarter</h3>
                        <p class="text-xs mb-4">
                            Get insights that help you spend smarter and save on bills.
                        </p>
                        <a href="" class="text-xs text-blue-600 font-semibold">Learn more</a>
                    </div>
                </div>

                <div class="flex gap-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/icons/2.avif" alt="" class="w-8 h-8" />
                    <div class="flex flex-col">
                        <h3 class="text-base font-semibold mb-2">
                            Easy expense policies
                        </h3>
                        <p class="text-xs mb-4">
                            Every card comes with configurable spending limits, purchase
                            restrictions, and cancellations for each employee and team.
                        </p>
                        <a href="" class="text-xs text-blue-600 font-semibold">Learn more</a>
                    </div>
                </div>

                <div class="flex gap-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/icons/3.avif" alt="" class="w-8 h-8" />
                    <div class="flex flex-col">
                        <h3 class="text-base font-semibold mb-2">
                            Advanced analytics
                        </h3>
                        <p class="text-xs mb-4">
                            An all-in-one platform that helps you balance everything
                            your team need to be happy and your finances in order.
                        </p>
                        <a href="" class="text-xs text-blue-600 font-semibold">Learn more</a>
                    </div>
                </div>
            </div>

            <img src="<?php echo get_template_directory_uri(); ?>/img/feature2.avif" alt="" class="hidden sm:block h-[calc(100%+32px)]" />
        </div>
    </div>

    <img src="<?php echo get_template_directory_uri(); ?>/img/feature1.avif" alt="" class="block sm:hidden mt-4" />
</section>

<section class="bg-[#F9FAFB] py-10 flex flex-col items-center justify-center gap-4">
    <h2 class="text-xl font-semibold">Start your free trial</h2>
    <p class="text-sm">
        Join over 4,000+ startups already growing with Untitled.
    </p>

    <div class="flex gap-4 mt-4">
        <button class="px-4 py-2 bg-white text-black border border-gray-300 rounded hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            Learn more
        </button>
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700">
            Get started
        </button>
    </div>
</section>

<section>
    <?php the_content(); ?>
</section>

<?php get_footer(); ?>