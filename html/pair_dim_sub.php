
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>จัดชุดยาของโรค</title>

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

    <body class="no-skin" >
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
                        <?php
                        $codedisease = trim($_POST["form-field-select-3"]);
                        ?>

                        <!-- /section:settings.box -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-header">
                                    <h1>
                                        จัดชุดยาของโรค
                                        <small>
                                            <i class="ace-icon fa fa-angle-double-right"></i>
                                            <?php
                                            require("db_connect.php");
                                            $strSQL = "SELECT NAME FROM A_DISEASE WHERE DISEASEID=$codedisease";
                                            $objParse = oci_parse($objConnect, $strSQL);
                                            oci_execute($objParse, OCI_DEFAULT);
                                              while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                             echo $objResult['NAME'];
                                            }
                                            oci_close($objConnect);
                                            ?>
                                        </small>
                                    </h1>
                                </div><!-- /.page-header -->
                                <!--                                PAGE CONTENT BEGINS -->

                                <h4 class="pink pull-right">
                                    <i class="ace-icon fa fa-plus-circle white"></i>
                                    <a href="#modal-form" role="button" class="white" data-toggle="modal"> เพิ่มข้อมูลยา  </a>&nbsp;
                                </h4>

                                <div class="table-header">
                                    &nbsp;
                                </div>

                                <!-- div.table-responsive -->

                                <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center col-sm-2">รหัสยา</th>
                                                <th class="center col-sm-4">ชื่อยา</th>
                                                <th class="center col-sm-2">จำนวน</th>
                                                <th class="center col-sm-2">หน่วย</th>


                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            require("db_connect.php");
                                            $strSQL = "SELECT A_D_M_ASSOCIATION.MEDICINEID, A_MEDICINE.NAME ,A_D_M_ASSOCIATION.QUANTITYMEDICINE,A_MEDICINE.UNIT FROM A_D_M_ASSOCIATION INNER JOIN A_MEDICINE ON A_D_M_ASSOCIATION.MEDICINEID=A_MEDICINE.MEDICINEID WHERE A_D_M_ASSOCIATION.DISEASEID='$codedisease' ORDER BY A_D_M_ASSOCIATION.MEDICINEID";
                                            $objParse = oci_parse($objConnect, $strSQL);
                                            oci_execute($objParse, OCI_DEFAULT);
                                            while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                                ?>
                                                <tr>
                                                    <td class="center"><?php echo $objResult['MEDICINEID'] ?></td>
                                                    <td><?php echo $objResult['NAME'] ?></td>
                                                    <td class="center"><?php echo $objResult['QUANTITYMEDICINE'] ?></td>
                                                    <td class="center"><?php echo $objResult['UNIT'] ?></td>


                                                    <td>

                                                        <div class="hidden-sm hidden-xs action-buttons center">
                                                            <a class="green"  href="#modalmodifymedicine" role="button" data-toggle="modal" onclick="modifymedicine(<?php echo $codedisease ?>,<?php echo $objResult['MEDICINEID'] ?>,<?php echo $objResult['QUANTITYMEDICINE'] ?>);">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red" href="#modaldeletemedicine" role="button" data-toggle="modal"  onclick="deletemedicine(<?php echo $codedisease ?>,<?php echo $objResult['MEDICINEID'] ?>);">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                                <div id="modal-form" class="modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="blue bigger">เพิ่มข้อมูลยา</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="">
                                                        <form class="form-horizontal" role="form" name="form2">
                                                            <!--                                                            <div class="form-group">
                                                            
                                                                                                                            <label class="col-sm-2 control-label no-padding-right" for="codemedicine">รหัสยา :  </label>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input class="form-control" type="text" id="codemedicine" name="codemedicine"  placeholder="กรุณาระบุรหัสยา"  />  
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="space-4"></div>-->
                                                            <div class="form-group">
                                                                <div class="col-sm-2">
                                                                    <label control-label no-padding-right for="select3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลือกยา:</label>
                                                                </div>
                                                                <div class="col-sm-8"><select class="form-control" id="select3" name="select3" data-placeholder="กรุณาเลือกยา...">
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

                                                                    </select></div>


                                                            </div>

                                                            <div class="form-group">

                                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-5">จำนวนยา :</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" id="spinner1" name='spinner1'/>
                                                                </div>  <div id='shownamemedicine'></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button class="btn btn-sm" data-dismiss="modal">
                                                        <i class="ace-icon fa fa-times"></i>
                                                        ยกเลิก
                                                    </button>

                                                    <button class="btn btn-sm btn-primary" onclick="insertmedicine(<?php echo $codedisease ?>, form2.select3.value, form2.spinner1.value, chack)">

                                                        <i class="ace-icon fa fa-check"></i>
                                                        บันทึก
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="modalmodifymedicine" class="modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="blue bigger">แก้ไขข้อมูลยา</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="">
                                                        <form class="form-horizontal" role="form" name="form1">
                                                            <div class="form-group">

                                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-5">จำนวนยา :</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" id="spinner2" name='spinner2'/>
                                                                </div><div id="showmodify"></div>  
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="showbutton"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="modaldeletemedicine" class="modal" tabindex="-1">
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
            var chack = null;
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
            jQuery(function ($) {
                $("#select3").change(function () {
                    var MEDICINEID = $("#select3").val();

                    $.ajax({
                        url: 'pair_dm_php.php',
                        type: 'post',
                        data: {'functionName': 'checkmedicine', 'codedisease':<?php echo $codedisease ?>, 'medicineid': MEDICINEID, 'QUANTITYMEDICINE': ''},
                        success: function (data) {

                            chack = data.trim();

                        },
                        error: function (xhr, desc, err) {
                            console.log(xhr);
                            console.log("Details: " + desc + "\nError:" + err);
                        }
                    }); // end ajax call
                });

                $('#spinner1').ace_spinner({value: 0, min: 0, max: 1000, step: 1, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
                        .closest('.ace-spinner')
                        .on('changed.fu.spinbox', function () {
                            //alert($('#spinner1').val())
                        });
                $('#spinner2').ace_spinner({value: 0, min: 0, max: 1000, step: 1, btn_up_class: 'btn-info', btn_down_class: 'btn-info'})
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
                var oTable1 =
                        $('#dynamic-table')
                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                        .dataTable({
                            bAutoWidth: false,
                            "aoColumns": [
                                {"bSortable": true},
                                null, null, null,
                                {"bSortable": false}
                            ],
                            "aaSorting": [],
                            //,
                            //"sScrollY": "200px",
                            //"bPaginate": false,

                            //"sScrollX": "100%",
                            //"sScrollXInner": "120%",
                            //"bScrollCollapse": true,
                            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                            //"iDisplayLength": 50
                        });
            });
        </script>
        <script src="../assets/js/pair_dm_js.js"></script>
        <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="../assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
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

