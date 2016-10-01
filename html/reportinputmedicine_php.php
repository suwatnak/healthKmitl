<?php

$medicinereport = trim($_POST["medicinereport"]);
$start = trim($_POST["start"]);
$end = trim($_POST["end"]);

if ($medicinereport == '0') {
    require("db_connect.php");
    $strSQL = "SELECT * FROM(
SELECT A_INPUTMEDICINE.MEDICINEID,A_MEDICINE.NAME,A_INPUTMEDICINE.QUANTITY,A_MEDICINE.UNIT,TO_DATE(A_INPUTMEDICINE.DATEE, 'dd/mm/yyyy') AS DATEE,A_INPUTMEDICINE.TIME FROM A_INPUTMEDICINE INNER JOIN A_MEDICINE ON A_INPUTMEDICINE.MEDICINEID=A_MEDICINE.MEDICINEID)
WHERE  DATEE BETWEEN TO_DATE('$start', 'dd/mm/yyyy') AND  TO_DATE('$end', 'dd/mm/yyyy')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    $nrows = oci_fetch_all($objParse, $objResult);
    echo $nrows;
    oci_close($objConnect);
} else {
    require("db_connect.php");
    $strSQL = "
SELECT * FROM(
SELECT A_INPUTMEDICINE.MEDICINEID,A_MEDICINE.NAME,A_INPUTMEDICINE.QUANTITY,A_MEDICINE.UNIT,TO_DATE(A_INPUTMEDICINE.DATEE, 'dd/mm/yyyy') AS DATEE,A_INPUTMEDICINE.TIME FROM A_INPUTMEDICINE INNER JOIN A_MEDICINE ON A_INPUTMEDICINE.MEDICINEID=A_MEDICINE.MEDICINEID)
WHERE  MEDICINEID='$medicinereport' AND DATEE BETWEEN TO_DATE('$start', 'dd/mm/yyyy') AND  TO_DATE('$end', 'dd/mm/yyyy')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    $nrows = oci_fetch_all($objParse, $objResult);
    echo $nrows;
    oci_close($objConnect);
}