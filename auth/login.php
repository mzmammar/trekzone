<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

    if (isset($_SESSION["username"]))
    {
        header("location: ".APPURL."");
    }
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
   
         $login =$conn->query("SELECT * FROM users WHERE email='$email'");
         $login->execute();

         $fetch = $login->fetch(PDO::FETCH_ASSOC);
  
         if($login->rowCount() > 0)
         {  //echo "<script>alert('email matching');</script>";

            //check for the password is matching with the DB
            if(password_verify($password, $fetch['mypassword']))
            {  //echo "<script>alert('passwrod matching');</script>";
               $_SESSION['username']=$fetch['username'];
               $_SESSION['user_id']=$fetch['id'];

               header("location: ".APPURL."");

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

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <form id="reservation-form" method="post" role="search" action="login.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Login</h4>
              </div>
              <div class="col-md-12">
                  <fieldset>
                      <label for="Name" class="form-label">Your Email</label>
                      <input type="text" name="email" class="Name" placeholder="email" autocomplete="on" required>
                  </fieldset>
              </div>
         
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Your Password</label>
                    <input type="password" name="password" class="Name" placeholder="password" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button name="submit" type="submit" class="main-button">login</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php require "../includes/footer.php"; ?>
