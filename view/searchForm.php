<?php
 
 include_once('view/header.php');
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center box">Search Booking</div>
    <div class="col-sm-3"></div>
</div>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 jumbotron">
        <form class="form-horizontal" action="?action=searchProduct" method="post" novalidate>
            <div class="form-group">
                <label class="control-label" for="keyword">Keyword</label>

                <input class="form-control" type="text" name="keyword" />
            </div>
    
            <div class="form-group">
                <input type="submit" value="Search" class="btn btn-primary btn-block" name="searchProduct" />
            </div>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php include_once('view/footer.php'); ?>

