<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

    if (!isset($_SESSION["username"]))
    { header("location: ".APPURL."");  }


    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $user_bookings = $conn->query("SELECT * FROM bookings WHERE user_id='$id'");
        $user_bookings->execute();

        $AllUserBookings = $user_bookings->fetchALl(PDO::FETCH_OBJ);
    }else{
        header("location: 404.php");
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">   
            <table class="table" style="margin-top:100px; margin-bottom:250px">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Guests</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Checkin Date</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>

                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($AllUserBookings as $Bookings):?>
                            <tr>
                                <td><?php echo $Bookings->name;?></td>
                                <td><?php echo $Bookings->num_of_guests;?></td>
                                <td><?php echo $Bookings->phone_number;?></td>
                                <td><?php echo $Bookings->checkin_date;?></td>
                                <td><?php echo $Bookings->destination;?></td>
                                <td><?php echo $Bookings->status;?></td>
                                <td>$<?php echo $Bookings->payment;?></td>

                            </tr>
                        <?php endforeach;?>
                    </tbody>
            </table>
        </div>
        <h2>For Cancellations/Date Change :<pre>E-Mail:trekzone@gmail.com <br>Call: +91-12345678 <pre></h2>
    </div>
</div>


<?php require "../includes/footer.php"; ?>
