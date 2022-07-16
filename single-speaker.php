<?php get_header(); ?>

<section id="singleSpeaker">
    <div class="container mx-auto">
        <!-- ALL SPEAKERS REDIRECT ARROW -->
        <div class="speakers_arrow__all mt-14 mb-24">
            <a href="#">
                <div class="flex">
                    <span class="-mt-2 text-4xl">&#8592;</span>
                    <span class="font-montserrat font-bold text-xs text-altumFont my-auto ml-5">All Speakers</span>
                </div>
            </a>
        </div>
        <!-- CONTENT SECTION -->
        <div class="grid grid-cols-2 gap-4">
            <!-- LEFT SECTION -->
            <div class="w-9/12">
                <h1 class="font-montserrat text-altumTitle text-2xl font-bold mb-10"><?php the_title(); ?></h1>
                <div class="font-montserrat text-altumContent text-base font-normal"><?php the_content(); ?></div>
            </div>
            <!-- RIGHT SECTION -->
            <div>
                <?php echo the_post_thumbnail('single-speaker', ['class' => 'singleSpeaker_image', 'title' => 'Speaker']);?>
            </div>
        </div>
        <!-- SESSIONS -->
        <div>
            <h2 class="font-montserrat text-altumTitle text-2xl font-black mb-12">Sessions</h2>
            <?php 
            // Check rows exists.
            if( have_rows('speakers_sessions') ):

                // Loop through rows.
                while( have_rows('speakers_sessions') ) : the_row();

                    // Load sub field value.
                    $sessionTitle = get_sub_field('speaker_session_title');
                    $sessionLink = get_sub_field('speaker_sessions_link_to_session');
                    // Do something... ?>

                    <a href="<?php echo $sessionLink; ?>">
                        <h3 class="font-montserrat text-altumTitle text-base font-semibold underline mb-10"><?php echo $sessionTitle; ?></h3>
                    </a>
                    


                <?php
                // End loop.
                endwhile;

            // No value.
            else :
                // Do something...
            endif;
            ?>
        </div>
    </div>
</section>
<section id="anyQuestions" class="my-48">
    <div class="container mx-auto">
        <div class="flex justify-center mb-24">
            <h2 class="singleSpeaker_anyQuestions__title font-montserrat text-altumTitle font-black">Do you have any <span class="text-altumBlue">questions?</span></h2>
        </div>
        <!-- CONTACT US -->
        <a class="flex justify-center my-auto" href="#">
            <img class="altum_footer__arrow" src="<?php echo get_template_directory_uri(); ?>/images/altum-footer-arrow.png" alt="">
            <span class="text-sm text-altumBrown font-montserrat uppercase font-semibold my-auto ml-5">Contact us</span>
        </a>

    </div>
</section>

<?php get_footer(); ?>