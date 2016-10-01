<?PHP
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
echo "\xEF\xBB\xBF"; // UTF-8 BOM
  function cleanData(&$str)
  {
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "$str";
    }
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	
  }
  // filename for download
  $filename = "MEDICINE".'_' . date('Ymd') . ".csv";
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv");
  $out = fopen("php://output", 'w');
  
  $m = array("รายงานข้อมูลยาคงเหลือ", "", "", "");
   fputcsv($out, array_values($m), ',', '"');
$head = array("รหัสยา", "ชื่อยา", "จำนวนคงเหลือ", "หน่วย");
fputcsv($out, array_values($head), ',', '"');
  //$objConnect = oci_connect('db','1234','(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=XE)(SID=XE)))');
  require("db_connect.php");
  $strSQL = "SELECT MEDICINEID,NAME,QUANTITY,UNIT FROM A_MEDICINE order by NAME";
  $staff = oci_parse($objConnect, $strSQL) or die("can't connect database");
  oci_execute($staff);
  while(false !== ($row = oci_fetch_array($staff, OCI_ASSOC))) {
    //array_walk($row, 'cleanData');
    fputcsv($out, array_values($row), ',', '"');
  }
  fclose($out);
  exit;
?>