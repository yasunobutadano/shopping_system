<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<div class="position-absolute top-50 start-50 translate-middle">'
<form action="login-output.php" method="post">
ログイン名<input type="text" name="login"><br>
パスワード<input type="password" name="password"><br>
<input type="submit" value="ログイン">
</form>
</div>
<?php require '../footer.php'; ?>
