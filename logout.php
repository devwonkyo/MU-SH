<?php
session_start();
unset($_COOKIE['userId']);
setcookie("userId","", time() - 3600);

session_destroy();
?>
<script>alert("로그아웃 되었습니다.")</script>
<meta http-equiv="refresh" content="0;url=main.php" />