<?php

$functionName = trim($_POST["functionName"]);
$codedisease = $_POST["codedisease"];
$medicineid = $_POST["medicineid"];
$QUANTITYMEDICINE = $_POST["QUANTITYMEDICINE"];

if ($functionName == "showlistmedicine") {
    showlistmedicine($codedisease);
} else if ($functionName == "updatedata") {
    updatedata($codedisease, $medicineid, $QUANTITYMEDICINE);
} else if ($functionName == "deletedata") {
    deletedata($codedisease, $medicineid);
} else if ($functionName == "checkmedicine") {
    checkmedicine($codedisease, $medicineid);
} else if ($functionName == "inserttotable") {
    inserttotable($codedisease, $medicineid, $QUANTITYMEDICINE);
}

function checkmedicine($codedisease, $medicineid) {
    require("db_connect.php");
    $strSQL = "SELECT MEDICINEID FROM A_D_M_ASSOCIATION WHERE DISEASEID='$codedisease' AND MEDICINEID='$medicineid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    $nrows = oci_fetch_all($objParse, $objResult);
    
    if ($nrows >= 1) {
        echo 'true';
    } else {
        echo 'false';
    }
    oci_close($objConnect);
}

function inserttotable($codedisease, $medicineid, $QUANTITYMEDICINE) {

    require("db_connect.php");
    $strSQL = "INSERT INTO A_D_M_ASSOCIATION (DISEASEID, MEDICINEID, QUANTITYMEDICINE)
    VALUES ($codedisease, '$medicineid','$QUANTITYMEDICINE')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function deletedata($codedisease, $medicineid) {

    require("db_connect.php");
    $strSQL = "DELETE FROM A_D_M_ASSOCIATION WHERE DISEASEID='$codedisease' AND MEDICINEID='$medicineid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function updatedata($codedisease, $medicineid, $QUANTITYMEDICINE) {

    require("db_connect.php");
    $strSQL = "UPDATE A_D_M_ASSOCIATION SET QUANTITYMEDICINE='$QUANTITYMEDICINE' WHERE DISEASEID='$codedisease' AND MEDICINEID='$medicineid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}


?>
