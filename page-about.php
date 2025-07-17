<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
</head>

<body>
    <header id="header" class="wrapper">
        <?php get_template_part('includes/header'); ?>
        <div id="mask"></div>
    </header>

    <main>
        <div class="content wrapper">
            <h1 class="page-title">About</h1>
            <div id="about">
                <p>
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                </p>
                <p>
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                </p>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropdown__btn" onclick="onClickDropDownButton(event)">
                選択してください
            </button>
            <div class="dropdown__menu-layer" onclick="onClickDropdownOutside(event)">
                <ul class="dropdown__menu">
                    <li class="dropdown__item" data-value="1" onclick="onClickDropdownMenuItem(event)">
                        メニュー1
                    </li>
                    <li class="dropdown__item" data-value="2" onclick="onClickDropdownMenuItem(event)">
                        メニュー2
                    </li>
                    <li class="dropdown__item" data-value="3" onclick="onClickDropdownMenuItem(event)">
                        メニュー3
                    </li>
                </ul>
            </div> <select name="" id="select" class="select">
                <option value="">選択してください</option>
                <option value="1">メニュー1</option>
                <option value="2">メニュー2</option>
                <option value="3">メニュー3</option>
            </select>
            <?php the_content(); ?>
    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>

    <?php get_footer(); ?>
</body>

</html>