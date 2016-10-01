<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>นำยาเข้าระบบ</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/css/font-awesome.css" />
   <link rel="shortcut icon" href="../assets/images/A_A.ico" />
        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="../assets/css/chosen.css" />
        <link rel="stylesheet" href="../assets/css/bootstrap-duallistbox.css" />
        <link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
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

    <body class="no-skin" onLoad="zzza()" >
        <!-- #section:basics/navbar.layout -->
        <?php date_default_timezone_set('Asia/Bangkok'); ?>
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
                                <!--                                PAGE CONTENT BEGINS -->
                                <div class="widget-box ">
                                    <div class="widget-header widget-header-blue widget-header-flat">

                                        <div class="widget-toolbar">
                                            <label>
                                                <small class="green">
                                                    <b>นำยาเข้าสู่ระบบ</b>
                                                </small>

                                            </label>
                                        </div>

                                    </div>
                                    <br>

                                    <div class="form-group">

                                        <div class="col-sm-9"></div>


                                        <div class="input-group">
                                            <input class=" form-control" id="date-picker-1" type="text" value="<?php echo date("d/m/Y"); ?>" readonly />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>  
                                            <div class="input-group">
                                                <input id="timepicker1" type="text" class="form-control" value="<?php echo date("H:i:s") ?>" readonly/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-xs-1 control-label no-padding-right" for="select3">กรุณาเลือกยา:</label>
                                        <div class="col-sm-4">
                                            <!-- #section:plugins/input.chosen -->
                                            <div>
<!--                                                chosen-select-->
                                                <select class=" form-control" id="select3" name="select3"    data-placeholder="กรุณาเลือกยา...">
                                                    <option value="0"></option>

                                                    <?php
                                                    $az = $_GET['az'];
                                                    require("db_connect.php");
                                                    $strSQL = "SELECT MEDICINEID,NAME FROM A_MEDICINE ORDER BY NAME";
                                                    $objParse = oci_parse($objConnect, $strSQL);
                                                    oci_execute($objParse, OCI_DEFAULT);
                                                    while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                        ?>
                                                        <option value="<?=$objResult['MEDICINEID'] ?>"><?=$objResult['NAME'] ?></option>

                                                        <?php
                                                    }

                                                    oci_close($objConnect);
                                                    ?>

                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-sm-1"></div>
                                        <label class="col-xs-1 control-label no-padding-right" for="form-field-5">จำนวน:</label>
                                        <div class="col-sm-1">
                                            <input type="text" id="spinner1"/>
                                        </div>
                                    </div> 
                                    <br><br><br> 
                                    <div class="modal-footer wizard-actions">
                                        <button class="btn btn-sm btn-primary" onclick="saveinputmedicine();">

                                            <i class="ace-icon fa fa-check"></i>
                                            บันทึก
                                        </button>
                                        <div id="dd"></div></div>

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

            function zzza()
            { 
                $("#select3").val("<?php echo $az ?>");

//var element = document.getElementById('select3');
//    element.value = <?php echo $az ?>;

            }

            function reload()
            {
                location.reload();
            }

            function saveinputmedicine()
            {
                var date = document.getElementById("date-picker-1").value;
                var time = document.getElementById("timepicker1").value;
                var medicine = document.getElementById("select3").value;
                var quantity = document.getElementById("spinner1").value;

                var cancle = false;
                if (medicine == 0)
                {
                    alert('กรุณาเลือกยา');
                    document.select3.focus();
                    cancle = true;
                }
                else if (quantity == 0)
                {
                    alert('กรุณากรอกจำนวนยา');
                    document.spinner1.focus();
                    cancle = true;
                }
                if (cancle == false)
                {
                    var x = null;
                    plusmedicine(medicine, quantity, x);
                    $.ajax({
                        url: 'inputmedicine_php.php',
                        type: 'POST',
                        data: {'functionName': 'inserttotable', 'date': date, 'time': time, 'medicine': medicine, 'quantity': quantity},
                        success: function () {

                        }
                    }); // end ajax call
                }
            }

            function plusmedicine(medicine, quantity, x)
            {
                $.ajax({
                    url: 'inputmedicine_php.php',
                    type: 'POST',
                    data: {'functionName': 'selectdata', 'date': '', 'time': '', 'medicine': medicine, 'quantity': ''},
                    success: function (data) {
                        x = parseInt(data) + parseInt(quantity);

                        updatequantity(medicine, x);
                    }
                }); // end ajax call
            }
            function updatequantity(medicine, x)
            {
                $.ajax({
                    url: 'inputmedicine_php.php',
                    type: 'POST',
                    data: {'functionName': 'updatedata', 'date': '', 'time': '', 'medicine': medicine, 'quantity': x},
                    success: function () {
                        document.getElementById("dd").innerHTML = '<font color="green">&nbsp;&nbsp;บันทึกข้อมูลเรียบร้อย</font>';
                        setTimeout(reload, 1000);

                    }
                }); // end ajax call
            }

            if ('ontouchstart' in document.documentElement)
                document.write("<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
            jQuery(function ($) {

                $('#spinner1').ace_spinner({value: 0, min: 0, max: 600, step: 1, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
                        .closest('.ace-spinner')
                        .on('changed.fu.spinbox', function () {
                            //alert($('#spinner1').val())
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

            });
        </script>
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/jquery.bootstrap-duallistbox.js"></script>
        <!-- page specific plugin scripts -->
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
