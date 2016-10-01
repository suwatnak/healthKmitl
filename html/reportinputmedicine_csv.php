<?php

$medicinereport = $_GET['medicinereport'];
$start = $_GET['start'];
$end = $_GET['end'];
$sort = $_GET['sort'];
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
echo "\xEF\xBB\xBF"; // UTF-8 BOM


$filename = "INPUTMEDICINE" . '_' . date('Ymd') . ".csv";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: text/csv");
$out = fopen("php://output", 'w');
$m = array("รายงานนำยาเข้าสู่ระบบตั้งแต่วันที่ ".$start." ถึง ".$end);
 fputcsv($out, $m, ',', '"');
$head = array("รหัสยา", "ชื่อยา", "จำนวน", "หน่วย", "วัน", "เวลา");
 fputcsv($out, array_values($head), ',', '"');
if ($medicinereport == '0') {
    require("db_connect.php");
    $strSQL = "SELECT * FROM(
SELECT A_INPUTMEDICINE.MEDICINEID,A_MEDICINE.NAME,A_INPUTMEDICINE.QUANTITY,A_MEDICINE.UNIT,TO_DATE(A_INPUTMEDICINE.DATEE, 'dd/mm/yyyy') AS DATEE,A_INPUTMEDICINE.TIME FROM A_INPUTMEDICINE INNER JOIN A_MEDICINE ON A_INPUTMEDICINE.MEDICINEID=A_MEDICINE.MEDICINEID)
WHERE  DATEE BETWEEN TO_DATE('$start', 'dd/mm/yyyy') AND  TO_DATE('$end', 'dd/mm/yyyy') ORDER BY $sort ";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    
    while (false !== ($row = oci_fetch_array($objParse, OCI_ASSOC))) {
        fputcsv($out, array_values($row), ',', '"');
    }
    oci_close($objConnect);
    fclose($out);
    exit;
} else {
    require("db_connect.php");
    $strSQL = "SELECT * FROM(
SELECT A_INPUTMEDICINE.MEDICINEID,A_MEDICINE.NAME,A_INPUTMEDICINE.QUANTITY,A_MEDICINE.UNIT,TO_DATE(A_INPUTMEDICINE.DATEE, 'dd/mm/yyyy') AS DATEE,A_INPUTMEDICINE.TIME FROM A_INPUTMEDICINE INNER JOIN A_MEDICINE ON A_INPUTMEDICINE.MEDICINEID=A_MEDICINE.MEDICINEID)
WHERE  MEDICINEID='$medicinereport' AND DATEE BETWEEN TO_DATE('$start', 'dd/mm/yyyy') AND  TO_DATE('$end', 'dd/mm/yyyy') ORDER BY $sort ";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (false !== ($row = oci_fetch_array($objParse, OCI_ASSOC))) {
       
        fputcsv($out, array_values($row), ',', '"');
    }
    oci_close($objConnect);
    fclose($out);
    exit;
}
?>