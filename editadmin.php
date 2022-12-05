<?php $page_title = "Edit Admin"?>
<?php include("includes/header.php");?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $admin = getbyid("admin_login",$id);

            if(mysqli_num_rows($admin) > 0)
            {
                $data = mysqli_fetch_array($admin);
            ?>
        <div class="card ">
            <div class="card-header">
            <h4>Edit Admin</h4>
            </div>
                <div class="card-body">
                    <form action="admincode.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="admin_id" value="<?php echo $data['ID'] ?>">
                            <label for=""><strong>First Name</strong></label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $data['Admin_Fname']?>" placeholder="Enter First Name" required style="border: 1px solid;">
                        </div>
                        <div class="col-md-6">
                            <label for=""><strong>Last Name</strong></label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $data['Admin_Lname']?>" placeholder="Enter Last Name" required style="border: 1px solid;">
                        </div>
                        <div class="col-md-12">
                            <label for=""><strong>Email</strong></label>
                            <input type="text" class="form-control" name="email" value="<?php echo $data['Admin_Email']?>" placeholder="Enter Email" required style="border: 1px solid;">
                        </div>
                        <div class="col-md-12">
                            <label for=""><strong>Password</strong></label>
                            <input type="text" class="form-control" name="password" value="<?php echo $data['Admin_Password']?>" placeholder="Enter Password" required style="border: 1px solid;">
                        </div>
                        <div class="col-md-6">
                            <label for=""><strong>Phone</strong></label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $data['Admin_Phone']?>" placeholder="Enter Phone Number" required style="border: 1px solid;">
                        </div>
                    </div>
                        <div class="col-md-3 mt-3">
                        <button type="submit" name="updateadminbtn" class="btn btn-success mb-3"><i class="fa fa-check-circle"></i> Save</button>
                        <a href="admin.php?id=<?php echo $_SESSION['ID'] ?>" class="btn btn-light mb-3"><i class="fa fa-angle-double-left" ></i> Return</a>
                        </div>
                        <div class="col-md-3 mt-3">
                        <?php
                        if(isset($_SESSION['message']))
                        {
                            $message = $_SESSION['message'];
                            echo "<strong>$message</strong>";
                            unset($_SESSION['message']);
                        }
                        ?>
                        </div>
                        
                </div>
                </form>
        </div>
            <?php
            }
            else
            {
                echo "Category not found";
            }
        }
        else
        {
            echo "ID IS MISSING FROM URL!";
        }
            ?>
        </div>
    </div>
</div>        
        <br>

<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>