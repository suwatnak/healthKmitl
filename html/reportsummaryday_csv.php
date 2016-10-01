<?php

$start = $_GET['start'];
$end = $_GET['end'];
$sort = $_GET['sort'];
$output = $_GET['output'];

header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
echo "\xEF\xBB\xBF"; // UTF-8 BOM

$filename = "summaryday" . '_' . date('Ymd') . ".csv";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: text/csv");
$out = fopen("php://output", 'w');
require("db_connect.php");
$strcountMEDICALHISTORYID = "SELECT count(MEDICALHISTORYID) AS COUNTMEDICALHISTORYID
FROM A_MEDICALHISTORY 
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY')";
$objParseMEDICALHISTORYID = oci_parse($objConnect, $strcountMEDICALHISTORYID);
oci_execute($objParseMEDICALHISTORYID);
$countMEDICALHISTORYID;
while (oci_fetch($objParseMEDICALHISTORYID)) {
    $countMEDICALHISTORYID = oci_result($objParseMEDICALHISTORYID, 'COUNTMEDICALHISTORYID');
}
$strtypeb = "SELECT count(A_PATIENT.TYPE) AS COUNTTYPEB
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID
WHERE A_PATIENT.TYPE='บุคลากร' AND TO_DATE (A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY')";
$objParsetypeb = oci_parse($objConnect, $strtypeb);
oci_execute($objParsetypeb);
$counttypeb;
while (oci_fetch($objParsetypeb)) {
    $counttypeb = oci_result($objParsetypeb, 'COUNTTYPEB');
}

$strtypen = "SELECT count(A_PATIENT.TYPE) AS COUNTTYPEN
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID
WHERE A_PATIENT.TYPE='นักศึกษา' AND TO_DATE (A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY')";
$objParsetypen = oci_parse($objConnect, $strtypen);
oci_execute($objParsetypen);
$counttypen;
while (oci_fetch($objParsetypen)) {
    $counttypen = oci_result($objParsetypen, 'COUNTTYPEN');
}

$strcountdis = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS NUM
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY')
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
$objParsecountdis = oci_parse($objConnect, $strcountdis);
oci_execute($objParsecountdis);
$countdis;
while (oci_fetch($objParsecountdis)) {
    $countdis = oci_result($objParsecountdis,'NAME').'  '.oci_result($objParsecountdis,'NUM');
}

$strcountfaculty = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS NUM
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY')
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
$objParsecountfaculty = oci_parse($objConnect, $strcountfaculty);
oci_execute($objParsecountfaculty);
$countfaculty;
while (oci_fetch($objParsecountfaculty)) {
    $countfaculty = oci_result($objParsecountfaculty, 'TNAME').'  '.oci_result($objParsecountfaculty, 'NUM');
}
$headreport = array("สรุปรายงานระหว่างวันที่"."  "."$start"." "."ถึง"." "."$end");
fputcsv($out, $headreport, ',', '"');
$student = array("นักศึกษา", "$counttypen");
fputcsv($out, $student, ',', '"');
$person = array("บุคลากร", "$counttypeb");
fputcsv($out, $person, ',', '"');
$countall = array("จำนวนทั้งหมด","$countMEDICALHISTORYID");
fputcsv($out, $countall, ',','"');
$countdiss = array("โรคที่เป็นมากที่สุด","$countdis");
fputcsv($out, $countdiss, ',','"');
$countfacc = array("หน่วยงานที่เข้ามารักษามากที่สุด","$countfaculty");
fputcsv($out, $countfacc, ',','"');

if ($output == 1) {
    $head = array("รหัสผู้ป่วย", "ประเภท", "ชื่อ", "นามสกุล", "หน่วยงาน", "โรค", "ยา", "วัน", "เวลา");
    $space = array("");
    fputcsv($out, $space, ',', '"');
    fputcsv($out, array_values($head), ',', '"');
    $strSQL = "SELECT * FROM (
SELECT A_MEDICALHISTORY.MEDICALHISTORYID,A_PATIENT.PATIENTID,A_PATIENT.TYPE,A_PATIENT.TNAME,A_PATIENT.LNAME,A_FACULTY.TNAME AS FACULTY,A_DISEASE.NAME,TO_DATE(A_MEDICALHISTORY.DATEE, 'dd/mm/yyyy') AS DATEE,A_MEDICALHISTORY.TIME 
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID INNER JOIN A_DISEASE ON A_DISEASE.DISEASEID=A_MEDICALHISTORY.DISEASEID
WHERE TO_DATE (A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY'))
order by $sort";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (oci_fetch($objParse)) {
        $myArray = (array("PATIENTID" => oci_result($objParse, 'PATIENTID'), "TYPE" => oci_result($objParse, 'TYPE'), "TNAME" => oci_result($objParse, 'TNAME'), "LNAME" => oci_result($objParse, 'LNAME'), "FACULTY" => oci_result($objParse, 'FACULTY'), "NAME" => oci_result($objParse, 'NAME')));
        $ID = oci_result($objParse, 'MEDICALHISTORYID');

        $strSQLhistory = "SELECT A_MEDICINE.NAME AS NAMEHIS,A_MEDICINELIST.QUANTITY,A_MEDICINE.UNIT 
FROM A_MEDICINELIST INNER JOIN A_MEDICINE ON A_MEDICINELIST.MEDICINEID=A_MEDICINE.MEDICINEID  
WHERE A_MEDICINELIST.MEDICALHISTORYID='$ID'";
        $objParsehistory = oci_parse($objConnect, $strSQLhistory);
        oci_execute($objParsehistory);

        $test = null;
        while (oci_fetch($objParsehistory)) {
            $test.=oci_result($objParsehistory, 'NAMEHIS') . ' * ' . oci_result($objParsehistory, 'QUANTITY') . '  ' . oci_result($objParsehistory, 'UNIT') . ',';
        }

        array_push($myArray, $test, oci_result($objParse, 'DATEE'), oci_result($objParse, 'TIME'));
        fputcsv($out, $myArray, ',', '"');
        $test = null;
    }
}
oci_close($objConnect);
fclose($out);
exit;
