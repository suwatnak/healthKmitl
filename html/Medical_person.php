<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>สั่งจ่ายยาบุคลากร</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/css/font-awesome.css" />
   <link rel="shortcut icon" href="../assets/images/A_A.ico" />
        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
        <link rel="stylesheet" href="../assets/css/chosen.css" />
        <link rel="stylesheet" href="../assets/css/datepicker.css" />
        <link rel="stylesheet" href="../assets/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="../assets/css/daterangepicker.css" />
        <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.css" />
        <link rel="stylesheet" href="../assets/css/colorpicker.css" />


        <!-- text fonts -->
        <link rel="stylesheet" href="../assets/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
        <![endif]-->

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="../assets/css/ace-ie.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="../assets/js/ace-extra.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="../assets/js/html5shiv.js"></script>
        <script src="../assets/js/respond.js"></script>
        <![endif]-->
    </head>
    <?php date_default_timezone_set('Asia/Bangkok'); ?>
    <body class="no-skin">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class=""></i>
                            Medical Supplies Management System for KMITL's Infirmary Unit
                        </small>
                    </a>

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->

                    <!-- /section:basics/navbar.toggle -->
                </div>

                <!-- #section:basics/navbar.dropdown -->
                 <?php require("headnoti.php");?>

                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>

        <!-- /section:basics/navbar.layout -->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <!-- #section:basics/sidebar -->
            <div id="sidebar" class="sidebar                  responsive">
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'fixed')
                    } catch (e) {
                    }
                </script>

                 <?php require("ul.php");?>

                <!-- #section:basics/sidebar.layout.minimize -->
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <!-- /section:basics/sidebar.layout.minimize -->
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'collapsed')
                    } catch (e) {
                    }
                </script>
            </div>

            <!-- /section:basics/sidebar -->
            <div class="main-content">
                <div class="main-content-inner">
                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>




                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">
                        <!-- #section:settings.box -->


                        <!-- /section:settings.box -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->

                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home">
                                                <i class="green ace-icon fa fa-stethoscope bigger-120"></i>
                                                จ่ายยา
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#messages">
                                                <i class="green ace-icon fa fa-history bigger-120"></i>
                                                ประวัติการรักษา
                                                <span id ='showconunthistory' class="badge badge-danger"></span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <p></p>
                                            <form class="form-horizontal" role="form">
                                                <!-- #section:elements.form -->

                                                <div class="form-group">
                                                    <div class="col-sm-5"></div>
                                                    <label class="col-sm-4 control-label " for="date-timepicker1">วัน/เวลา:</label>
                                                    <div class="input-group">
                                                        <input class=" form-control date-picker" id="date"  type="text" value="<?php echo date("d/m/Y"); ?>" disabled="disabled" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>  
                                                        <div class="input-group ">
                                                            <input id="time" type="text" class="form-control" value="<?php echo date("H:i:s") ?>" disabled="disabled"/>
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-clock-o bigger-110"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label class="col-sm-1 control-label no-padding-right" for="form-field-2-1">ชื่อ :</label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control"  name="nameperson" type="text" id="nameperson" placeholder="กรุณากรอกชื่อ"   />   
                                                        </div>
                                                        <label class="col-sm-1 control-label no-padding-right" for="form-field-2-1">นามสกุล :</label>
                                                        <div class="col-sm-2">

                                                            <span class="input-group-btn">
                                                                <input class="form-control"  name="lastnameperson" type="text" id="lastnameperson" placeholder="กรุณากรอกนามสกุล"   />   
                                                                <button class="btn btn-sm btn-default" type="button" id="buttonnamelastname" onclick="chacknamelastnameperson()">
                                                                    <i class="ace-icon fa fa-search bigger-110"></i>
                                                                    ค้นหา
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <div class='col-sm-1'></div> <div id='showresultnamelastnameperson'></div> 
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="col-sm-1 control-label no-padding-right">เพศ :</label>
                                                    <div class="radio" >
                                                        <label>
                                                            <input name="genderperson" type="radio" value="M" class="ace input-small" disabled="disabled"/>
                                                            <span class="lbl"> ชาย</span>
                                                        </label>
                                                        <label>
                                                            <input name="genderperson" type="radio"value="F"  class="ace input-small" disabled="disabled" />
                                                            <span class="lbl"> หญิง</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-1 control-label no-padding-right" for="facultperson">หน่วยงาน :</label>
                                                    <div class="col-sm-3">
                                                        <!-- #section:plugins/input.chosen -->
                                                        <div>
                                                            <select class="form-control" name="facultperson" id="facultperson"  disabled="disabled">
                                                                <option value="0"></option>
                                                                <?php
                                                                require("db_connect.php");
                                                                $strSQL = "SELECT FACID,TNAME FROM A_FACULTY ORDER BY FACID";
                                                                $objParse = oci_parse($objConnect, $strSQL);
                                                                oci_execute($objParse, OCI_DEFAULT);
                                                                while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                                    ?>
                                                                    <option value="<?= $objResult['FACID'] ?>"><?= $objResult['TNAME'] ?></option>

                                                                    <?php
                                                                }

                                                                oci_close($objConnect);
                                                                ?>


                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-xs-1 control-label no-padding-right" for="disease">โรค :</label>
                                                    <div class="col-sm-3">
                                                        <!-- #section:plugins/input.chosen -->
                                                        <div>
                                                            <select class="chosen-select form-control"  id="disease" data-placeholder="กรุณาเลือกโรค">
                                                                <option value="0">  </option>
                                                                <?php
                                                                require("db_connect.php");
                                                                $strSQL = "SELECT DISEASEID,NAME FROM A_DISEASE ORDER BY NAME";
                                                                $objParse = oci_parse($objConnect, $strSQL);
                                                                oci_execute($objParse, OCI_DEFAULT);
                                                                while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                                    ?>
                                                                    <option value="<?= $objResult['DISEASEID'] ?>"><?= $objResult['NAME'] ?></option>

                                                                    <?php
                                                                }

                                                                oci_close($objConnect);
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div> 

                                                <div class="form-group">
                                                    <label class="col-xs-1 control-label no-padding-right" for="medicine">ชื่อยา :</label>
                                                    <div class="col-sm-3">
                                                        <!-- #section:plugins/input.chosen -->
                                                        <div>
                                                            <select class="chosen-select form-control"  id="medicine" data-placeholder="กรุณาเลือกชื่อยา">
                                                                <option value="0"></option>
                                                                <?php
                                                                require("db_connect.php");
                                                                $strSQL = "SELECT MEDICINEID,NAME FROM A_MEDICINE ORDER BY NAME";
                                                                $objParse = oci_parse($objConnect, $strSQL);
                                                                oci_execute($objParse, OCI_DEFAULT);
                                                                while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                                    ?>
                                                                    <option value="<?= $objResult['MEDICINEID'] ?>"><?= $objResult['NAME'] ?></option>

                                                                    <?php
                                                                }

                                                                oci_close($objConnect);
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <label class="col-xs-1 control-label no-padding-right" for="form-field-5">จำนวน :</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" id="spinner1"/>
                                                    </div>
                                                    <label class="col-xs-1 control-label no-padding-right" for="unit">หน่วย :</label>
                                                    <div class="col-sm-2">
                                                        <input class="col-sm-7" type="text" id="unit" placeholder="หน่วย" disabled="disabled" /> 
                                                        <button type="button"  class="btn btn-sm btn-danger" id="addmedicine" onclick="selectQUANTITY()" disabled="disabled">เพิ่ม</button>
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <div class="col-xs-1"></div><div class="col-xs-10">

                                                        <table id="simple-table" class="table table-striped table-bordered table-hover">

                                                        </table>   
                                                    </div>
                                                </div>

                                                <div class="form-group"><div class="col-sm-1"></div>
                                                    <div class="col-sm-10">
                                                        <textarea id="note" class="autosize-transition form-control" placeholder="กรอกอาการของผู้ป่วย"></textarea>
                                                    </div>
                                                </div>

                                                <div class="clearfix form-actions">

                                                    <div class="col-md-offset-9 col-md-9"> <div id="showresultsubmit"></div>
                                                        <button class="btn btn-info" id="submit" onclick="chackquantitybeforesubmit()" type="button">
                                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                                            สั่งจ่าย
                                                        </button>

                                                        &nbsp; &nbsp; &nbsp;
                                                        <button class="btn" id="reset" type="button">
                                                            <i class="ace-icon fa fa-undo bigger-110"></i>
                                                            รีเซ็ต
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!--แท็บใหม่-->
                                         <div id="messages" class="tab-pane fade">
                                            <p></p>
                                            <form class="form-horizontal">
                                                <!-- #section:elements.form -->
                                                <div id="areashowhistory">
                                                </div>
                                                
                                            </form>
                                        </div>

                                        <div id="modifymedicine" class="modal" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="blue bigger">แก้ไขข้อมูลยา</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="">
                                                                <form class="form-horizontal" role="form" name="formmodifymedicine">



                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label no-padding-right" for="spinner1modify
                                                                               ">จำนวนยา :</label>
                                                                        <div id="divspinner1modify" class="col-sm-3">
                                                                            <input type="text" id="spinner1modify" name='spinner1modify'/>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div id="showbuttonmodify"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="deletemedicine" class="modal"  tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"  data-dismiss="modal">&times;</button>
                                                        <h4 class="blue bigger">คุณแน่ใจที่จะลบข้อมูลยานี้</h4>
                                                        <div id="showdelete"></div></div>
                                                    <div id="deletebutton"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="addperson" class="modal" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="blue bigger">ไม่พบข้อมูล => กรุณากรอกข้อมูล</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="">
                                                                <form class="form-horizontal" role="form" name="formaddstudent">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <label class="col-sm-1 control-label no-padding-right" for="form-field-1-1">ชื่อ :</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" name="addnamestudent" id="addnameperson" placeholder="ชื่อ" disabled="disabled" />
                                                                        </div>
                                                                        <label class="col-sm-1 control-label no-padding-right" for="form-field-1-2">นามสกุล:</label>
                                                                        <div class="col-sm-2">
                                                                            <input type="text" name="addlastnamestudent" id="addlastnameperson" placeholder="นามสกุล" disabled="disabled"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-1"></div>
                                                                        <label class="col-sm-1 control-label no-padding-right">เพศ :</label>
                                                                        <div class="radio" id="gender">
                                                                            <label>
                                                                                <input name="addgender" value="M" id="addganderman" type="radio" class="ace input-small" />
                                                                                <span class="lbl"> ชาย</span>
                                                                            </label>
                                                                            <label>
                                                                                <input  name="addgender" value="F" id="addgenderwoman" type="radio" class="ace input-small" />
                                                                                <span class="lbl"> หญิง</span>
                                                                            </label>

                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label class="col-sm-2 control-label no-padding-right" for="addfacultystudent">หน่วยงาน :</label>
                                                                        <div class="col-sm-5">
                                                                            <!-- #section:plugins/input.chosen -->
                                                                            <div>
                                                                                <select class="form-control"  id="addfacultystudent" data-placeholder="กรุณาเลือกหน่วยงาน">
                                                                                    <option value="0">  </option>
                                                                                    <?php
                                                                                    require("db_connect.php");
                                                                                    $strSQL = "SELECT * FROM A_FACULTY";
                                                                                    $objParse = oci_parse($objConnect, $strSQL);
                                                                                    oci_execute($objParse, OCI_DEFAULT);
                                                                                    while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                                                        ?>
                                                                                        <option value="<?= $objResult['FACID'] ?>"><?= $objResult['TNAME'] ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    oci_close($objConnect);
                                                                                    ?>

                                                                                </select>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm" data-dismiss="modal" id="cancle">
                                                                <i class="ace-icon fa fa-times"></i>ยกเลิก</button>
                                                            <button  class="btn btn-sm btn-primary" id="addperson" onclick="addperson()" >
                                                                <i class="ace-icon fa fa-check"></i>บันทึก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col --><button type="button" id="addpersonn"  role="button"  href="#addperson"  data-toggle="modal"></button><input name="codeperson" type="text" id="codeperson"/>   
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <!-- #section:basics/footer -->
                    <div class="footer-content">
                        <span class="bigger-120">

                            King Mongkut's Institute of Technology Ladkrabang &copy; 2013-2014


                            &nbsp; &nbsp;

                    </div>

                    <!-- /section:basics/footer -->
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script type="text/javascript">             window.jQuery || document.write("<script src='../assets/js/jquery.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
    <script type="text/javascript">
    window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
    </script>
    <![endif]-->
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
        </script>
        <script src="../assets/js/bootstrap.js"></script>

        <!-- page specific plugin scripts -->

        <script src="../assets/js/Medical_person_js.js"></script>
        <script src="../assets/js/chosen.jquery.js"></script>
        <script src="../assets/js/jquery-ui.custom.js"></script>
        <script src="../assets/js/jquery.ui.touch-punch.js"></script>
        <script src="../assets/js/fuelux/fuelux.spinner.js"></script>
        <script src="../assets/js/date-time/bootstrap-datepicker.js"></script>
        <script src="../assets/js/date-time/bootstrap-timepicker.js"></script>
        <script src="../assets/js/date-time/moment.js"></script>
        <script src="../assets/js/date-time/daterangepicker.js"></script>
        <script src="../assets/js/date-time/bootstrap-datetimepicker.js"></script>
        <script src="../assets/js/bootstrap-colorpicker.js"></script>
        <script src="../assets/js/jquery.knob.js"></script>
        <script src="../assets/js/jquery.autosize.js"></script>
        <script src="../assets/js/jquery.inputlimiter.1.3.1.js"></script>
        <script src="../assets/js/jquery.maskedinput.js"></script>
        <script src="../assets/js/bootstrap-tag.js"></script>
        <script src="../assets/js/markdown/markdown.js"></script>
        <script src="../assets/js/markdown/bootstrap-markdown.js"></script>
        <script src="../assets/js/jquery.hotkeys.js"></script>
        <script src="../assets/js/bootstrap-wysiwyg.js"></script>
        <script src="../assets/js/bootbox.js"></script>

        <!-- ace scripts -->
        <script src="../assets/js/ace/elements.scroller.js"></script>
        <script src="../assets/js/ace/elements.colorpicker.js"></script>
        <script src="../assets/js/ace/elements.fileinput.js"></script>
        <script src="../assets/js/ace/elements.typeahead.js"></script>
        <script src="../assets/js/ace/elements.wysiwyg.js"></script>
        <script src="../assets/js/ace/elements.spinner.js"></script>
        <script src="../assets/js/ace/elements.treeview.js"></script>
        <script src="../assets/js/ace/elements.wizard.js"></script>
        <script src="../assets/js/ace/elements.aside.js"></script>
        <script src="../assets/js/ace/ace.js"></script>
        <script src="../assets/js/ace/ace.ajax-content.js"></script>
        <script src="../assets/js/ace/ace.touch-drag.js"></script>
        <script src="../assets/js/ace/ace.sidebar.js"></script>
        <script src="../assets/js/ace/ace.sidebar-scroll-1.js"></script>
        <script src="../assets/js/ace/ace.submenu-hover.js"></script>
        <script src="../assets/js/ace/ace.widget-box.js"></script>
        <script src="../assets/js/ace/ace.settings.js"></script>
        <script src="../assets/js/ace/ace.settings-rtl.js"></script>
        <script src="../assets/js/ace/ace.settings-skin.js"></script>
        <script src="../assets/js/ace/ace.widget-on-reload.js"></script>
        <script src="../assets/js/ace/ace.searchbox-autocomplete.js"></script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function ($) {


                $("#disease").change(function () {
                    var diseaseid = $("#disease").val();
                    selectmedicine();
                    if (diseaseid == 0)
                        $('#addmedicine').prop('disabled', true);
                });
                $("#medicine").change(function () {
                    var diseaseid = $("#disease").val();
                    var medicine = $("#medicine").val();
                    selectunit();
                    $("#spinner1").val(0);
                    if (diseaseid == 0 || medicine == 0)
                    {
                        $('#addmedicine').prop('disabled', true);
                    }
                    else
                    {
                        $("#addmedicine").removeAttr('disabled');
                    }
                });

                $("#reset").click(function () {
                    location.reload();
                });
                $(document).ready(function () {

                    $("#nameperson").focus();
                    $("#addpersonn").hide();
                     $("#codeperson").hide();
                     $('#submit').prop('disabled', true);
                });

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    }
                    else {
                        //console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                }

                //$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

                //but we want to change a few buttons colors for the third style
                $('#editor1').ace_wysiwyg({
                    toolbar:
                            [
                                'font',
                                null,
                                'fontSize',
                                null,
                                {name: 'bold', className: 'btn-info'},
                                {name: 'italic', className: 'btn-info'},
                                {name: 'strikethrough', className: 'btn-info'},
                                {name: 'underline', className: 'btn-info'},
                                null,
                                {name: 'insertunorderedlist', className: 'btn-success'},
                                {name: 'insertorderedlist', className: 'btn-success'},
                                {name: 'outdent', className: 'btn-purple'},
                                {name: 'indent', className: 'btn-purple'}, null,
                                {name: 'justifyleft', className: 'btn-primary'},
                                {name: 'justifycenter', className: 'btn-primary'},
                                {name: 'justifyright', className: 'btn-primary'},
                                {name: 'justifyfull', className: 'btn-inverse'},
                                null,
                                {name: 'createLink', className: 'btn-pink'},
                                {name: 'unlink', className: 'btn-pink'},
                                null,
                                {name: 'insertImage', className: 'btn-success'},
                                null,
                                'foreColor',
                                null,
                                {name: 'undo', className: 'btn-grey'},
                                {name: 'redo', className: 'btn-grey'}
                            ],
                    'wysiwyg': {
                        fileUploadError: showErrorAlert
                    }
                }).prev().addClass('wysiwyg-style2');


                /**
                 //make the editor have all the available height
                 $(window).on('resize.editor', function() {
                 var offset = $('#editor1').parent().offset();
                 var winHeight =  $(this).height();
                 
                 $('#editor1').css({'height':winHeight - offset.top - 10, 'max-height': 'none'});
                 }).triggerHandler('resize.editor');
                 */


                $('#editor2').css({'height': '200px'}).ace_wysiwyg({
                    toolbar_place: function (toolbar) {
                        return $(this).closest('.widget-box')
                                .find('.widget-header').prepend(toolbar)
                                .find('.wysiwyg-toolbar').addClass('inline');
                    },
                    toolbar:
                            [
                                'bold',
                                {name: 'italic', title: 'Change Title!', icon: 'ace-icon fa fa-leaf'},
                                'strikethrough',
                                null,
                                'insertunorderedlist',
                                'insertorderedlist',
                                null,
                                'justifyleft',
                                'justifycenter', 'justifyright'
                            ],
                    speech_button: false
                });




                $('[data-toggle="buttons"] .btn').on('click', function (e) {
                    var target = $(this).find('input[type=radio]');
                    var which = parseInt(target.val());
                    var toolbar = $('#editor1').prev().get(0);
                    if (which >= 1 && which <= 4) {
                        toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g, '');
                        if (which == 1)
                            $(toolbar).addClass('wysiwyg-style1');
                        else if (which == 2)
                            $(toolbar).addClass('wysiwyg-style2');
                        if (which == 4) {
                            $(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
                        } else
                            $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
                    }
                });




                //RESIZE IMAGE

                //Add Image Resize Functionality to Chrome and Safari
                //webkit browsers don't have image resize functionality when content is editable
                //so let's add something using jQuery UI resizable
                //another option would be opening a dialog for user to enter dimensions.
                if (typeof jQuery.ui !== 'undefined' && ace.vars['webkit']) {

                    var lastResizableImg = null;
                    function destroyResizable() {
                        if (lastResizableImg == null)
                            return;
                        lastResizableImg.resizable("destroy");
                        lastResizableImg.removeData('resizable');
                        lastResizableImg = null;
                    }

                    var enableImageResize = function () {
                        $('.wysiwyg-editor')
                                .on('mousedown', function (e) {
                                    var target = $(e.target);
                                    if (e.target instanceof HTMLImageElement) {
                                        if (!target.data('resizable')) {
                                            target.resizable({
                                                aspectRatio: e.target.width / e.target.height,
                                            });
                                            target.data('resizable', true);

                                            if (lastResizableImg != null) {
                                                //disable previous resizable image
                                                lastResizableImg.resizable("destroy");
                                                lastResizableImg.removeData('resizable');
                                            }
                                            lastResizableImg = target;
                                        }
                                    }
                                })
                                .on('click', function (e) {
                                    if (lastResizableImg != null && !(e.target instanceof HTMLImageElement)) {
                                        destroyResizable();
                                    }
                                })
                                .on('keydown', function () {
                                    destroyResizable();
                                });
                    }
                    enableImageResize();

                    /**
                     //or we can load the jQuery UI dynamically only if needed
                     if (typeof jQuery.ui !== 'undefined') enableImageResize();
                     else {//load jQuery UI if not loaded
                     //in Ace demo ../assets will be replaced by correct assets path
                     $.getScript("../assets/js/jquery-ui.custom.min.js", function(data, textStatus, jqxhr) {
                     enableImageResize()
                     });
                     }
                     */
                }

                var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $(this).closest('table').find('tbody > tr').each(function () {
                        var row = this;
                        if (th_checked)
                            $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else
                            $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });
                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]', function () {
                    var $row = $(this).closest('tr');
                    if (this.checked)
                        $row.addClass(active_class);
                    else
                        $row.removeClass(active_class);
                });

                $('#id-disable-check').on('click', function () {
                    var inp = $('#form-input-readonly').get(0);
                    if (inp.hasAttribute('disabled')) {
                        inp.setAttribute('readonly', 'true');
                        inp.removeAttribute('disabled');
                        inp.value = "This text field is readonly!";
                    }
                    else {
                        inp.setAttribute('disabled', 'disabled');
                        inp.removeAttribute('readonly');
                        inp.value = "This text field is disabled!";
                    }
                });


                if (!ace.vars['touch']) {
                    $('.chosen-select').chosen({allow_single_deselect: true});
                    //resize the chosen on window resize

                    $(window)
                            .off('resize.chosen')
                            .on('resize.chosen', function () {
                                $('.chosen-select').each(function () {
                                    var $this = $(this);
                                    $this.next().css({'width': $this.parent().width()});
                                })
                            }).trigger('resize.chosen');
                    //resize chosen on sidebar collapse/expand
                    $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                        if (event_name != 'sidebar_collapsed')
                            return;
                        $('.chosen-select').each(function () {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    });


                    $('#chosen-multiple-style .btn').on('click', function (e) {
                        var target = $(this).find('input[type=radio]');
                        var which = parseInt(target.val());
                        if (which == 2)
                            $('#form-field-select-4').addClass('tag-input-style');
                        else
                            $('#form-field-select-4').removeClass('tag-input-style');
                    });
                }


                $('[data-rel=tooltip]').tooltip({container: 'body'});
                $('[data-rel=popover]').popover({container: 'body'});

                $('textarea[class*=autosize]').autosize({append: "\n"});
                $('textarea.limited').inputlimiter({
                    remText: '%n character%s remaining...',
                    limitText: 'max allowed : %n.'
                });

                $.mask.definitions['~'] = '[+-]';
                $('.input-mask-date').mask('99/99/9999');
                $('.input-mask-phone').mask('(999) 999-9999');
                $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
                $(".input-mask-product").mask("a*-999-a999", {placeholder: " ", completed: function () {
                        alert("You typed the following: " + this.val());
                    }});



                $("#input-size-slider").css('width', '200px').slider({
                    value: 1,
                    range: "min",
                    min: 1,
                    max: 8,
                    step: 1,
                    slide: function (event, ui) {
                        var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                        var val = parseInt(ui.value);
                        $('#form-field-4').attr('class', sizing[val]).val('.' + sizing[val]);
                    }
                });

                $("#input-span-slider").slider({
                    value: 1,
                    range: "min",
                    min: 1,
                    max: 12,
                    step: 1,
                    slide: function (event, ui) {
                        var val = parseInt(ui.value);
                        $('#form-field-5').attr('class', 'col-xs-' + val).val('.col-xs-' + val);
                    }
                });



                //"jQuery UI Slider"
                //range slider tooltip example
                $("#slider-range").css('height', '200px').slider({
                    orientation: "vertical",
                    range: true,
                    min: 0,
                    max: 100,
                    values: [17, 67],
                    slide: function (event, ui) {
                        var val = ui.values[$(ui.handle).index() - 1] + "";

                        if (!ui.handle.firstChild) {
                            $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                                    .prependTo(ui.handle);
                        }
                        $(ui.handle.firstChild).show().children().eq(1).text(val);
                    }
                }).find('span.ui-slider-handle').on('blur', function () {
                    $(this.firstChild).hide();
                });


                $("#slider-range-max").slider({
                    range: "max",
                    min: 1,
                    max: 10,
                    value: 2
                });

                $("#slider-eq > span").css({width: '90%', 'float': 'left', margin: '15px'}).each(function () {
                    // read initial values from markup and remove that
                    var value = parseInt($(this).text(), 10);
                    $(this).empty().slider({
                        value: value,
                        range: "min",
                        animate: true

                    });
                });

                $("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


                $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                    no_file: 'No File ...',
                    btn_choose: 'Choose',
                    btn_change: 'Change',
                    droppable: false,
                    onchange: null,
                    thumbnail: false //| true | large
                            //whitelist:'gif|png|jpg|jpeg'
                            //blacklist:'exe|php'
                            //onchange:''
                            //
                });
                //pre-show a file name, for example a previously selected file
                //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


                $('#id-input-file-3').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true, thumbnail: 'small'//large | fit
                            //,icon_remove:null//set null, to hide remove/reset button
                            /**,before_change:function(files, dropped) {
                             //Check an example below
                             //or examples/file-upload.html
                             return true;
                             }*/
                            /**,before_remove : function() {
                             return true;
                             }*/
                    ,
                    preview_error: function (filename, error_code) {
                        //name of the file that failed
                        //error_code values
                        //1 = 'FILE_LOAD_FAILED',
                        //2 = 'IMAGE_LOAD_FAILED',
                        //3 = 'THUMBNAIL_FAILED'
                        //alert(error_code);
                    }

                }).on('change', function () {
                    //console.log($(this).data('ace_input_files'));
                    //console.log($(this).data('ace_input_method'));
                });


                //$('#id-input-file-3')
                //.ace_file_input('show_file_list', [
                //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
                //{type: 'file', name: 'hello.txt'}
                //]);




                //dynamically change allowed formats by changing allowExt && allowMime function
                $('#id-file-format').removeAttr('checked').on('change', function () {
                    var whitelist_ext, whitelist_mime;
                    var btn_choose
                    var no_icon
                    if (this.checked) {
                        btn_choose = "Drop images here or click to choose";
                        no_icon = "ace-icon fa fa-picture-o";

                        whitelist_ext = ["jpeg", "jpg", "png", "gif", "bmp"];
                        whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
                    }
                    else {
                        btn_choose = "Drop files here or click to choose";
                        no_icon = "ace-icon fa fa-cloud-upload";

                        whitelist_ext = null;//all extensions are acceptable
                        whitelist_mime = null;//all mimes are acceptable
                    }
                    var file_input = $('#id-input-file-3');
                    file_input
                            .ace_file_input('update_settings',
                                    {
                                        'btn_choose': btn_choose,
                                        'no_icon': no_icon,
                                        'allowExt': whitelist_ext,
                                        'allowMime': whitelist_mime
                                    })
                    file_input.ace_file_input('reset_input');

                    file_input
                            .off('file.error.ace')
                            .on('file.error.ace', function (e, info) {
                                //console.log(info.file_count);//number of selected files
                                //console.log(info.invalid_count);//number of invalid files
                                //console.log(info.error_list);//a list of errors in the following format

                                //info.error_count['ext']
                                //info.error_count['mime']
                                //info.error_count['size']

                                //info.error_list['ext']  = [list of file names with invalid extension]
                                //info.error_list['mime'] = [list of file names with invalid mimetype]
                                //info.error_list['size'] = [list of file names with invalid size]


                                /**
                                 if( !info.dropped ) {
                                 //perhapse reset file field if files have been selected, and there are invalid files among them
                                 //when files are dropped, only valid files will be added to our file array
                                 e.preventDefault();//it will rest input
                                 }
                                 */


                                //if files have been selected (not dropped), you can choose to reset input
                                //because browser keeps all selected files anyway and this cannot be changed
                                //we can only reset file field to become empty again
                                //on any case you still should check files with your server side script
                                //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                            });

                });

                $('#spinner1').ace_spinner({value: 0, min: 0, max: 600, step: 1, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
                        .closest('.ace-spinner')
                        .on('changed.fu.spinbox', function () {
                            //alert($('#spinner1').val())
                        });
                $('#spinner1modify').ace_spinner({value: 0, min: 0, max: 600, step: 1, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
                        .closest('.ace-spinner')
                        .on('changed.fu.spinbox', function () {
                            //alert($('#spinner1').val())
                        });






                $(".knob").knob();


                var tag_input = $('#form-field-tags');
                try {
                    tag_input.tag(
                            {
                                placeholder: tag_input.attr('placeholder'),
                                //enable typeahead by specifying the source array
                                source: ace.vars['US_STATES'], //defined in ace.js >> ace.enable_search_ahead
                                /**
                                 //or fetch data from database, fetch those that match "query"
                                 source: function(query, process) {
                                 $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
                                 .done(function(result_items){
                                 process(result_items);
                                 });
                                 }
                                 */
                            }
                    )

                    //programmatically add a new
                    var $tag_obj = $('#form-field-tags').data('tag');
                    $tag_obj.add('Programmatically Added');
                }
                catch (e) {
                    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
                    tag_input.after('<textarea id="' + tag_input.attr('id') + '" name="' + tag_input.attr('name') + '" rows="3">' + tag_input.val() + '</textarea>').remove();
                    //$('#form-field-tags').autosize({append: "\n"});
                }


                /////////
                $('#modal-form input[type=file]').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true,
                    thumbnail: 'large'
                })

                //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                //and its width cannot be determined.
                //so we set the width after modal is show
                $('#modal-form').on('shown.bs.modal', function () {
                    if (!ace.vars['touch']) {
                        $(this).find('.chosen-container').each(function () {
                            $(this).find('a:first-child').css('width', '210px');
                            $(this).find('.chosen-drop').css('width', '210px');
                            $(this).find('.chosen-search input').css('width', '200px');
                        });
                    }
                })
                /**
                 //or you can activate the chosen plugin after modal is shown
                 //this way select element becomes visible with dimensions and chosen works as expected
                 $('#modal-form').on('shown', function () {
                 $(this).find('.modal-chosen').chosen();
                 })
                 */



                $(document).one('ajaxloadstart.page', function (e) {
                    $('textarea[class*=autosize]').trigger('autosize.destroy');
                    $('.limiterBox,.autosizejs').remove();
                    $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
                });

            });
        </script>

        <!-- the following scripts are used in demo only for onpage help and you don't need them -->
        <link rel="stylesheet" href="../assets/css/ace.onpage-help.css" />
        <link rel="stylesheet" href="../docs/assets/js/themes/sunburst.css" />

        <script type="text/javascript"> ace.vars['base'] = '..';</script>
        <script src="../assets/js/ace/elements.onpage-help.js"></script>
        <script src="../assets/js/ace/ace.onpage-help.js"></script>
        <script src="../docs/assets/js/rainbow.js"></script>
        <script src="../docs/assets/js/language/generic.js"></script>
        <script src="../docs/assets/js/language/html.js"></script>
        <script src="../docs/assets/js/language/css.js"></script>
        <script src="../docs/assets/js/language/javascript.js"></script>


    </body>
</html>
