<?php
session_start();
if (isset($_SESSION['userLogin'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: ../views/login.php");
}else{
    header("Location: ../index.php");
}
exit;
?>
