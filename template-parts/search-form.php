<form action="<?php echo esc_url(home_url('/search-result')); ?>" id="search" method="get">

    <p>生産国</p>
    <?php get_search_terms('country'); ?>

    <p>種類</p>
    <?php get_search_terms('animal'); ?>

    <button type="submit" form="search">検索する</button>

</form>