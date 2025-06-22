<?php
function my_enqueue_styles()
{
    wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');
    wp_enqueue_style('style', get_template_directory_uri().'/css/style.css', array('ress'), false, 'all');
}


add_action('wp_enqueue_scripts', 'my_enqueue_styles');

function my_theme_enqueue_scripts() {
    // jQuery の後に読み込みたい場合
    


    if (!is_admin()) {
        // 既存のjQueryを解除
        wp_deregister_script('jquery');
        // CDNのjQueryを登録
        wp_register_script(
            'jquery',
            'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
            array(),
            '3.5.1',
            true
        );
        // 登録したjQueryを読み込む
        wp_enqueue_script('jquery');
        wp_enqueue_script(
            'my-script', // ハンドル名
            get_template_directory_uri() . '/js/main.js', // スクリプトのパス
            array('jquery'), // 依存（jQuery）
            '1.0.0', // バージョン
            true // フッターで読み込む
        );
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

add_action('init', function() {
    add_theme_support('post-thumbnails');
});


// 投稿タイプの追加（カスタム投稿）
add_action('init', function(){
    register_post_type('products', [
        'label' => '商品',
        'public' => true,
        'menu_position' => 5,   //管理画面での位置
        'has_archive' => true, //一覧画面を有効にするか
        'supports' => ['thumbnail', 'title', 'editor'], //サムネイルの追加を許可
        'show in rest' => true,
    ]);
});

// カスタム分類の追加（カスタムタクソノミー）
add_action('init', function() {
    register_taxonomy('genre', 'products', [
        'label' => '生産国',
        'hierarchical' => true,
        'show in rest' => true, //エディタ上に表示する
    ]);
});

// ページネーション
function pagination($pages = '', $range = 2) { //$pages=>総ページ数。''の場合は自動取得、$range=>現在のページの前後何ページを取得するか
  $showitems = ($range * 2) + 1;

  // 現在のページ数
    global $paged;
    if(empty($paged)) {
    $paged = 1;
    }

  // 全ページ数
    if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
        $pages = 1;
    }
    }

  // ページ数が2ぺージ以上の場合のみ、ページネーションを表示
    //if(1 != $pages) {
    //echo '<div class="pagination">';
    //echo '<ul>';
    // 1ページ目でなければ、「前のページ」リンクを表示
    // if($paged > 1) {
    //     echo '<li class="prev"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '">前のページ</a></li>';
    // }

    // ページ番号を表示（現在のページはリンクにしない）
    // for ($i=1; $i <= $pages; $i++) {
    //     if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
    //     if ($paged == $i) {
    //         echo '<li class="active">' .$i. '</li>';
    //     } else {
    //         echo '<li><a href="' . esc_url(get_pagenum_link($i)) . '">' .$i. '</a></li>';
    //     }
    //     }
    // }

    // 最終ページでなければ、「次のページ」リンクを表示
    // if ($paged < $pages) {
    //     echo '<li class="next"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '">次のページ</a></li>';
    // }
    // echo '</ul>';
    // echo '</div>';
    // }
}