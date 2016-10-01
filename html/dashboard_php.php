<?php

$functionName = trim($_POST["functionName"]);

if ($functionName == "selectchart") {
    selectchart();
} else if ($functionName == "selectchartfaculty") {
    selectchartfaculty();
}

function selectchartfaculty() {
    $myArray = array();
     require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-6) and last_day(add_months(trunc(sysdate,'mm'),-6))
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $t = 0;
    while (oci_fetch($objParse)) {
        $t++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($t == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);
    
     require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-5) and last_day(add_months(trunc(sysdate,'mm'),-5))
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $r = 0;
    while (oci_fetch($objParse)) {
        $r++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($r == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);
    
     require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-4) and last_day(add_months(trunc(sysdate,'mm'),-4))
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $e= 0;
    while (oci_fetch($objParse)) {
        $e++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($e == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);
    
     require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-3) and last_day(add_months(trunc(sysdate,'mm'),-3))
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $w = 0;
    while (oci_fetch($objParse)) {
        $w++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($w == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);
    
     require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-2) and last_day(add_months(trunc(sysdate,'mm'),-2))
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $q = 0;
    while (oci_fetch($objParse)) {
        $q++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($q == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);
    
    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-1) and last_day(add_months(trunc(sysdate,'mm'),-1))
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $i = 0;
    while (oci_fetch($objParse)) {
        $i++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($i == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);
    
    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_FACULTY.TNAME,COUNT(A_PATIENT.FACID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_PATIENT ON A_MEDICALHISTORY.PATIENTID=A_PATIENT.PATIENTID  INNER JOIN A_FACULTY ON A_PATIENT.FACID=A_FACULTY.FACID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN TRUNC(TO_DATE(SYSDATE), 'MONTH') and TO_DATE (SYSDATE,'DD/MM/YYYY')
GROUP BY A_FACULTY.TNAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $i = 0;
    while (oci_fetch($objParse)) {
        $i++;
        $myArray[] = array("TNAME" => oci_result($objParse, 'TNAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($i == 0) {
        $myArray[] = array("TNAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);


    echo json_encode($myArray);
}

function selectchart() {
    $myArray = array();

    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-6) and last_day(add_months(trunc(sysdate,'mm'),-6))
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $t = 0;
    while (oci_fetch($objParse)) {
        $t++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($t == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);

    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-5) and last_day(add_months(trunc(sysdate,'mm'),-5))
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $r = 0;
    while (oci_fetch($objParse)) {
        $r++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($r == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);


    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-4) and last_day(add_months(trunc(sysdate,'mm'),-4))
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $e = 0;
    while (oci_fetch($objParse)) {
        $e++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($e == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);


    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-3) and last_day(add_months(trunc(sysdate,'mm'),-3))
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $w = 0;
    while (oci_fetch($objParse)) {
        $w++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($w == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);

    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-2) and last_day(add_months(trunc(sysdate,'mm'),-2))
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $q = 0;
    while (oci_fetch($objParse)) {
        $q++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($q == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);

    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN add_months(trunc(sysdate,'mm'),-1) and last_day(add_months(trunc(sysdate,'mm'),-1))
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $j = 0;
    while (oci_fetch($objParse)) {
        $j++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($j == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);




    require("db_connect.php");
    $strSQL = "SELECT * 
FROM (SELECT A_DISEASE.NAME,COUNT(A_MEDICALHISTORY.DISEASEID) AS Num
FROM A_MEDICALHISTORY INNER JOIN A_DISEASE ON A_MEDICALHISTORY.DISEASEID=A_DISEASE.DISEASEID
WHERE TO_DATE (DATEE, 'DD/MM/YYYY') BETWEEN TRUNC(TO_DATE(SYSDATE), 'MONTH') and TO_DATE (SYSDATE,'DD/MM/YYYY')
GROUP BY A_DISEASE.NAME 
order by Num DESC)
WHERE ROWNUM = 1";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    header('Content-Type: application/json');
    $i = 0;
    while (oci_fetch($objParse)) {
        $i++;
        $myArray[] = array("NAME" => oci_result($objParse, 'NAME'), "NUM" => oci_result($objParse, 'NUM'));
    }
    if ($i == 0) {
        $myArray[] = array("NAME" => '', "NUM" => 0);
    }
    oci_close($objConnect);


    echo json_encode($myArray);
}
