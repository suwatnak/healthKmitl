<?php

$functionName = trim($_POST["functionName"]);
$MEDICALHISTORYID = trim($_POST["MEDICALHISTORYID"]);
$m = $_POST["m"];


if ($functionName == "selectnamelastnamedisease") {
    selectnamelastnamedisease($MEDICALHISTORYID);
} else if ($functionName == "selectmedecinehistorynoti") {
    selectmedecinehistorynoti($MEDICALHISTORYID);
} else if ($functionName == "selectquantitynoti") {
    selectquantitynoti($MEDICALHISTORYID);
} else if ($functionName == "updatedata") {
    updatedata($MEDICALHISTORYID, $m);
}else if ($functionName == "updatedataa") {
    updatedataa($MEDICALHISTORYID);
}

function selectnamelastnamedisease($MEDICALHISTORYID) {

    require("db_connect.php");
    $strSQL = "SELECT A_PATIENT.TNAME, A_PATIENT.LNAME ,A_DISEASE.NAME,A_MEDICALHISTORY_NOTDISBURSE.NOTE  
FROM A_MEDICALHISTORY_NOTDISBURSE INNER JOIN A_PATIENT ON A_MEDICALHISTORY_NOTDISBURSE.PATIENTID=A_PATIENT.PATIENTID 
INNER JOIN A_DISEASE ON A_MEDICALHISTORY_NOTDISBURSE.DISEASEID=A_DISEASE.DISEASEID 
WHERE A_MEDICALHISTORY_NOTDISBURSE.MEDICALHISTORYID='$MEDICALHISTORYID'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    while (oci_fetch($objParse)) {
        echo json_encode(array("TNAME" => oci_result($objParse, 'TNAME'), "LNAME" => oci_result($objParse, 'LNAME'), "NAME" => oci_result($objParse, 'NAME'), "NOTE" => oci_result($objParse, 'NOTE')));
    }
}

function selectmedecinehistorynoti($MEDICALHISTORYID) {

    require("db_connect.php");
    $strSQL = "SELECT A_MEDICINELIST.MEDICINEID,A_MEDICINE.NAME,A_MEDICINELIST.QUANTITY,A_MEDICINE.UNIT FROM A_MEDICINELIST INNER JOIN A_MEDICINE ON A_MEDICINELIST.MEDICINEID=A_MEDICINE.MEDICINEID  WHERE A_MEDICINELIST.MEDICALHISTORYID='$MEDICALHISTORYID' ORDER BY A_MEDICINELIST.MEDICINEID ";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $myArray = array();
    while (oci_fetch($objParse)) {
        $myArray[] = array("MEDICINEID" => oci_result($objParse, 'MEDICINEID'), "NAME" => oci_result($objParse, 'NAME'), "QUANTITY" => oci_result($objParse, 'QUANTITY'), "UNIT" => oci_result($objParse, 'UNIT'));
    }
    echo $json = json_encode($myArray);
}

function selectquantitynoti($MEDICALHISTORYID) {

    require("db_connect.php");
    $strSQL = "SELECT A_MEDICINE.MEDICINEID,A_MEDICINE.QUANTITY FROM A_MEDICINE INNER JOIN A_MEDICINELIST ON A_MEDICINELIST.MEDICINEID=A_MEDICINE.MEDICINEID  WHERE A_MEDICINELIST.MEDICALHISTORYID='$MEDICALHISTORYID' ORDER BY A_MEDICINE.MEDICINEID";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $myArray = array();
    while (oci_fetch($objParse)) {
        $myArray[] = array("MEDICINEID" => oci_result($objParse, 'MEDICINEID'), "QUANTITY" => oci_result($objParse, 'QUANTITY'));
    }
    echo $json = json_encode($myArray);
}

function updatedata($MEDICALHISTORYID, $m) {
    require("db_connect.php");
    $strSQLL = "UPDATE A_MEDICALHISTORY SET STATUS='1' WHERE MEDICALHISTORYID='$MEDICALHISTORYID'";
    $objParsee = oci_parse($objConnect, $strSQLL);
    oci_execute($objParsee);

    $strSQLLL = "DELETE FROM A_MEDICALHISTORY_NOTDISBURSE WHERE MEDICALHISTORYID = '$MEDICALHISTORYID'";
    $objParseee = oci_parse($objConnect, $strSQLLL);
    oci_execute($objParseee);

    for ($i = 0; $i < count($m); $i++) {
        $quantity = $m[$i][1];
        $medicineid = $m[$i][0];
        $strSQL = "UPDATE A_MEDICINE SET QUANTITY='$quantity' WHERE MEDICINEID='$medicineid'";
        $objParse = oci_parse($objConnect, $strSQL);
        oci_execute($objParse);
    }

    echo 'complete';
}

function updatedataa($MEDICALHISTORYID) {
    require("db_connect.php");
    $strSQLL = "UPDATE A_MEDICALHISTORY SET STATUS='1' WHERE MEDICALHISTORYID='$MEDICALHISTORYID'";
    $objParsee = oci_parse($objConnect, $strSQLL);
    oci_execute($objParsee);
    
    $strSQLLL = "DELETE FROM A_MEDICALHISTORY_NOTDISBURSE WHERE MEDICALHISTORYID = '$MEDICALHISTORYID'";
    $objParseee = oci_parse($objConnect, $strSQLLL);
    oci_execute($objParseee);

    echo 'complete';
}