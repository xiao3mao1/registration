
<?php
include "functions_bd.php";
initSession();
unset($_SESSION['tel']);
unset($_SESSION['pass']);
unset($_SESSION['email']);
unset($_SESSION['error_auth']);
unset($_SESSION['inited']);

header ("Location: index.php?error=0");

?>