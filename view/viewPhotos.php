<?php
 
 include_once('view/header.php');
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center box">Photos for Product ID: <?=$ProductID ?></div>
    <div class="col-sm-3"></div>
</div>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 jumbotron text-center">
        <div class="responsive">
            <table class="table table-hover table-responsive text-left">

                <tr>
                    <th>Product Details</th><th align="right">Photo</th>
                </tr>
                <?php foreach ($records as $row): ?>

                    
                    <tr>
                        <td>
                            Name:  <?= $row['PhotoDescription'] ?>
                        
                        </td>
                        <td align="right">
                            <a href="">
                                <img class="img-responsive img-rounded img-thumbnail" src="../photos/<?=$row['Filename'] ?>" width="100"  height="50">
                            </a>
                        </td>
                     </tr>   
                   

                <?php endforeach; ?>

             
            </table>
            
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php include_once('view/footer.php'); ?>