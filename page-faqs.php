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
        <section class="faq">
            <div class="content wrapper">
                <h1 class="page-title"><?php the_title(); ?></h1>

                <?php the_content(); ?>

            </div>
        </section>

    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>

    <?php get_footer(); ?>
</body>

</html>