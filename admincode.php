<?php
    session_start();
    include("dataconnection.php");
    if(isset($_POST['addadminbtn']))
    {
        $Current_Admin = $_SESSION['ID'];
        $Admin_Fname = $_POST['fname'];
        $Admin_Lname = $_POST['lname'];
        $Admin_Email = $_POST['email'];
        $Admin_Password = $_POST['password'];
        $Admin_Phone = $_POST['phone'];

        $Check_Admin_Email = "SELECT Admin_Email FROM admin_login WHERE Admin_Email = '$Admin_Email'" ;
        $Check_Admin_Email_run = mysqli_query($dataconnection,$Check_Admin_Email);

        if(!filter_var($Admin_Email,FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['message'] = "Please Enter Valid Email!";
            header("location: addadmin.php?id=$Current_Admin");
        }
        else if(mysqli_num_rows($Check_Admin_Email_run) > 0 )
        {
        $_SESSION['message'] = "Email Adress is already existed!";
        header("location: addadmin.php?id=$Current_Admin");
        }
        else
        {
            $Admin_query = "INSERT INTO admin_login (Admin_Fname,Admin_Lname,Admin_Email,Admin_Password,Admin_Phone) VALUES ('$Admin_Fname','$Admin_Lname','$Admin_Email','$Admin_Password','$Admin_Phone')" ;
            $Admin_query_run = mysqli_query($dataconnection,$Admin_query);        
            if($Admin_query_run)
            {
               $_SESSION['message'] = "Admin Added Successfully!";
                header("location: addadmin.php?id=$Current_Admin");
            }
            else
            {
                $_SESSION['message'] = "Admin Added Unsuccessfully!";
                header("location: addadmin.php?id=$Current_Admin");
            }
        }
    }    
    else if(isset($_POST['updateadminbtn']))
    {
        $Admin_ID = $_POST['admin_id'];
        $Admin_Fname = $_POST['fname'];
        $Admin_Lname = $_POST['lname'];
        $Admin_Email = $_POST['email'];
        $Admin_Password = $_POST['password'];
        $Admin_Phone = $_POST['phone'];


        $Check_Admin_Email = "SELECT Admin_Email FROM admin_login WHERE Admin_Email = '$Admin_Email' AND ID != '$Admin_ID'" ;
        $Check_Admin_Email_run = mysqli_query($dataconnection,$Check_Admin_Email);

        if(!filter_var($Admin_Email,FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['message'] = "Please Enter Valid Email!";
            header("location: editadmin.php?id=$Admin_ID");
        }
        else if(mysqli_num_rows($Check_Admin_Email_run) > 0 )
        {
            $_SESSION['message'] = "Email Adress is already existed!";
            header("location: editadmin.php?id=$Admin_ID");
        }
        else
        {
            $updateadmin_query = "UPDATE admin_login SET Admin_Fname = '$Admin_Fname', Admin_Lname = '$Admin_Lname', Admin_Email = '$Admin_Email', Admin_Password = '$Admin_Password', Admin_Phone = '$Admin_Phone' WHERE ID = '$Admin_ID'" ;
            $updateadmin_query_run = mysqli_query($dataconnection,$updateadmin_query);

            if($updateadmin_query_run)
            {
                $_SESSION['message'] = "Admin Updated Successfully!";
                header("location: editadmin.php?id=$Admin_ID");
            }
            else
            {
                $_SESSION['message'] = "Admin Updated Unsuccessfully!";
                header("location: editadmin.php?id=$Admin_ID");
            }
        }
        
    }
    else if(isset($_POST['deleteadminbtn']))
    {
        $Current_Admin = $_SESSION['ID'];
        $Admin_ID = $_POST['admin_id'];
        $deleteadmin_query = "DELETE FROM admin_login WHERE ID = '$Admin_ID'";
        $deleteadmin_query_run = mysqli_query($dataconnection,$deleteadmin_query);

        if($deleteadmin_query_run)
        {
                $_SESSION['dmessage'] = "Admin Deleted Successfully!";
                header("location: admin.php?id=$Current_Admin");
        }
        else
        {
            $_SESSION['dmessage'] = "Categories Deleted Unsuccessfully!";
            header("location: admin.php?id=$Current_Admin");
        }
        
        
    }
?>