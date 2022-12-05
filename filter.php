<?php
    include("dataconnection.php");
    session_start();
    $Current_Admin = $_SESSION['ID'];
    if(isset($_POST['filterprobtn']))
    {
        $Fil_Name = $_POST['name'];
        $Fil_Cate = $_POST['cate'];
        $Fil_Size = $_POST['status'];
        if($Fil_Name != NULL)
        {
            if($Fil_Cate != NULL)
            {
                if($Fil_Size != NULL)
                {
                    header("Location: products.php?id=$Current_Admin&name=$Fil_Name&cate=$Fil_Cate&status=$Fil_Size"); 
                }
                else 
                {
                    header("Location: products.php?id=$Current_Admin&name=$Fil_Name&cate=$Fil_Cate"); 
                }
            }
            else if($Fil_Size != NULL)

            {
                header("Location: products.php?id=$Current_Admin&name=$Fil_Name&status=$Fil_Size"); 
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
                if($Fil_Size != NULL)
                {
                    header("Location: products.php?id=$Current_Admin&cate=$Fil_Cate&status=$Fil_Size"); 
                }
                else
                {
                    header("Location: products.php?id=$Current_Admin&cate=$Fil_Cate"); 
                }
            }
            else if($Fil_Size != NULL)
            {
                header("Location: products.php?id=$Current_Admin&status=$Fil_Size"); 
            }
            else
            {
                header("Location: products.php?id=$Current_Admin");
            }
        }
    }
    else if(isset($_POST['filterstockbtn']))
    {
        $Fil_Name = $_POST['name'];
        $Fil_Cate = $_POST['cate'];
        $Fil_Size = $_POST['size'];

        if($Fil_Name != NULL)
        {
            if($Fil_Cate != NULL)
            {
                if($Fil_Size != NULL)
                {
                    header("Location: stocks.php?id=$Current_Admin&name=$Fil_Name&cate=$Fil_Cate&size=$Fil_Size"); 
                }
                else 
                {
                    header("Location: stocks.php?id=$Current_Admin&name=$Fil_Name&cate=$Fil_Cate"); 
                }
            }
            else if($Fil_Size != NULL)
            {
                header("Location: stocks.php?id=$Current_Admin&name=$Fil_Name&size=$Fil_Size"); 
            }
            else
            {
                header("Location: stocks.php?id=$Current_Admin&name=$Fil_Name"); 
            }
        }
        else
        {
            if($Fil_Cate != NULL)
            {
                if($Fil_Size != NULL)
                {
                    header("Location: stocks.php?id=$Current_Admin&cate=$Fil_Cate&size=$Fil_Size"); 
                }
                else
                {
                    header("Location: stocks.php?id=$Current_Admin&cate=$Fil_Cate"); 
                }
            }
            else if($Fil_Size != NULL)
            {
                header("Location: stocks.php?id=$Current_Admin&size=$Fil_Size"); 
            }
            else
            {
                header("Location: stocks.php?id=$Current_Admin");
            }
        }
    }
    
?>
