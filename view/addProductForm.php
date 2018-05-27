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
        <form class="form-horizontal" action="?action=addProduct" method="post" novalidate>
            <div class="form-group">
                <label class="control-label" for="Description">
                    Description
                    <small class="text-danger">
                        <?=isset($errors['Description'])? $errors['Description']:''; ?>
                    </small>
                
                </label>

                <input class="form-control" type="text" name="Description" value="<?=$Description ?>"/>
            </div>
            
            
            <div class="form-group">
                <label class="control-label" for="Category">
                    Category
                <small class="text-danger">
                        <?=isset($errors['Category'])? $errors['Category']:''; ?>
                 </small>
                </label>

                <input class="form-control" type="text" name="Category" value="<?=$Category ?>" />
            </div>
            
            
            <div class="form-group">
                <label class="control-label" for="Quantity">
                    Quantity
                    <small class="text-danger">
                        <?=isset($errors['Quantity'])? $errors['Quantity']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="text" name="Quantity" value="<?=$Quantity ?>" />
            </div>
            
            
            <div class="form-group">
                <label class="control-label" for="CostPrice">
                    Cost Price
                    <small class="text-danger">
                        <?=isset($errors['CostPrice'])? $errors['CostPrice']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="text" name="CostPrice" value="<?=$CostPrice ?>" />
            </div>
            
      
            <div class="form-group">
                <label class="control-label" for="SellingPrice">
                    Selling Price
                    <small class="text-danger">
                        <?=isset($errors['SellingPrice'])? $errors['SellingPrice']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="text" name="SellingPrice" value="<?=$SellingPrice ?>" />
            </div>

            <br/>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary btn-block" name="addProduct" />
            </div>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php include_once('view/footer.php'); ?>

