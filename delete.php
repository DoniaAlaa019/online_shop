<?php 
include 'handlers/APIS.php';
$result = $opro->deleteProduct($request->get('id'));
if($result == 0){
    header("Location: notfound.php");  
}
header("Location: ../index.php");  
?>