<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>ข้อมูลนักศึกษา</title>

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
        <link rel="stylesheet" href="../assets/css/jquery-ui.css" />


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

    <body class="no-skin" onLoad="setFocus()">
        <?php
        require("db_connect.php");

        function sqlselect($strSQL, $objConnect) {
            $objParse = oci_parse($objConnect, $strSQL);
            oci_execute($objParse, OCI_DEFAULT);
            return $objParse;
        }

        function sqlinsert($strSQL, $objConnect) {
            $objParse = oci_parse($objConnect, $strSQL);
            oci_execute($objParse, OCI_DEFAULT);
        }
        ?>
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

                <?php require("headnoti.php"); ?>

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




                <?php require("ul.php"); ?>

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
                                <div id="tabs">
                                    <ul>
                                        <li>
                                            <a href="#tabs-1" id='tab-1'>เพิ่มข้อมูล</a>
                                        </li>

                                        <li>
                                            <a href="#tabs-2" id='tab-2'>แก้ไข ลบ</a>
                                        </li>
                                    </ul>

                                    <div id="tabs-1">
                                        <form class="form-horizontal" role="form" name="form1" target="iframe_target">
                                            <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

                                            <!--                                                                                 #section:elements.form -->

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1">รหัสนักศึกษา:</label>
                                                <div class="col-sm-2">
                                                    <span class="block input-icon input-icon-right">
                                                        <input class="form-control"  type="text" name="codestudent" id="codestudent" placeholder="รหัสนักศึกษา 8 หลัก"  />   
                                                        <i class="ace-icon fa fa-info-circle"></i>
                                                    </span>
                                                </div><div id="massagecodestudent"></div>

                                                <div class="col-sm-2"></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label no-padding-right">เพศ :</label>
                                                <div class="radio" id="gender">
                                                    <label>
                                                        <input name="gender" value="M" id="ganderman" type="radio" class="ace input-small" />
                                                        <span class="lbl"> ชาย</span>
                                                    </label>
                                                    <label>
                                                        <input  name="gender" value="F" id="genderwoman" type="radio" class="ace input-small" />
                                                        <span class="lbl"> หญิง</span>
                                                    </label>
                                                </div><span id="massageradio"></span>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1-1">ชื่อ :</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="namestudent" id="namestudent" placeholder="ชื่อ"  />
                                                </div>
                                                <label class="col-xs-1 control-label no-padding-right" for="form-field-1-2">นามสกุล :</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="lastnamestudent" id="lastnamestudent" placeholder="นามสกุล"/>
                                                </div>
                                                <label class="col-xs-1 control-label no-padding-right" for="form-field-select-1-3">คณะ :</label>
                                                <div class="col-sm-3">
                                                    <!--                                                                                         #section:plugins/input.chosen -->
                                                    <div>
                                                        <select class="form-control" name="facultystudent" id="facultystudent" data-placeholder="กรุณาเลือกคณะ">
                                                            <option value="0"></option>
                                                            <?php
                                                            $strSQL = "SELECT * FROM A_FACULTY ORDER BY FACID ";
                                                            $objParse = sqlselect($strSQL, $objConnect);
                                                            while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                                ?>
                                                                <option value="<?= $objResult['FACID'] ?>"><?= $objResult['TNAME'] ?></option>
                                                                <?php
                                                            }

