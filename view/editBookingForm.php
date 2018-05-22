<?php
 
 include_once('view/header.php');
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center box">Edit Booking</div>
    <div class="col-sm-3"></div>
</div>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 jumbotron">
        <form class="form-horizontal" action="?action=editBooking&id=<?= $id ?>" method="post" novalidate>
            <div class="form-group">
                <label class="control-label" for="id">Booking ID</label>

                <input class="form-control" type="text" name="id" readonly="true" value="<?= $id ?>" />
            </div>
            <div class="form-group">
                <label class="control-label" for="firstname">
                    First Name
                    <small class="text-danger">
                        <?= isset($errors['firstname']) ? $errors['firstname'] : ''; ?>
                    </small>

                </label>

                <input class="form-control" type="text" name="firstname"  value="<?= $firstname ?>" />
            </div>
            <div class="form-group">
                <label class="control-label" for="lastname">
                    Last Name
                    <small class="text-danger">
                        <?= isset($errors['lastname']) ? $errors['lastname'] : ''; ?>
                    </small>
                </label>

                <input class="form-control" type="text" name="lastname" value="<?= $lastname ?>" />
            </div>

            <div class="form-group">
                <label class="control-label" for="email">
                    Email
                    <small class="text-danger">
                        <?=isset($errors['email'])? $errors['email']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="email" name="email" value="<?= $email ?>" />
            </div>
            <div class="form-group">
                 <label class="control-label" for="bookingDate">
                    Booking Date
                    <small class="text-danger">
                        <?=isset($errors['bookingDate'])? $errors['bookingDate']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="date" name="bookingDate"  value="<?= $bookingDate ?>" />
            </div>
            <div class="form-group">
                 <label class="control-label" for="bookingTime">
                    Booking Time
                    <small class="text-danger">
                        <?=isset($errors['bookingTime'])? $errors['bookingTime']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="time" name="bookingTime"  value="<?= $bookingTime ?>" />
            </div>
            <div class="form-group">
                <label class="control-label" for="numPeople">
                    Number of People
                    <small class="text-danger">
                        <?=isset($errors['numPeople'])? $errors['numPeople']:''; ?>
                    </small>
                </label>

                <input class="form-control" type="text" name="numPeople"  value="<?= $numPeople ?>" />
            </div> 

            <br/>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary btn-block" name="editBooking" />
            </div>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php include_once('view/footer.php'); ?>

