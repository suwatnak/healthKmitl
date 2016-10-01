<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>
    <body>
        <?php
        ob_start();
        session_start();
        $tName = $_POST['txtUsername'];
        $tPass = $_POST['txtPassword'];

        require("db_connect.php");
        $strSQL = "SELECT * FROM A_AUTHENTICATION where USERNAME='$tName' and PASSWORD='$tPass'";
        $staff = ociparse($objConnect, $strSQL) or die("can't connect database");
        oci_execute($staff);
        $rows = oci_fetch_array($staff);
        if (count($rows) >= 1) {
            $user = $rows["USERNAME"];
            $pass = $rows["PASSWORD"];

            if ($user == $tName && $pass == $tPass && $rows != 0) {
                $_SESSION["abc"] = $rows["USERID"];
                $_SESSION["def"] = $rows["TNAME"];
                $_SESSION["zzz"] = $rows["STATUS"];
                session_write_close();
				if($rows["STATUS"] == "doctor")
                	header("location:Medical_stu_doctor.php");
				else
					header("location:Medical_stu.php");
            } else {
                echo "<script language='javascript'>alert('Username or Password incorrect!');</script>";
                print "<meta http-equiv=refresh content=0;URL=../index.php>";
            }
        }
        ?>
    </body>
</html>