<?php require "../layouts/header.php";  ?>
<?php require "../../config/config.php";  ?>

<?php

    // if (!isset($_SESSION["adminname"]))
    // {
    //     header("location: ".ADMINURL."");
    // }
   //take the from the inputs

   if (isset($_POST['submit']))
   {
       if (empty($_POST['email']) OR empty($_POST['password']))
      {
      echo "<script>alert('One or more inputs are missing');</script>";
      }
      else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        //check for the email exist in DB with a query first
   
         $login =$conn->query("SELECT * FROM admins WHERE email='$email'");
         $login->execute();

         $fetch = $login->fetch(PDO::FETCH_ASSOC);
  
         if($login->rowCount() > 0)
         {  //echo "<script>alert('email matching');</script>";

            //check for the password is matching with the DB
            if(password_verify($password, $fetch['mypassword']))
            {  //echo "<script>alert('passwrod matching');</script>";

               $_SESSION['adminname']=$fetch['adminname'];
               $_SESSION['user_id']=$fetch['id'];

               header("location: ".ADMINURL."");

              // echo "<script>alert('LOGGED IN');</script>";

            } else {
              echo "<script>alert('Invalid email/password');</script>";
            } 


         } else{
          echo "<script>alert('Invalid email/password');</script>";  

         }

      }
    }
   //check for the password
?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
       
<?php require "../layouts/footer.php";  ?>
