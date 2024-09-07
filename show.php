
<?php

include 'inc/header.php'; 
if (isset($_SESSION['loged']) == '') {

    header("Location: login.php");  
}
include 'handlers/APIS.php';
$result = $opro->selectOne($request->get('id'));
if(empty($result)){
    header("Location: notfound.php");  
}
?>

 
<div class="container my-5">
    <div class="row">
            <div class="col-lg-6">
            <img src = <?= $result[0]['image'] ?> class="card-img-top">
            </div>
            <div class="col-lg-6">
                <h5 ><?= $result[0]['name']?></h5>
                <p class="text-muted">Price: <?= $result[0]['price']?> EGP</p>
                <p><?= $result[0]['description']?></p>
                <a href="index.php" class="btn btn-primary">Back</a>
                <a href="edit.php?id=<?= $result[0]['id']?>" class="btn btn-info">Edit</a>
                <a href="delete.php?id=<?= $result[0]['id']?>" class="btn btn-danger">Delete</a>
           </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>