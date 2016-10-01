<?php
require("db_connect.php");
session_start();
$sql = "SELECT A_MEDICALHISTORY_NOTDISBURSE.MEDICALHISTORYID, A_PATIENT.TNAME,A_PATIENT.LNAME FROM A_MEDICALHISTORY_NOTDISBURSE
INNER JOIN A_PATIENT ON A_MEDICALHISTORY_NOTDISBURSE.PATIENTID=A_PATIENT.PATIENTID ";
$staff = ociparse($objConnect, $sql) or die("can't connect database");
oci_execute($staff);
$i = 0;
while ($result = oci_fetch_array($staff)) {
        $spz[$i] = $result["TNAME"] . '   ' . $result["LNAME"];
        $spz1[$i] = $result["MEDICALHISTORYID"];
        $i++;
    
}


$sqlz = "select * from A_MEDICINE ORDER BY (QUANTITY / REORDER_POINT)";
$staffz = ociparse($objConnect, $sqlz) or die("can't connect database");
oci_execute($staffz);
$qw = 0;
while ($resultz = oci_fetch_array($staffz)) {
    if ($resultz["QUANTITY"] <= $resultz["REORDER_POINT"]) {
        $kz[$qw] = $resultz["NAME"];
        $kz1[$qw] = $resultz["MEDICINEID"];
        $kz2[$qw] = ($resultz["QUANTITY"] * 100) / $resultz["REORDER_POINT"];
        $qw++;
    }
}
$count=0;
$sqlt = "SELECT count(MEDICALHISTORYID) AS count
FROM A_MEDICALHISTORY 
WHERE  DATEE=TO_CHAR(SYSDATE, 'dd/mm/yyyy') and STATUS=1 ";
$stafft = ociparse($objConnect, $sqlt) or die("can't connect database");
oci_execute($stafft);
while ($resultt = oci_fetch_array($stafft)) {
   $count= $resultt["COUNT"];
}

?>

<?php if (isset($_SESSION["def"])) {
    ?>
    <!-- #section:basics/navbar.dropdown -->
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
    <?php if ($_SESSION['zzz'] == "nurse") { ?>
                <li class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-hospital-o"></i>
                        <span class="badge badge-success"><?php echo $count; ?></sโpan>
                    </a>
                </li>
                <li class="grey">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-medkit"></i>
                        <span class="badge badge-grey"><?php echo $qw; ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-check"></i>
        <?php echo $qw; ?> &nbsp;MEDICINE ALERT
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
        <?php
        $qz = 0;
        while ($qz < $qw) {
            ?>
                                    <li>
                                        <a href="inputmedicine.php?az=<?php echo $kz1[$qz]; ?>">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <?php
                                                    echo $kz[$qz];
                                                    ?></span>
                                                <span class="pull-right"><?php echo round($kz2[$qz]); ?>%</span>
                                            </div>
                                            <div class="progress progress-mini">
                                                <div style="width:<?php echo round($kz2[$qz]); ?>%"
                                                <?php if ($kz2[$qz] > 60) { ?> 
                                                         class="progress-bar progress-bar-success"></div>
                                                     <?php } elseif ($kz2[$qz] > 30) { ?>
                                                    class="progress-bar progress-bar-warning"></dlv>
                                                <?php } else { ?>
                                                    class="progress-bar progress-bar-danger"></dlv>
                                                <?php } ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php $qz++;
                                } ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <?php if ($i > 0) { ?>
                    <li class="purple" id="xyz"> 
                        <a data-toggle="dropdown" class="dropdown-toggle" >
                            <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            <span class="badge badge-important"><?php echo $i ?></span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-exclamation-triangle"></i>
                                <?php echo $i ?> Notifications
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar navbar-pink">

                                    <?php
                                    $a = 0;
                                    while ($a < $i) {
                                        ?>
                                        <li href="#notialert" data-toggle="modal" onclick="noti(this.value)" value="<?php echo $spz1[$a]; ?>">
                                            <a>
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        <i class="btn btn-xs btn-primary fa fa-user"></i>
                                                        <?php
                                                        echo $spz[$a];
                                                        ?>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                        $a++;
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php } else {
                    ?>
                    <li class="purple" id="xyz"> 
                        <a data-toggle="dropdown" class="dropdown-toggle" >
                            <i class="ace-icon fa fa-bell "></i>
                            <span class="badge badge-important"></span>
                        </a>
                    </li>         
                    <?php
                }
            }
            ?>

            <!-- #section:basics/navbar.user_menu -->
            <li class="light-blue">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <?php if ($_SESSION['zzz'] == "doctor") { ?>
                        <img src="../assets/avatars/docz.png" alt="docz's Photo" />
                    <?php } else { ?>
                        <img src="../assets/avatars/nursez.png" alt="nursez's Photo" />
                    <?php } ?>
                    <span class="user-info">
                        <small>ยินดีต้อนรับ,</small>
                        <?php
                        echo $_SESSION['def'];
                        ?>
                    </span>

                    <i class="ace-icon fa fa-caret-down"></i>
                </a>

                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                    <li>
                        <a href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>

            <!-- /section:basics/navbar.user_menu -->
        </ul>
    </div>
    <?php
} else {
    header("location:../index.php");
}
?>

<div id="notialert" class="modal fade" tabindex="-1">
    <div class="col-sm-2"> </div><div class="col-sm-8">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="refresh()">&times;</button>
                <h4 class="blue bigger">สั่งจ่ายยา</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="">
                        <form class="form-horizontal" role="form" name="formnotialert">

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="namenoti">ชื่อ :</label>
                                <div class="col-sm-2">
                                    <input type="text" id="namenoti" placeholder="ชื่อ" disabled="disabled" />
                                </div>
                                <label class="col-xs-2 control-label no-padding-right" for="lastnamenoti">นามสกุล :</label>
                                <div class="col-sm-2">
                                    <input type="text" id="lastnamenoti" placeholder="นามสกุล" disabled="disabled"/>
                                </div>
                                <label class="col-xs-1 control-label no-padding-right" for="diseasenoti">โรค :</label>
                                <div class="col-sm-2">
                                    <input type="text" id="diseasenoti"  disabled="disabled"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1"></div><div class="col-xs-10">

                                    <table id="listmedicinemedicalhistorynoti" class="table table-striped table-bordered table-hover">

                                    </table>   
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <textarea  rows="5" id="notemedicalhistorynoti" class="form-control" placeholder="อาการของผู้ป่วย" disabled="" ></textarea>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


                <div class="modal-footer">
                    <div id="showresultdispense"></div>
                    <button class="btn btn-sm" data-dismiss="modal" onclick="refresh()">
                        <i class="ace-icon fa fa-times"></i>
                        ยกเลิก
                    </button>

                    <button class="btn btn-sm btn-primary" onclick="dispense(n)" id="dispensesubmit">
                        <!--                                                        insertmedicine(form1.codemedicine.value,form1.namemedicine.value,form1.unit.value,form1.spinnert1.value)-->
                        <i class="ace-icon fa fa-check"></i>
                        สั่งจ่าย
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/noti.js"></script>
