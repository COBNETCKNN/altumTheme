<?php get_header(); ?>

<section id="speakers" class="py-14">
    <!-- HERO SECTION -->
    <section id="speakerseHero">
        <div class="container mx-auto">
            <!-- CONTENT SECTION -->
            <div class="grid grid-cols-2 gap-4">
                <!-- LEFT SECTION -->
                <div class="w-8/12 mt-24">
                    <h1 class="speakers_hero__heading font-montserrat text-altumTitle text-4xl font-black mb-10">Look through all the speakers that will share the best practises in complementary medicine</h1>
                    <p class="font-montserrat text-altumContent text-base font-normal ">We just announced our fill congress lineup of 50 inspiring speakers, 2 full-day workshop tracks, 5 detailed QnA Sessions and a lot of 1v1 Zoom Rooms to meet new amazing people.</p>
                    <!-- AGENDA -->
                    <a class="flex justify-start my-auto mt-14" href="#">
                        <img class="altum_footer__arrow" src="<?php echo get_template_directory_uri(); ?>/images/altum-footer-arrow.png" alt="">
                        <span class="text-sm text-altumBrown font-montserrat uppercase font-semibold my-auto ml-5">Agenda</span>
                    </a>
                </div>
                <!-- RIGHT SECTION -->
                <div>
                    <img class="spekaers_hero__image" src="<?php echo get_template_directory_uri() . '/images/speakers-hero.jpg'; ?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- SPEAKERS -->
    <section id="speakersSpeakers" class="my-24">
        <div class="container mx-auto">
            <h2 class="speakers_speakers__title text-4xl font-montserrat text-altumTitle font-black mb-12">Speakers</span></h2>
            <div class="grid grid-cols-5 gap-4">
                <!-- FILTERS SECTION -->
                <div class="col-span-1">

                </div>
                <!-- SPEAKERS CARDS -->
                <div class="col-span-4 mx-auto">
                    <div class="grid grid-cols-4 gap-10 mx-auto">
                        <?php 
                            if ( have_posts() ) {
                                while ( have_posts() ) {
                                    the_post();  ?>

                                <a href="<?php the_permalink(); ?>">
                                    <div class="speakersCard px-7 py-10">
                                        <div>
                                            <div class="speakersCard_image mb-2.5">
                                                <?php the_post_thumbnail('speakers-card'); ?>
                                            </div>
                                            <h3 class="font-montserrat text-base font-bold mb-2.5"><?php the_title(); ?></h3>
                                            <div class="font-montserrat text-sm text-altumCountry font-medium">
                                                <?php 
                                                    // outputing result of selected category
                                                    $taxonomyLocation = get_the_terms( $post->ID, 'country' );
                                                    
                                                    foreach ( $taxonomyLocation as $taxonomyLocation ) {
                                                    echo $taxonomyLocation->name; // or whatever value
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                        <?php 
                                } // end while
                            } // end if
                            ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
</section>

<?php get_footer(); ?>