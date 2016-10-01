
<?php
$codestudent = trim($_POST["codestudent"]);
$namestudent = trim($_POST["namestudent"]);
$lastnamestudent = trim($_POST["lastnamestudent"]);
$facultystudent = trim($_POST["facultystudent"]);
$gender = $_POST["gender"];

require("db_connect.php");
$strSQL = "UPDATE A_PATIENT SET TNAME='$namestudent', LNAME='$lastnamestudent', SEX='$gender', FACID='$facultystudent' WHERE PATIENTID='$codestudent'";
 $objParse = oci_parse($objConnect, $strSQL);
oci_execute($objParse);
oci_close($objConnect);
?>
