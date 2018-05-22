<?php
 
 include_once('view/header.php');
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center box">Login Form</div>
    <div class="col-sm-3"></div>
</div>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 jumbotron">
        <form class="form-horizontal" action="" method="post" novalidate>
            <div class="form-group">
                <label class="control-label" for="username">
                    User Name
                    <small class="text-danger">
                        <?=isset($errors['username'])? $errors['username']:''; ?>
                    </small>
                
                </label>

                <input class="form-control" type="text" name="username" value="<?=isset($username)? $username:''; ?>"/>
            </div>
    
            <div class="form-group">
                <label class="control-label" for="password">
                    Password
                    <small class="text-danger">
                        <?=isset($errors['password'])? $errors['password']:''; ?>
                    </small>
                
                </label>

                <input class="form-control" type="password" name="password" value="<?=isset($password)? $password:''; ?>" />
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary btn-block" name="login" />
            </div>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php include_once('view/footer.php'); ?>