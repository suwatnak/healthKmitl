
<?php
require("db_connect.php");
$codestudent = $_POST["codestudent"];
$strSQL = "DELETE FROM A_PATIENT WHERE PATIENTID='$codestudent'";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute($objParse);
?>
