<h1 class="site-title">
    <a href="/"><img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>" alt="Furniture Design"></a>
</h1>

<nav id="navi">
    <!-- <ul class="nav-menu">
        <li><a href="<?php echo esc_attr(home_url('/products')); ?>">PRODUCTS</a></li>
        <li><a href="<?php echo esc_attr(home_url('/about')); ?>">ABOUT</a></li>
        <li><a href="<?php echo esc_attr(home_url('/company')); ?>">COMPANY</a></li>
        <li><a href="mailto:xxxxx@xxx.xxx?subject=お問い合わせ">CONTACT</a></li>
    </ul> -->

    <!-- <?php wp_nav_menu(array('theme_location' => 'global-nav')); ?> -->

    <ul id="menu-menu-1" class="menu">
        <li id="menu-item-200" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-200"><a href="http://mysite.local/" aria-current="page">HOME</a></li>
        <li id="menu-item-198" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-198"><a href="http://mysite.local/products/">PRODUCTS</a></li>
        <li id="menu-item-196" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-196"><a href="http://mysite.local/about/">ABOUT</a></li>
        <li id="menu-item-195" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-195"><a href="http://mysite.local/company/">COMPANY</a>
            <ul class="sub-menu">
                <li id="menu-item-199" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-199"><a href="mailto:xxxxx@xxx.xxx?subject=お問い合わせ">CONTACT</a></li>
            </ul>
        </li>
    </ul>

    <style>
        /* サブメニューを非表示に */
        .menu .sub-menu {
            display: none;
            position: absolute;
            min-width: 160px;
            z-index: 1000;
            /* box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15); */
            padding: 0;
            margin: 0;
        }

        /* 親メニューにホバーしたらサブメニューを表示 */
        .menu li.menu-item-has-children:hover>.sub-menu {
            display: block;
        }

        /* サブメニューの位置調整 */
        .menu li.menu-item-has-children {
            position: relative;
        }

        .menu .sub-menu li {
            width: 100%;
        }
    </style>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    var parents = document.querySelectorAll('.menu-item-has-children');

    function setPCEvents() {
        parents.forEach(function(parent) {
            var submenu = parent.querySelector('.sub-menu');
            if (!submenu) return;

            // 既存イベントをクリア
            parent.onmouseenter = function() { submenu.style.display = 'block'; };
            parent.onmouseleave = function() { submenu.style.display = 'none'; };
            parent.onclick = null;
            // 初期状態
            submenu.style.display = 'none';
        });
    }

    function setSpEvents() {
        parents.forEach(function(parent) {
            var submenu = parent.querySelector('.sub-menu');
            if (!submenu) return;

            // 既存イベントをクリア
            parent.onmouseenter = null;
            parent.onmouseleave = null;
            // 初期状態
            submenu.style.display = 'none';

            parent.onclick = function(e) {
                // サブメニューの開閉
                e.preventDefault();
                // 他のサブメニューを閉じる
                parents.forEach(function(other) {
                    if (other !== parent) {
                        var otherSub = other.querySelector('.sub-menu');
                        if (otherSub) otherSub.style.display = 'none';
                    }
                });
                // 自分のサブメニューをトグル
                submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
            };
        });
    }

    function setMenuEvents() {
        if (window.innerWidth <= 768) {
            setSpEvents();
        } else {
            setPCEvents();
        }
    }

    setMenuEvents();
    window.addEventListener('resize', setMenuEvents);
});
    </script>
</nav>

<div class="toggle_btn">
    <span></span>
    <span></span>
</div>



<div id="mask"></div>