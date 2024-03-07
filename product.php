<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>







<?php


$pdo=new PDO('mysql:host=localhost;dbname=21A3106;charset=utf8', 
	'p170146', '47KJtC35');
	/*検索欄に通じたとき */
if (isset($_REQUEST['keyword'])) {
	$sql=$pdo->prepare('select * from product where name like ?');
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
	/*検索欄に通じないときは全部これ */
	$sql=$pdo->query('select * from product');
}


?>




<?php
// カウンターを初期化
$counter = 0;
// 最初のflexコンテナを開始
echo '<div class="d-flex flex-wrap justify-content-evenly">';

foreach ($sql as $row) {
    // 商品情報を取得
    $id = $row['id'];
    $name = $row['name'];
    $color = $row['color'];
    $price = $row['price'];

    // カウンターをインクリメント
    $counter++;

    // 各商品
    echo '<div class="col-md-4">'; // Bootstrap grid systemを使用しています。3列レイアウトになるように設定
        echo '<div class="container">';
            echo '<img src="../src/sneaker' . $id . '.jpg" class="img-fluid d-block" alt="...">'; // img-fluid を使用してレスポンシブ画像に
        echo '</div>';
        echo '<div class="container">';
            echo '<p class="fs-5 mx-auto my-2">' . htmlspecialchars($name) . '</p>';
            echo '<p class="fs-2 mx-auto my-1">' . htmlspecialchars($color) . '</p>';
            echo '<div class="d-flex justify-content-between">';
                echo '<p class="fs-5 mx-auto2 my-2">' . htmlspecialchars($price) . '円</p>';
                echo '<a href="detail.php?id=' . $id . '" class="btn btn-outline-primary" id="' . $id . '">購入</a>';


                /*echo '<button class="purchase_button">';
                    echo '<a href="detail.php?id=' . $id . '">購入</a>';
                echo '</button>'; */
                
            echo '</div>';
        echo '</div>';
    echo '</div>';

    // 3商品ごとにflexコンテナを閉じて新しく開始
    if ($counter % 3 == 0 ) {
        echo '</div><div class="d-flex flex-wrap justify-content-evenly">';
    }
}

echo '</div>'; // 最終的なflexコンテナを閉じる
?>



    



<?php require '../footer.php'; ?>
