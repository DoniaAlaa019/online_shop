<?php 
session_start();
include 'handlers/APIS.php';
if (isset($_SESSION['loged']) == '') {

    header("Location: login.php");  
}
$result = $opro->deleteProduct($request->get('id'));
if($result == 0){
    header("Location: notfound.php");  
}
header("Location: ../index.php");  
?>