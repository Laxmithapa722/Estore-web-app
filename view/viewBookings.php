<?php
 
 include_once('view/header.php');
?>
<div class="row">

    <div class="col-sm-12 text-center box">View Bookings: <?= $numRecords ?> Results</div>

</div>


<div class="row">

    <div class="col-sm-12 jumbotron text-center">
        <div class="responsive">
            <table class="table table-striped table-hover text-left">

                <tr>
                    <th>Booking ID</th><th>First Name</th><th>Last Name</th><th>Email</th>
                    <th>Booking Date</th><th>Booking Time</th><th>People</th><th colspan="4">Manage</th>
                </tr>
                <?php foreach ($records as $row): ?>

                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['bookingTime'] ?></td>
                        <td><?= $row['bookingDate'] ?></td>
                        <td><?= $row['numPeople'] ?></td>
                        <td>
                            <a href="?action=viewInvitees&id=<?= $row['id'] ?>" >Invitees</a>
                            &nbsp;
                            <a href="?action=addInvitee&id=<?= $row['id'] ?>" >+Invitee</a>
                            &nbsp;
                            <a href="?action=editBooking&id=<?= $row['id'] ?>" >Edit</a>
                            &nbsp;
                            <a href="?action=deleteBooking&id=<?= $row['id'] ?>" >Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

                <tr>
                    <td colspan="10" align="left">
                        <a href="?action=addBooking"><button class="btn btn-primary btn-lg">Add Booking</button></a>
                    </td>
                </tr>    
            </table>

        </div>
    </div>

</div>
<?php include_once('view/footer.php'); ?>