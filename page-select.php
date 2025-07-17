<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>

</head>

<body>
    <!-- <header id="header" class="wrapper">
    <?php get_template_part('includes/header'); ?>
    </header> -->

    <main>
        <p>何かがおかしい</p>
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
            </div> 
            <select name="" id="select" class="select">
                <option value="">選択してください</option>
                <option value="1">メニュー1</option>
                <option value="2">メニュー2</option>
                <option value="3">メニュー3</option>
            </select>
    </main>

    <footer id="footer" class="wrapper">
    </footer>


    <?php get_footer(); ?>
</body>

</html>