<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=21A3106;charset=utf8', 
'p170146', '47KJtC35');
$sql=$pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'], 'name'=>$row['name'], 'email_address'=>$row['email_address'], 
		'address'=>$row['address'], 'login'=>$row['login'], 
		'password'=>$row['password']];
}
if (isset($_SESSION['customer'])) {
	echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require '../footer.php'; ?>
