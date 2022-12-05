<?php
	session_start();
    include("dataconnection.php");
	if(isset($_POST["loginbtn"]))
	{
		$Admin_Email = $_POST['adminemail'];
		$Admin_Password = $_POST['adminpass'];
		$query = "SELECT * FROM `admin_login` WHERE `Admin_Email` = '$Admin_Email' AND `Admin_Password` = '$Admin_Password' ";
		$result = mysqli_query($dataconnection,$query);
		if(mysqli_num_rows($result)>0)
		{
			foreach($result as $data)
			{
				$Admin_ID = $data['ID']; 
				$Admin_Fname = $data['Admin_Fname'];
				$Admin_Lname = $data['Admin_Lname']; 
				$Admin_Email = $data['Admin_Email'];
				$Admin_Phone = $data['Admin_Phone'];
			}
			header("location: index.php?id=$Admin_ID");
			$_SESSION['Email'] = $Admin_Email; 
			$_SESSION['Name'] = $Admin_Fname. " " .$Admin_Lname;
			$_SESSION['Phone'] = $Admin_Phone; 
			$_SESSION['Fname'] = $Admin_Fname;
			$_SESSION['Lname'] = $Admin_Lname;
			$_SESSION['ID'] = $Admin_ID;
			$page_title = "Home Page";
		}
		else
		{
			$_SESSION['message'] = "Invalid password or username";
			header("location: login.php");
            exit(0);
		}
	}
?>