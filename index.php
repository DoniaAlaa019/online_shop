<?php 
include 'inc/header.php';
include 'handlers/APIS.php';
$result = $opro->selectAll();
if(empty($result)){
  header("Location: notfound.php");  
}
?>



<div class="container my-5">

  <div class="row">
    <?php foreach ($result as $value) {?>
    <div class="col-lg-4 mb-3">
            <div class="card">
            <img src= <?= $value['image']?> class="card-img-top w-100">
            <div class="card-body">
            <h5 class="card-title"><?= $value['name']?></h5>
            <p class="text-muted"><?= $value['price']?> EGP</p>
            <p class="card-text"><?= $shortDescription->short_description($value['description']) ?></p>
            <a href="show.php?id=<?= $value['id']?>" class="btn btn-primary">Show</a>

            <a href="edit.php?id=<?= $value['id']?>" class="btn btn-info">Edit</a>
            <a href="delete.php/?id=<?= $value['id']?>" class="btn btn-danger">Delete</a>

            </div>
    </div>
    </div> 
    <?php }?>
        
   </div>

</div>



<?php include 'inc/footer.php'; ?>