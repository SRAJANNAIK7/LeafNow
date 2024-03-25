<?php
    session_start();

    $user = dataFilter($_POST['uname']);
    $pass = $_POST['pass'];
    

    require '../db.php';


    $sql = "SELECT * FROM user WHERE uusername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    }

    else
    {
        $User = $result->fetch_assoc();

        if (password_verify($_POST['pass'], $User['upassword']))
        {
            $_SESSION['id'] = $User['uid'];
            $_SESSION['Hash'] = $User['uhash'];
            $_SESSION['Password'] = $User['upassword'];
            $_SESSION['Email'] = $User['uemail'];
            $_SESSION['Name'] = $User['uname'];
            $_SESSION['Username'] = $User['uusername'];
            $_SESSION['Mobile'] = $User['umobile'];
            $_SESSION['Addr'] = $User['uaddress'];
            $_SESSION['Active'] = $User['uactive'];
            $_SESSION['picStatus'] = $User['picStatus'];
            $_SESSION['picExt'] = $User['picExt'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 1;
            $_SESSION['Rating'] = 0;

            if($_SESSION['picStatus'] == 0)
            {
                $_SESSION['picId'] = 0;
                $_SESSION['picName'] = "profile0.png";
            }
            else
            {
                $_SESSION['picId'] = $_SESSION['id'];
                $_SESSION['picName'] = "profile".$_SESSION['picId'].".".$_SESSION['picExt'];
            }
            

            header("location: profile.php");
        }
        else
        {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");
        }
    }


    function dataFilter($data)
    {
    	$data = trim($data);
     	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
      	return $data;
    }

?>
