<?php 
session_start();
// if (isset($_SESSION['loged']) == 1) {
unset($_SESSION['loged']) ;   
    
// }
header("Location: login.php"); 
?>