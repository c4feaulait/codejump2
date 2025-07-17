<?php
function my_enqueue_styles()
{
    wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array('ress'), false, 'all');
}


add_action('wp_enqueue_scripts', 'my_enqueue_styles');

function my_theme_enqueue_scripts()
{
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

add_action('init', function () {
    add_theme_support('post-thumbnails');
});


// 投稿タイプの追加（カスタム投稿）
add_action('init', function () {
    register_post_type('products', [
        'label' => '商品',
        'public' => true,
        'menu_position' => 5,   //管理画面での位置
        'has_archive' => true, //一覧画面を有効にするか
        'supports' => ['thumbnail', 'title', 'editor'], //サムネイルの追加を許可
        'show in rest' => true,
    ]);
});

add_action('init', function () {
    register_post_type('company', [
        'label' => '会社',
        'public' => true,
        'menu_position' => 5,   //管理画面での位置
        'has_archive' => true, //一覧画面を有効にするか
        'supports' => ['thumbnail', 'title', 'editor'], //サムネイルの追加を許可
        'show in rest' => true,
    ]);
});

// カスタム分類の追加（カスタムタクソノミー）
add_action('init', function () {
    register_taxonomy('country', 'products', [
        'label' => '生産国',
        'hierarchical' => true,
        'show in rest' => true, //エディタ上に表示する
    ]);
});

add_action('init', function () {
    register_taxonomy('animal', 'products', [
        'label' => '動物',
        'hierarchical' => true,
        'show in rest' => true, //エディタ上に表示する
    ]);
});

// 絞り込み機能
function get_search_terms($taxonomy)
{
    // var_dump($taxonomy);
    $html = '';

    // 引数のタクソノミーに登録されているタームを取得
    $terms = get_terms([
        'taxonomy' => $taxonomy,
    ]);
    // var_dump($terms);

    // htmlでselectの枠組みを作る
    $html .= '<select name="' . esc_attr($taxonomy) . '" id="' . esc_attr($taxonomy) . '">';
    // var_dump($html);

    foreach ($terms as $term) {
        $html .= '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
    }
    $html .= '</select>';

    echo $html;
}

function get_search_tax_array()
{
    $tax_args = [
        'public' => true,
        '_builtin' => false,
    ];

    $taxonomies = get_taxonomies($tax_args); //$tax_argsで指定した条件でタクソノミー名を配列で取得

    //GETで存在するタクソノミーを連想配列に格納
    $tax_array = []; // 配列を格納するための箱を用意

    foreach ($taxonomies as $taxonomy) {
        if (!empty($_GET[$taxonomy])) { //クエリパラメータ（例：?country=japan）があるかどうか確認
            $tax_array[$taxonomy] = $_GET[$taxonomy]; //連想配列として加える ('country' => 'japan')
            var_dump($_GET[$taxonomy]);
        }
    }

    return $tax_array;
}

function get_search_args($array, $paged)
{
    $args = [
        'post_type' => 'products',
        'post_status' => 'publish',
        'orderby' => [
            'date' => 'DESC',
            'ID' => 'DESC'
        ],
        'paged' => $paged,
    ];

    $tax_query = [];
    foreach ($array as $key => $value) { //$keyはタクソノミー名、$valueはその値　上記例では$key=country、$value=japan
        $tax_query[] = [
            'taxonomy' => $key,
            'field' => 'slug',
            'terms' => $value
        ];
    }

    if (count($tax_query) > 0) {
        $tax_query['relation'] = 'AND';
        $args += ['tax_query' => $tax_query];
    }

    return $args;
}

// 
add_action('after_setup_theme', function () {
    register_nav_menus(array(
        // 例 'メニューの位置を示す固有名称' => 'このメニューの位置の名称'
        'global-nav' => 'グローバルメニュー',
    ));
});


// 
if (! function_exists('my_shortcode')) {
    function my_shortcode()
    {
        $companyName = get_post_meta(get_the_ID(), 'name', true);
        $companyAddress = get_post_meta(get_the_ID(), 'address', true);
        $companyTel = get_post_meta(get_the_ID(), 'tel', true);
        $companyFax = get_post_meta(get_the_ID(), 'fax', true);

        $html ='            <table class="table">
                <tr>
                    <th>企業名</th>
                    <td>' . esc_html($companyName) . '</td>
                </tr>
                <tr>
                    <th>企業住所</th>
                    <td>' . esc_html($companyAddress) . '</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>' . esc_html($companyTel) . '</td>
                </tr>
                <tr>
                    <th>FAX番号</th>
                    <td>' . esc_html($companyFax) . '</td>
                </tr>
            </table>';

        return $html;
    }
    add_shortcode('tag', 'my_shortcode');
}

if (! function_exists('values')) {
    function values() {
        $value = get_post_meta( get_the_ID(), 'name', true );
    // 値が空ならデフォルト表示（オプション）
    if ( empty( $value ) ) {
        return 'カスタムフィールドが設定されていません';
    }

    // 値を返す
    return esc_html( $value );
    }
    add_shortcode('hello', 'values');
}

