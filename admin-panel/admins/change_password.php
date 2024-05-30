<?php require "../layouts/header.php";  ?>
<?php require "../../config/config.php";  ?>
<?php

//session_start();

// Check if user is logged in
if (!isset($_SESSION['adminname'])) {
    header("Location: " . ADMINURL . "/admins/login-admins.php");
    exit();
}

//require_once "includes/header.php";



?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Change Password</h5>
                    <?php if (isset($error_message)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php elseif (isset($success_message)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="change_password.php" onsubmit="alert('Successfully changed')" >
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control"  placeholder="Current password" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control"  placeholder="New password"  name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control"  placeholder="Confirm New password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" >Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "../layouts/footer.php";  ?>
