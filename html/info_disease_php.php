<?php

$functionName = trim($_POST["functionName"]);
$diseaseid= trim($_POST["diseaseid"]);
$namemedisease = trim($_POST["namemedisease"]);

if ($functionName == "insertdata") {
    insertdata($namemedisease);
}
else if($functionName == "updatedata") {
    updatedata($diseaseid,$namemedisease);
}
 else if ($functionName == "selectdata") {
    selectdata($diseaseid);
}
else if ($functionName == "deletedata") {
    deletedata($diseaseid);
}
function deletedata($diseaseid)
{
    require("db_connect.php");
    $strSQL = "DELETE FROM A_DISEASE WHERE DISEASEID='$diseaseid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}

function selectdata($diseaseid) {

    require("db_connect.php");
    $strSQL = "SELECT * FROM A_DISEASE WHERE DISEASEID='$diseaseid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    while (oci_fetch($objParse)) {
    echo oci_result($objParse, 'NAME');
    
}
    oci_close($objConnect);
}

function updatedata($diseaseid,$namemedisease)
{
    require("db_connect.php");
    $strSQL = "UPDATE A_DISEASE SET NAME='$namemedisease' WHERE DISEASEID='$diseaseid'";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}
function insertdata($namemedisease) {
    
     require("db_connect.php");
    $strSQL = "INSERT INTO A_DISEASE (DISEASEID, NAME)
    VALUES (A_DISEASEID_AUTO.NEXTVAL, '$namemedisease')";
    $objParse = oci_parse($objConnect, $strSQL);
    oci_execute($objParse);
    oci_close($objConnect);
}
?>