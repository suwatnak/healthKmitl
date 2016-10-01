<?php
$functionName = trim($_POST["functionName"]);
$date = $_POST["date"];
$time = $_POST["time"];
$medicine = $_POST["medicine"];
$quantity = $_POST["quantity"];

if ($functionName == "inserttotable") {
    inserttotable($medicine, $quantity, $date,$time);
} else if ($functionName == "selectdata") {
    selectdata($medicine);
}
else if ($functionName == "updatedata") {
    updatedata($medicine,$quantity);
}

function inserttotable($medicine, $quantity, $date,$time) {
 require("db_connect.php");
    $strSQL = "INSERT INTO A_INPUTMEDICINE (MEDICINEID, QUANTITY,DATEE,TIME)
    VALUES ('$medicine','$quantity','$date','$time')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function updatedata($medicine,$quantity) {
    require("db_connect.php");
    $strSQL = "UPDATE A_MEDICINE SET QUANTITY='$quantity' WHERE MEDICINEID='$medicine'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function selectdata($medicine) {

    require("db_connect.php");
    $strSQL = "SELECT QUANTITY FROM A_MEDICINE WHERE MEDICINEID='$medicine'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (oci_fetch($objParse)) {
    echo oci_result($objParse, 'QUANTITY');
    
}
    oci_close($objConnect);
}