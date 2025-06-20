codejump 中級編のwordpress化

基本に忠実に構成する

商品に関して：カスタム投稿で商品を投稿する形にする。
トップページ(index.php)、Productsページ（archive-$posttype.php）：登録された製品情報を新しいものから順に表示
1ページの表示件数はトップページが８件、Productsページが１２件
Productsページは１２件ごとに次のページに遷移できるようにする。

詳細ページ（single.php）：
投稿画面で登録された製品情報を表示
金額、サイズ、カラー、マテリアルについてはカスタムフィールドを使用する

About, Companyページ（page-$slug.php）：
固定ページで登録