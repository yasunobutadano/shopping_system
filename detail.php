<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=21A3106;charset=utf8', 
'p170146', '47KJtC35');
$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $row) {

	echo '<div class="d-flex justify-content-evenly  align-items-center   "  >';
	echo '<div class="concept-box">';
	echo '<img class="img-fluid" style="width: 40rem;" alt="image" src="../src/sneaker' . $row['id'] . '.jpg">';
	echo '</div>';
	
	echo '<form action="cart-insert.php" method="post">';
	/*echo '<p>商品番号：', $row['id'], '</p>';*/
	
	echo '<p class="fs-1 mx-auto mb-5" >商品名：', $row['name'], '</p>';

	echo '<p class="fs-2 mx-auto2 my-2">価格：', $row['price'], '</p>';
	echo '<p class="fs-2 mx-auto2 my-2">個数：<select name="count">';
	for ($i=1; $i<=10; $i++) {
		echo '<option value="', $i, '">', $i, '</option>';
	}
	echo '</select></p>';


	

	/*hidden にすることで何をカートに入れたのか認識する */
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="hidden" name="name" value="', $row['name'], '">';
	echo '<input type="hidden" name="price" value="', $row['price'], '">';
	
	echo '<p><input type="submit" class="btn btn-outline-dark btn-lg px-5" value="カートに追加"></p>';
	echo '<p><a href="favorite-insert.php?id=', $row['id'], 
		'"  class="btn btn-outline-primary btn-lg px-5">お気に入りに追加</a></p>';

	
	echo '<p class="fs-5  my-2 text-start  "  style="width: 40rem;">商品説明：', $row['explanation'], '</p>';
	
	echo '</form>';
	
	




	echo '</div>';

	


}
?>
<?php require '../footer.php'; ?>
