<?php

$functionName = trim($_POST["functionName"]);
$nameperson = trim($_POST["nameperson"]);
$lastnameperson = trim($_POST["lastnameperson"]);
$gender = trim($_POST["gender"]);
$faculty = trim($_POST["faculty"]);
$codeperson = trim($_POST["codeperson"]);


if ($functionName == "checkdata") {
    checkdata($nameperson, $lastnameperson);
} else if ($functionName == "insertdata") {
    insertdata($nameperson, $lastnameperson, $gender, $faculty);
} else if ($functionName == "checkdata2") {
    checkdata2($nameperson);
} else if ($functionName == "selectdata") {
    selectdata($nameperson, $lastnameperson);
} else if ($functionName == "updatedata") {
    updatedata($nameperson, $lastnameperson, $gender, $faculty, $codeperson);
}else if ($functionName == "deletedata") {
    deletedata($codeperson);
}

function deletedata($codeperson) {
    
    require("db_connect.php");
    $strSQL = "DELETE FROM  A_PATIENT WHERE PATIENTID='$codeperson'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}
function updatedata($nameperson, $lastnameperson, $gender, $faculty, $codeperson) {

    require("db_connect.php");
    $strSQL = "UPDATE A_PATIENT SET TNAME='$nameperson', LNAME='$lastnameperson', SEX='$gender',FACID='$faculty' WHERE PATIENTID='$codeperson'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function selectdata($nameperson, $lastnameperson) {

    require("db_connect.php");
    $strSQL = "SELECT * FROM A_PATIENT WHERE TNAME='$nameperson' AND LNAME='$lastnameperson' AND TYPE='บุคลากร'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    while (oci_fetch($objParse)) {
        echo json_encode(array("PATIENTID" => oci_result($objParse, 'PATIENTID'), "TNAME" => oci_result($objParse, 'TNAME'), "LNAME" => oci_result($objParse, 'LNAME'), "SEX" => oci_result($objParse, 'SEX'), "FACID" => oci_result($objParse, 'FACID'), "TYPE" => oci_result($objParse, 'TYPE')));
    }
    oci_close($objConnect);
}

function insertdata($nameperson, $lastnameperson, $gender, $faculty) {

    require("db_connect.php");
    $strSQL = "INSERT INTO A_PATIENT (PATIENTID, TNAME, LNAME, SEX, FACID, TYPE)
    VALUES (A_PERSONID_AUTO.NEXTVAL, '$nameperson', '$lastnameperson', '$gender', '$faculty','บุคลากร')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function checkdata($nameperson, $lastnameperson) {
    require("db_connect.php");
    $strSQL = "SELECT * FROM A_PATIENT WHERE TNAME='$nameperson' AND LNAME='$lastnameperson'";
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
