<?php
    include("dataconnection.php");
    session_start();
    $Current_Admin = $_SESSION['ID'];
    if(isset($_POST['filterprobtn']))
    {
        $Fil_Name = $_POST['name'];
        $Fil_Cate = $_POST['cate'];
        $Fil_Status = $_POST['status'];
        if($Fil_Name != NULL)
        {
            if($Fil_Cate != NULL)
            {
                if($Fil_Status != NULL)
                {
                    header("Location: products.php?id=$Current_Admin&name=$Fil_Name&cate=$Fil_Cate&status=$Fil_Status"); 
                }
                else 
                {
                    header("Location: products.php?id=$Current_Admin&name=$Fil_Name&cate=$Fil_Cate"); 
                }
            }
            else if($Fil_Status != NULL)
            {
                header("Location: products.php?id=$Current_Admin&name=$Fil_Name&status=$Fil_Status"); 
            }
            else
            {
                header("Location: products.php?id=$Current_Admin&name=$Fil_Name"); 
            }
        }
        else
        {
            if($Fil_Cate != NULL)
            {
                if($Fil_Status != NULL)
                {
                    header("Location: products.php?id=$Current_Admin&cate=$Fil_Cate&status=$Fil_Status"); 
                }
                else
                {
                    header("Location: products.php?id=$Current_Admin&cate=$Fil_Cate"); 
                }
            }
            else if($Fil_Status != NULL)
            {
                header("Location: products.php?id=$Current_Admin&status=$Fil_Status"); 
            }
            else
            {
                header("Location: products.php?id=$Current_Admin");
            }
        }
    }
    
?>