//                                                                oci_free_statement($objParse);
//                                                                oci_close($objConnect);
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-8"></div>
                                                <div class="col-xs-3">
                                                    <div class="pull-right"> 

                                                        <button  id="save" onclick="check_data(form1.codestudent.value, form1.gender.value, form1.namestudent.value, form1.lastnamestudent.value, form1.facultystudent.value, codestu)" class="btn btn-sm btn-success">
                                                            บันทึก
                                                            <i class="ace-icon fa fa-floppy-o icon-on-right bigger-110"></i>
                                                        </button>  <div id="messagesbutton"></div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="tabs-2">
                                        <form class="form-horizontal" role="form" name="form2">
                                            <!--                                                                                 #section:elements.form -->
                                            <br>
                                            <div class="form-group">

                                                <label class="col-sm-1 control-label no-padding-right" for="form-field-2-1">รหัสนักศึกษา:</label>
                                                <div class="col-sm-2">
                                                    <span class="block input-icon input-icon-right">
                                                        <input class="form-control"  name="codestudent2" type="text" id="codestudent2" placeholder="รหัสนักศึกษา 8 หลัก"   />   
                                                        <i class="ace-icon fa fa-info-circle"></i>
                                                    </span>

                                                </div><div id="modifycode"></div>
                                                <div class="col-sm-2"></div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-sm-1 control-label no-padding-right">เพศ :</label>
                                                <div class="radio">
                                                    <label>
                                                        <input name="gender2" id="ganderman2" value="M"  type="radio" class="ace input-small" disabled/>
                                                        <span class="lbl"> ชาย</span>
                                                    </label>
                                                    <label>
                                                        <input name="gender2" id="genderwoman2" value="F" type="radio" class="ace input-small" disabled/>
                                                        <span class="lbl"> หญิง</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label no-padding-right" for="form-field2-2">ชื่อ :</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="namestudent2" id="namestudent2" placeholder="ชื่อ"  disabled />
                                                </div>
                                                <label class="col-xs-1 control-label no-padding-right" for="form-field-2-3">นามสกุล :</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="lastnamestudent2" id="lastnamestudent2" placeholder="นามสกุล"disabled />
                                                </div>
                                                <label class="col-xs-1 control-label no-padding-right" for="form-field-select-2-4">คณะ :</label>
                                                <div class="col-sm-3">
                                                    <!--                                                                                         #section:plugins/input.chosen -->
                                                    <div>
                                                        <select  class="form-control" name="facultystudent2" id="facultystudent2" data-placeholder="กรุณาเลือกคณะ"  disabled='disabled' >
                                                            <option value="0"></option>
                                                            <?php
                                                            $strSQLL = "SELECT * FROM A_FACULTY ORDER BY FACID ";
                                                            $objParsee = sqlselect($strSQLL, $objConnect);
                                                            while ($objResult = oci_fetch_array($objParsee, OCI_BOTH)) {
                                                                ?>
                                                                <option value="<?= $objResult['FACID'] ?>"><?= $objResult['TNAME'] ?></option>
                                                                <?php
                                                            }

