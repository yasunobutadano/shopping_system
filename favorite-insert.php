<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=21A3106;charset=utf8', 
	'p170146', '47KJtC35');
	$sql=$pdo->prepare('insert into favorite values(?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo 'お気に入りに商品を追加しました。';
	echo '<hr>';
	require 'favorite.php';
} else {
	echo 'お気に入りに商品を追加するには、ログインしてください。';
}
?>
<?php require '../footer.php'; ?>
