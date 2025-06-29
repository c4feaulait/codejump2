<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
    
</head>

<body>
    <header id="header" class="wrapper">
        <?php get_template_part('includes/header'); ?>
    </header>

    <main>
        <div id="top" class="wrapper">
            <div class="breadClumb">
                <?php echo get_template_part('template-parts/bread') ?>

                <?php echo get_template_part('template-parts/search-form'); ?>
            </div>
            <ul class="product-list">
                <?php $args = array('post_type' => 'products', 'posts_per_page' => 8); ?>
                <?php $posts = get_posts($args); ?>
                <?php foreach ($posts as $post): ?>
                    <?php setup_postdata($post); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            $id = get_post_thumbnail_id();
                            $img = wp_get_attachment_image_src($id);
                            ?>

                            <img src="<?php echo $img[0] ?>" alt="">
                            <p><?php the_title(); ?></p>
                            <?php $price = get_post_meta(get_the_ID(), 'price', true); ?> <!--get_the_ID()で投稿のIDを取得-->
                            <p>&yen<?php echo $price; ?>+tax</p>

                            <ul class="category">
                                <li class="category__item">
                                    <?php $terms = get_the_terms(get_the_ID(), 'country');
                                    // var_dump($term);
                                    ?>
                                    <?php if ($terms): ?>
                                        <?php foreach ($terms as $term): ?>
                                            <p><a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a></p>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </li>
                                <li class="category__item">
                                    <?php $termsAnimal = get_the_terms(get_the_ID(), 'animal');?>
                                    <?php if ($termsAnimal): ?>
                                        <?php foreach ($termsAnimal as $termAnimal): ?>
                                            <p><a href="<?php echo get_term_link($termAnimal); ?>"><?php echo esc_html($termAnimal->name); ?></a></p>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </li>
                            </ul>


                        </a>
                    </li>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>

            </ul>



            <!-- <div class="content">
                        <?php get_search_form(); ?>
                    </div> -->

            <a class="link-text" href="<?php echo esc_attr(home_url('/products')); ?>">View More</a>
        </div>



    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>


    <?php get_footer(); ?>
</body>

</html>