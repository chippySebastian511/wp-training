<?php
get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php
                /* translators: %s: search query. */
                printf(esc_html__('Search Results for: %s', 'wp-training'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
        </header><!-- .page-header -->

    <?php
        while (have_posts()) :
            the_post();
            the_excerpt();
        endwhile;

        the_posts_navigation();

    else :

        echo 'nothing found!';

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
