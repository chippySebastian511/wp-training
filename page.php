<?php

/**
 * Index
 */
get_header();
writeMsg();
if (have_posts()) :
    while (have_posts()) :
        the_post();
        the_title('<h1>', '</h1>');

        the_content();
    // the_date();
    // the_excerpt();
    // printf('<a href="%s" > Read more</a>', get_permalink());
    endwhile;
endif;


get_footer();
