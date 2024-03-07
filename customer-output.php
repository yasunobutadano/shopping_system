<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=21A3106;charset=utf8', 
'p170146', '47KJtC35');
	
if (isset($_SESSION['customer'])) {// すでにログインしている人がいるとき
	$id=$_SESSION['customer']['id'];
	//idが違うくてusernameが同じの人を選択する　→　選択されなかったら情報の更新に移る
	$sql=$pdo->prepare('select * from customer where id!=? and login=?');
	$sql->execute([$id, $_REQUEST['login']]);
} else {//ログインしている人がいないとき＝新しい顧客　idが同じ人がいるかを検索　→　いなかったら情報の登録
	$sql=$pdo->prepare('select * from customer where login=?');
	$sql->execute([$_REQUEST['login']]);
}
// elseの続き
//emptyは
if (empty($sql->fetchAll())) {//②　①②はつながっている
	if (isset($_SESSION['customer'])) {
		$sql=$pdo->prepare('update customer set name=?, email_address=? ,address=?,
			login=?, password=? where id=?');
		$sql->execute([
			$_REQUEST['name'],$_REQUEST['email_address'], $_REQUEST['address'], 
			$_REQUEST['login'], $_REQUEST['password'], $id]);
		$_SESSION['customer']=[
			'id'=>$id, 'name'=>$_REQUEST['name'], 'email_address'=>$_REQUEST['email_address'], 
			'address'=>$_REQUEST['address'], 'login'=>$_REQUEST['login'], 
			'password'=>$_REQUEST['password']];
		echo 'お客様情報を更新しました。';
	} else {
		$sql=$pdo->prepare('insert into customer values(null,?,?,?,?,?)');
		$sql->execute([
			$_REQUEST['name'], $_REQUEST['email_address'],$_REQUEST['address'], 
			$_REQUEST['login'], $_REQUEST['password']]);
		echo 'お客様情報を登録しました。';
	}
} else {
		//relevant
	echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require '../footer.php'; ?>


<!-- $_REQUESTはhttpリクエストに基づいた情報を持ってくる -->
<!-- データの保持: 
 セッションを使うと、ユーザーがウェブサイトをナビゲートする間、特定のユーザーデータ（例：ログイン状態、ショッピングカートの内容、言語設定など）を保持できます。 
これはサーバー側で行われ、各ユーザーに固有のセッションIDがブラウザによって送信されるため、異なるユーザー間でデータが混在することはありません。-->


