<?php
$start = $_GET['start'];
$end = $_GET['end'];
$sort = $_GET['sort'];
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
echo "\xEF\xBB\xBF"; // UTF-8 BOM

$filename = "summaryday" . '_' . date('Ymd') . ".csv";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: text/csv");
$out = fopen("php://output", 'w');
require("db_connect.php");

$headreport = array("สรุปรายงานข้อมูลการจ่ายยาระหว่างวันที่"."  "."$start"." "."ถึง"." "."$end");
fputcsv($out, $headreport, ',', '"');

    $head = array("รหัสยา","ชื่อยา","จำนวน","หน่วย");
    fputcsv($out, array_values($head), ',', '"');
    $strSQL = "SELECT A_MEDICINE.MEDICINEID,A_MEDICINE.NAME,COUNT(A_MEDICINELIST.QUANTITY) AS COUNTQUANTIRY,A_MEDICINE.UNIT
FROM A_MEDICALHISTORY INNER JOIN A_MEDICINELIST ON A_MEDICALHISTORY.MEDICALHISTORYID=A_MEDICINELIST.MEDICALHISTORYID   INNER JOIN A_MEDICINE ON A_MEDICINELIST.MEDICINEID=A_MEDICINE.MEDICINEID  
WHERE TO_DATE (A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY') BETWEEN TO_DATE ('$start','DD/MM/YYYY')  AND TO_DATE ('$end','DD/MM/YYYY')
GROUP BY  A_MEDICINE.MEDICINEID,A_MEDICINE.NAME,A_MEDICINE.UNIT
order by $sort";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while(false !== ($row = oci_fetch_array($objParse, OCI_ASSOC))) {
    fputcsv($out, array_values($row), ',', '"');
  }

oci_close($objConnect);
fclose($out);
exit;
