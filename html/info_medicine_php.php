<?php

$functionName = trim($_POST["functionName"]);
$medicineid = trim($_POST["medicineid"]);
$namemedicine = trim($_POST["namemedicine"]);
$unit = trim($_POST["unit"]);
$REORDER_POINT = trim($_POST["REORDER_POINT"]);

if ($functionName == "inserttotable") {
    inserttotable($namemedicine, $unit, $REORDER_POINT);
} else if ($functionName == "selectdata") {
    selectdata($medicineid);
} else if ($functionName == "updatedata") {
    updatedata($medicineid, $namemedicine, $unit, $REORDER_POINT);
} else if ($functionName == "deletedata") {
    deletedata($medicineid);
}

function deletedata($medicineid) {
    
    require("db_connect.php");
    $strSQL = "DELETE FROM A_MEDICINE WHERE MEDICINEID='$medicineid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function selectdata($medicineid) {

    require("db_connect.php");
    $strSQL = "SELECT * FROM A_MEDICINE WHERE MEDICINEID='$medicineid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    while (oci_fetch($objParse)) {
        echo json_encode(array("MEDICINEID" => oci_result($objParse, 'MEDICINEID'), "NAME" => oci_result($objParse, 'NAME'), "QUANTITY" => oci_result($objParse, 'QUANTITY'), "UNIT" => oci_result($objParse, 'UNIT'), "REORDER_POINT" => oci_result($objParse, 'REORDER_POINT')));
    }
    oci_close($objConnect);
}

function updatedata($medicineid, $namemedicine, $unit, $REORDER_POINT) {

    require("db_connect.php");
    $strSQL = "UPDATE A_MEDICINE SET NAME='$namemedicine', UNIT='$unit', REORDER_POINT='$REORDER_POINT' WHERE MEDICINEID='$medicineid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function inserttotable($namemedicine, $unit, $REORDER_POINT) {

    require("db_connect.php");
    $strSQL = "INSERT INTO A_MEDICINE (MEDICINEID, NAME, QUANTITY, UNIT, REORDER_POINT)
    VALUES (A_MEDICINEID_AUTO.NEXTVAL, '$namemedicine','0', '$unit', '$REORDER_POINT')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

?>