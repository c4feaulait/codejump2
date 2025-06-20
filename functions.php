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


add_action('init', function(){
    register_post_type('products', [
        'label' => '商品',
        'public' => true,
        'menu_position' => 5,   //管理画面での位置
        'has_archive' => true, //一覧画面を有効にするか
        'supports' => ['thumbnail', 'title', 'editor'], //サムネイルの追加を許可
    ]);
});