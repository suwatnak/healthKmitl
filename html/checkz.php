<?php
        require("db_connect.php");
        session_start();
        $sql = "SELECT A_MEDICALHISTORY_NOTDISBURSE.MEDICALHISTORYID, A_PATIENT.TNAME,A_PATIENT.LNAME FROM A_MEDICALHISTORY_NOTDISBURSE
INNER JOIN A_PATIENT ON A_MEDICALHISTORY_NOTDISBURSE.PATIENTID=A_PATIENT.PATIENTID";
        $staff = ociparse($objConnect, $sql) or die("can't connect database");
        oci_execute($staff);
        $i = 0;
        while ($result = oci_fetch_array($staff)) {
                $spz[$i] = $result["TNAME"] . '   ' . $result["LNAME"];
                $spz1[$i] = $result["MEDICALHISTORYID"];
                $i++;
        }
        ?>

<?php  if(isset($_SESSION["def"])) {
?>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        <?php if ($_SESSION['zzz'] == "nurse") { ?>
      <?php  if($i>0){ ?>
       
        <li class="purple"> 
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
         <?php }
         else   {?>
             <li class="purple"> 
                <a data-toggle="dropdown" class="dropdown-toggle" >
                    <i class="ace-icon fa fa-bell "></i>
                    <span class="badge badge-important"></span>
                </a>
            </li>         
        <?php }
         } ?>
<?php } 
else {
     print "<meta http-equiv=refresh content=0;URL=../index.php>";
}?>