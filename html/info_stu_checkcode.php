<?php

require("db_connect.php");
$codestudent = trim($_POST["codestudent"]);
$functionName = trim($_POST["functionName"]);
//$functionName = filter_input(INPUT_POST, 'functionName');
//$codestudent = filter_input(INPUT_POST, 'userid');
$strSQL = "SELECT * FROM A_PATIENT WHERE PATIENTID='$codestudent'";
$objParse = oci_parse($objConnect, $strSQL);
oci_execute($objParse);

$countrows = null;

if ($functionName == "returnnoyes") {
    returnnoyes($objParse);
} else if ($functionName == "returnobjResult") {
    returnobjResult($objParse);
}

function returnnoyes($objParse) {

    $nrows = oci_fetch_all($objParse, $objResult);
    if ($nrows >= 1) {
        echo 'no';
    } else {
        echo 'yes';
    }
}

function returnobjResult($objParse) {
    header('Content-Type: application/json');
    while (oci_fetch($objParse)) {
        echo json_encode(array("PATIENTID" => oci_result($objParse, 'PATIENTID'), "TNAME" => oci_result($objParse, 'TNAME'), "LNAME" => oci_result($objParse, 'LNAME'), "SEX" => oci_result($objParse, 'SEX'), "FACID" => oci_result($objParse, 'FACID'), "TYPE" => oci_result($objParse, 'TYPE')));
    }
}
?>