//                                                                oci_free_statement($objParsee);
//                                                                oci_close($objConnect);
//                                                                
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-9"></div>
                                                <div class="col-sm-2">
                                                    <div class="pull-right">
                                                        <button type="button" id="save2" onclick="update_data(form2.codestudent2.value, form2.gender2.value, form2.namestudent2.value, form2.lastnamestudent2.value, form2.facultystudent2.value)" class="btn btn-sm btn-success">
                                                            บันทึก
                                                            <i class="ace-icon fa fa-floppy-o icon-on-right bigger-110"></i>
                                                        </button>

                                                        <button type="button" id="modify"  class="btn btn-sm btn-warning" disabled>
                                                            แก้ไข
                                                            <i class="ace-icon fa fa-pencil icon-on-right bigger-110"></i>
                                                        </button>
                                                        <!--                                                        onclick="update_data(form2.codestudent2.value)" -->
                                                        <button type="button" id="delete" class="btn btn-sm btn-danger" disabled>
                                                            ลบ
                                                            <i class="ace-icon fa fa-trash-o icon-on-right bigger-110"></i>
                                                        </button><div id="modifyshow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="dialog-confirm" class="hide">
                                                <p class="bigger-110 bolder center grey">
                                                    <br><i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                                                    คุณแน่ใจที่จะลบข้อมูลนักศึกษารหัส:<div id='deleteconfirmcode' class="bigger-110 bolder center grey"></div>

                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
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
        <script type="text/javascript">
            window.jQuery || document.write("<script src='../assets/js/jquery.js'>" + "<" + "/script>");
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

        <script  src="../assets/js/info_stu_js.js"></script>  
        <script src="../assets/js/jquery-ui.js"></script>
        <script src="../assets/js/chosen.jquery.js"></script>
        <script src="../assets/js/jquery-ui.custom.js"></script>
        <script src="../assets/js/jquery.ui.touch-punch.js"></script>
        <script src="../assets/js/chosen.jquery.js"></script>
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

            var codestu = null;
            jQuery(function ($) {


                $("#codestudent").keyup(function () {
                    var codeid = $("#codestudent").val().trim();
//                    alert(codeid);
                    if (codeid.length < 8)
                        display('<font color="red">*ควรระบุอย่างน้อย 8 ตัวอักษร!</font>');

                    else if (codeid.length > 8)
                        display('<font color="red">*ควรระบุ 8 ตัวอักษรเท่านั้น!</font>');
                    else
                    {
                        $.ajax({
                            url: 'info_stu_checkcode.php',
                            type: 'post',
                            data: {'functionName': 'returnnoyes', 'codestudent': codeid},
                            success: function (data) {

                                codestu = data.trim();
                                if (codestu == 'no')
                                {
                                    display('<i class="fa fa-times bigger-150 red"></i>');
                                }
                                if (codestu == 'yes')
                                {
                                    display('<i class="fa fa-check  bigger-150 green"></i>');
                                }
                            },
                            error: function (xhr, desc, err) {
                                console.log(xhr);
                                console.log("Details: " + desc + "\nError:" + err);
                            }
                        }); // end ajax call
                    }

                });

                $("#codestudent").change(function () {
                    var codeid = $("#codestudent").val().trim();
//                    alert(codeid);
                    if (codeid.length < 8)
                        display('<font color="red">*ควรระบุอย่างน้อย 8 ตัวอักษร!</font>');

                    else if (codeid.length > 8)
                        display('<font color="red">*ควรระบุ 8 ตัวอักษรเท่านั้น!</font>');
                    else
                    {
                        $.ajax({
                            url: 'info_stu_checkcode.php',
                            type: 'post',
                            data: {'functionName': 'returnnoyes', 'codestudent': codeid},
                            success: function (data) {

                                codestu = data.trim();

                                if (codestu == 'no')
                                {
                                    display('<i class="fa fa-times bigger-150 red"></i>');
                                }
                                if (codestu == 'yes')
                                {
                                    display('<i class="fa fa-check  bigger-150 green"></i>');
                                }
                            },
                            error: function (xhr, desc, err) {
                                console.log(xhr);
                                console.log("Details: " + desc + "\nError:" + err);
                            }
                        }); // end ajax call
                    }

                });

                var codeid = null;
                $("#codestudent2").keyup(function () {
                    codeid = $("#codestudent2").val().trim();
                    $("#modify").attr("disabled", "disabled");
                    $("#delete").attr("disabled", "disabled");
                    if (codeid.length < 8)
                        display2('<font color="red">*ควรระบุอย่างน้อย 8 ตัวอักษร!</font>');

                    else if (codeid.length > 8)
                        display2('<font color="red">*ควรระบุ 8 ตัวอักษรเท่านั้น!</font>');
                    else
                    {


                        $.ajax({
                            url: 'info_stu_checkcode.php',
                            type: 'post',
                            data: {'functionName': 'returnnoyes', 'codestudent': codeid},
                            success: function (data) {

                                var codestu = data.trim();
                                if (codestu == 'no')
                                {
                                    $("#modify").removeAttr('disabled');
                                    $("#delete").removeAttr('disabled');
                                    display2('');
                                    $.ajax({
                                        url: 'info_stu_checkcode.php',
                                        type: 'post',
                                        data: {'functionName': 'returnobjResult', 'codestudent': codeid},
                                        datatype: 'json',
                                        success: function (datt) {

                                            display4(datt.PATIENTID);
                                            $("#namestudent2").val(datt.TNAME);
                                            if (datt.SEX == 'M')
                                                $("[name=gender2]").val(["M"]);
                                            else
                                                $("[name=gender2]").val(["F"]);
                                            $("#lastnamestudent2").val(datt.LNAME);
                                            $("#facultystudent2").val(datt.FACID);
                                        },
                                        error: function (xhr, desc, err) {
                                            console.log(xhr);
                                            console.log("Details: " + desc + "\nError:" + err);
                                        }
                                    }); // end ajax call
                                }
                                if (codestu == 'yes')
                                {
                                    display2('<i class="fa fa-times bigger-150 red"></i>')
                                    $("#namestudent2").val('');
                                    $("[name=gender2]").val(['']);
                                    $("[name=gender2]").val(['']);
                                    $("#lastnamestudent2").val('');
                                    $("#facultystudent2").val('');
                                    $("#modify").attr("disabled", "disabled");
                                    $("#delete").attr("disabled", "disabled");
                                }
                            },
                            error: function (xhr, desc, err) {
                                console.log(xhr);
                                console.log("Details: " + desc + "\nError:" + err);
                            }
                        }); // end ajax call
                    }

                });



                $("#tabs").tabs();

                $("#delete").on('click', function (e) {
                    e.preventDefault();
                    $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
                        _title: function (title) {
                            var $title = this.options.title || '&nbsp;'
                            if (("title_html" in this.options) && this.options.title_html == true)
                                title.html($title);
                            else
                                title.text($title);
                        }
                    }));

                    $("#dialog-confirm").removeClass('hide').dialog({
                        resizable: false,
                        width: '320',
                        modal: true,
                        title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i>กรุณายืนยัน</h4></div>",
                        title_html: true,
                        buttons: [
                            {
                                html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; ลบข้อมูล",
                                "class": "btn btn-danger btn-minier",
                                click: function () {
                                    $.ajax({
                                        url: 'info_stu_delete.php',
                                        type: 'post',
                                        data: {'codestudent': codeid},
                                        success: function () {
                                            display3('<font color="green">ลบข้อมูลเรียบร้อย</font>');
                                            document.getElementById('codestudent2').value = "";
                                            document.getElementById('namestudent2').value = "";
                                            document.getElementById('lastnamestudent2').value = "";
                                            document.getElementById("ganderman2").checked = false;
                                            document.getElementById("genderwoman2").checked = false;
                                            document.getElementById('facultystudent2').value = "";
                                            document.getElementById("codestudent2").disabled = false;
                                            document.getElementById("namestudent2").disabled = true;
                                            document.getElementById("lastnamestudent2").disabled = true;
                                            document.getElementById("ganderman2").disabled = true;
                                            document.getElementById("genderwoman2").disabled = true;
                                            document.getElementById("facultystudent2").disabled = true;
                                            $('#save2').hide();
                                            $('#modify').show();
                                            document.getElementById("delete").disabled = true;
                                            document.getElementById("modify").disabled = true;
                                            display4('');
                                            setTimeout(reload, 1500);

                                        },
                                        error: function (xhr, desc, err) {
                                            console.log(xhr);
                                            console.log("Details: " + desc + "\nError:" + err);
                                        }
                                    }); // end ajax call
                                    $(this).dialog("close");
                                }

                            }
                            ,
                            {
                                html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; ยกเลิก",
                                "class": "btn btn-minier",
                                click: function () {
                                    $(this).dialog("close");
                                }
                            }
                        ]
                    });
                });


                $('#modify').on('click', function () {

                    $("#namestudent2").removeAttr('disabled');
                    $("#lastnamestudent2").removeAttr('disabled');
                    $("#facultystudent2").removeAttr('disabled');
                    $("#ganderman2").removeAttr('disabled');
                    $("#genderwoman2").removeAttr('disabled');
                    $("#codestudent2").attr("disabled", "disabled");
                });

                $('#save2').hide();

                $('#modify').on('click', function (e) {
                    $(this).hide();
                    $('#save2').show();
                });


                $("#tab-1").click(function () {
                    $("#codestudent").focus();
                });
                $("#tab-2").click(function () {
                    $("#codestudent2").focus();
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
                                {name: 'indent', className: 'btn-purple'},
                                null,
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
                                'justifycenter',
                                'justifyright'
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

                    $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                        if (event_name != 'sidebar_collapsed')
                            return;
                        $('.chosen-select2').each(function () {
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
                    droppable: true,
                    thumbnail: 'small'//large | fit
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

                $('#spinner1').ace_spinner({value: 0, min: 0, max: 200, step: 1, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
                        .closest('.ace-spinner')
                        .on('changed.fu.spinbox', function () {
                            //alert($('#spinner1').val())
                        });
                $('#spinner2').ace_spinner({value: 0, min: 0, max: 10000, step: 100, touch_spinner: true, icon_up: 'ace-icon fa fa-caret-up bigger-110', icon_down: 'ace-icon fa fa-caret-down bigger-110'});
                $('#spinner3').ace_spinner({value: 0, min: -100, max: 100, step: 10, on_sides: true, icon_up: 'ace-icon fa fa-plus bigger-110', icon_down: 'ace-icon fa fa-minus bigger-110', btn_up_class: 'btn-success', btn_down_class: 'btn-danger'});
                $('#spinner4').ace_spinner({value: 0, min: -100, max: 100, step: 10, on_sides: true, icon_up: 'ace-icon fa fa-plus', icon_down: 'ace-icon fa fa-minus', btn_up_class: 'btn-purple', btn_down_class: 'btn-purple'});

                //$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
                //or
                //$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
                //$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


                //datepicker plugin
                //link
                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                        //show datepicker when clicking on the icon
                        .next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });

                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose: true});


                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass': 'btn-sm btn-success',
                    'cancelClass': 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                        .prev().on(ace.click_event, function () {
                    $(this).next().focus();
                });


                $('#timepicker1').timepicker({
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false
                }).next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });

                $('#date-timepicker1').datetimepicker().next().on(ace.click_event, function () {
                    $(this).prev().focus();
                });


                $('#colorpicker1').colorpicker();

                $('#simple-colorpicker-1').ace_colorpicker();
                //$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
                //$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
                //var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
                //picker.pick('red', true);//insert the color if it doesn't exist


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
