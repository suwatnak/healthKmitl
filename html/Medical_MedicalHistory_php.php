<?php

$functionName = $_POST["functionName"];
$codestudent = $_POST["codestudent"];
$date = $_POST["date"];
$time = $_POST["time"];
$diseaseid = trim($_POST["diseaseid"]);
$note = $_POST["note"];
$test = $_POST["test"];

if ($functionName == "insertMedicalHistory") {
    insertMedicalHistory($codestudent, $diseaseid, $date, $time, $note, $test);
} 

function insertMedicalHistory($codestudent, $diseaseid, $date, $time, $note, $test) {
    require("db_connect.php");
    $strSQL = "INSERT INTO A_MEDICALHISTORY (MEDICALHISTORYID, DISEASEID, PATIENTID, STATUS, DATEE, TIME,NOTE)
    VALUES (A_MEDICALHISTORYID_AUTO.NEXTVAL, '$diseaseid', '$codestudent', '1', '$date','$time','$note')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);

    $strSQL = "SELECT MEDICALHISTORYID FROM A_MEDICALHISTORY WHERE DATEE='$date' AND TIME='$time' AND PATIENTID='$codestudent'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (oci_fetch($objParse)) {
        $MEDICALHISTORYID = oci_result($objParse, 'MEDICALHISTORYID');
    }

    for ($i = 0; $i < count($test); $i++) {
        $MEDICINEID = $test[$i][0];
        $QUANTITYMEDICINE = $test[$i][2];
        $QUANTITY = $test[$i][4];

        if ($MEDICINEID == null) {
            
        } else {

            $strSQL = "INSERT INTO A_MEDICINELIST (MEDICALHISTORYID, MEDICINEID, QUANTITY) VALUES ('$MEDICALHISTORYID', '$MEDICINEID' , '$QUANTITYMEDICINE')";
            $objParse = oci_parse($objConnect, $strSQL);
            oci_execute($objParse);

            $m = $QUANTITY - $QUANTITYMEDICINE;

            $strSQLL = "UPDATE A_MEDICINE SET QUANTITY='$m' WHERE MEDICINEID='$MEDICINEID'";
            $objParsee = oci_parse($objConnect, $strSQLL);
            oci_execute($objParsee);
        }
    }oci_close($objConnect);
    echo 'complete';
}
