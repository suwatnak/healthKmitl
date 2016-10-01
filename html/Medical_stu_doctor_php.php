<?php

$functionName = trim($_POST["functionName"]);
$codestudent = trim($_POST["codestudent"]);
$namestudent = trim($_POST["namestudent"]);
$lastnamestudent = trim($_POST["lastnamestudent"]);
$gender = trim($_POST["gender"]);
$faculty = trim($_POST["faculty"]);

if ($functionName == "chackcodestudent") {
    chackcodestudent($codestudent);
} else if ($functionName == "insertdataA_PATIENT") {
    insertdataA_PATIENT($codestudent, $namestudent, $lastnamestudent, $gender, $faculty);
} else if ($functionName == "selectmedecine") {
    selectmedecine($codestudent);
} else if ($functionName == "selectunit") {
    selectunit($codestudent);
} else if ($functionName == "selectQUANTITY") {
    selectQUANTITY($codestudent);
}else if ($functionName == "countHistoryMedical") {
    countHistoryMedical($codestudent);
}else if ($functionName == "selectmedecinehistory") {
    selectmedecinehistory($codestudent);
}else if ($functionName == "selectnote") {
    selectnote($codestudent);
}
function selectnote($codestudent)
{
     require("db_connect.php");
    $strSQL = "SELECT NOTE  FROM A_MEDICALHISTORY WHERE MEDICALHISTORYID='$codestudent'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (oci_fetch($objParse)) {
        echo oci_result($objParse, 'NOTE');
    }
    oci_close($objConnect);
}

function selectmedecinehistory($codestudent) {
  
    require("db_connect.php");
    $strSQL = "SELECT A_MEDICINE.MEDICINEID ,A_MEDICINE.NAME,A_MEDICINELIST.QUANTITY,A_MEDICINE.UNIT FROM A_MEDICINE
INNER JOIN A_MEDICINELIST ON A_MEDICINE.MEDICINEID=A_MEDICINELIST.MEDICINEID WHERE A_MEDICINELIST.MEDICALHISTORYID='$codestudent' ORDER BY MEDICINEID";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $myArray = array();
    while (oci_fetch($objParse)) {
        $myArray[] = array("MEDICINEID" => oci_result($objParse, 'MEDICINEID'), "NAME" => oci_result($objParse, 'NAME'), "QUANTITY" => oci_result($objParse, 'QUANTITY'), "UNIT" => oci_result($objParse, 'UNIT'));
    }
    echo $json = json_encode($myArray);
    
}

function selectQUANTITY($codestudent) {
    require("db_connect.php");
    $strSQL = "SELECT NAME,QUANTITY FROM A_MEDICINE WHERE MEDICINEID='$codestudent'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    while (oci_fetch($objParse)) {
        echo json_encode(array("NAME" => oci_result($objParse, 'NAME'), "QUANTITY" => oci_result($objParse, 'QUANTITY')));
    }
    oci_close($objConnect);
}

function selectunit($codestudent) {
    require("db_connect.php");
    $strSQL = "SELECT UNIT FROM A_MEDICINE WHERE MEDICINEID='$codestudent'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (oci_fetch($objParse)) {
        echo oci_result($objParse, 'UNIT');
    }
    oci_close($objConnect);
}

function countHistoryMedical($codestudent) {

    require("db_connect.php");
    $strSQL = "SELECT count(MEDICALHISTORYID) as MEDICALHISTORYID  FROM A_MEDICALHISTORY 
WHERE PATIENTID='$codestudent'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    $nrows;
    while (oci_fetch($objParse)) {
        $nrows=oci_result($objParse, 'MEDICALHISTORYID');
    }
    echo $nrows;
    oci_close($objConnect);
}

function selectmedecine($codestudent) {
    require("db_connect.php");
    $strSQL = "SELECT A_MEDICINE.MEDICINEID ,A_MEDICINE.NAME,A_D_M_ASSOCIATION.QUANTITYMEDICINE,A_MEDICINE.UNIT,A_MEDICINE.QUANTITY FROM A_MEDICINE
INNER JOIN A_D_M_ASSOCIATION ON A_MEDICINE.MEDICINEID=A_D_M_ASSOCIATION.MEDICINEID WHERE A_D_M_ASSOCIATION.DISEASEID='$codestudent' ORDER BY NAME";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $myArray = array();
    while (oci_fetch($objParse)) {
        $myArray[] = array("MEDICINEID" => oci_result($objParse, 'MEDICINEID'), "NAME" => oci_result($objParse, 'NAME'), "QUANTITYMEDICINE" => oci_result($objParse, 'QUANTITYMEDICINE'), "UNIT" => oci_result($objParse, 'UNIT'), "QUANTITY" => oci_result($objParse, 'QUANTITY'));
    }
    echo $json = json_encode($myArray);
    
}

function insertdataA_PATIENT($codestudent, $namestudent, $lastnamestudent, $gender, $faculty) {

    require("db_connect.php");
    $strSQL = "INSERT INTO A_PATIENT (PATIENTID, TNAME, LNAME, SEX, FACID, TYPE)
    VALUES ('$codestudent', '$namestudent', '$lastnamestudent', '$gender', '$faculty','นักศึกษา')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function chackcodestudent($codestudent) {
    require("db_connect.php");
    $strSQL = "SELECT * FROM A_PATIENT WHERE PATIENTID='$codestudent'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $nrows = oci_fetch_all($objParse, $objResult);

    if ($nrows >= 1) {
        oci_execute($objParse);
        while (oci_fetch($objParse)) {
            echo json_encode(array("PATIENTID" => oci_result($objParse, 'PATIENTID'), "TNAME" => oci_result($objParse, 'TNAME'), "LNAME" => oci_result($objParse, 'LNAME'), "SEX" => oci_result($objParse, 'SEX'), "FACID" => oci_result($objParse, 'FACID'), "STATUS" => '0'));
        }
    } else {
        $strSQL = "SELECT * FROM A_STUDENT_TEST WHERE STDID='$codestudent'";
        $objParse = oci_parse($objConnect, $strSQL);
        oci_execute($objParse);
        $nrows = oci_fetch_all($objParse, $objResult);
        if ($nrows >= 1) {
            oci_execute($objParse);
            while (oci_fetch($objParse)) {
                echo json_encode(array("PATIENTID" => oci_result($objParse, 'STDID'), "TNAME" => oci_result($objParse, 'TNAME'), "LNAME" => oci_result($objParse, 'LNAME'), "SEX" => oci_result($objParse, 'SEX'), "FACID" => oci_result($objParse, 'FACID'), "STATUS" => '1'));
            }
        } else {
            echo json_encode(array("STATUS" => '2'));
        }
    }
    oci_close($objConnect);
}
