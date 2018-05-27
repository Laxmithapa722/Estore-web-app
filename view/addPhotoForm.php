<?php
 
 include_once('view/header.php');
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center box">Add Product</div>
    <div class="col-sm-3"></div>
</div>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 jumbotron">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"  novalidate>
            <div class="form-group">
                <label class="control-label" for="PhotoDescription">
                    Photo Description
                    <small class="text-danger">
                        <?=isset($errors['PhotoDescription'])? $errors['PhotoDescription']:''; ?>
                    </small>
                
                </label>

                <input class="form-control" type="text" name="PhotoDescription" value="<?=isset($PhotoDescription)? $PhotoDescription:''; ?>" />
            </div>
    
            <div class="form-group">
                <label class="control-label" for="PhotoDescription">
                    Photo Description
                    <small class="text-danger">
                        <?=isset($errors['PhotoDescription'])? $errors['PhotoDescription']:''; ?>
                    </small>
                
                </label>

                <input class="form-control" type="text" name="PhotoDescription" value="<?=isset($PhotoDescription)? $PhotoDescription: ''; ?>" />
            </div>
             <div class="form-group">
                <label class="control-label" for="image">
                    Product Photo
                    <small class="text-danger">
                        <?=isset($errors['image'])? $errors['image']:''; ?>
                    </small>
                
                </label>

                <input class="form-control" type="file" name="image" />
            </div>
            
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary btn-block" name="addInvitee" />
            </div>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php include_once('view/footer.php'); ?>




