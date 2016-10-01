<meta charset="utf-8" />
<?php
$codestudent = $_POST["codestudent"];
$namestudent = $_POST["namestudent"];
$lastnamestudent = $_POST["lastnamestudent"];
$facultystudent = $_POST["facultystudent"];
$gender = $_POST["gender"];
require("db_connect.php");
$strSQL = "INSERT INTO A_PATIENT (PATIENTID, TNAME, LNAME, SEX, FACID, TYPE)
    VALUES ('$codestudent', '$namestudent', '$lastnamestudent', '$gender', '$facultystudent','นักศึกษา')";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute($objParse);
?>
