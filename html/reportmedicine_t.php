<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>รายงานข้อมูลยา</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/css/font-awesome.css" />

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

    <body class="no-skin" onLoad="setFocus()">
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
                                <!--                                <div class="row">
                                                                    <div class="col-xs-8 col-sm-11">
                                                                        <div class="input-daterange input-group">
                                                                            <input type="text" class="input-sm form-control" name="start" />
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-exchange"></i>
                                                                            </span>
                                                                            <input type="text" class="input-sm form-control" name="end" />
                                                                        </div>
                                
                                                                         /section:plugins/date-time.datepicker 
                                                                    </div>
                                                                </div>-->
                                <h3 class="header smaller lighter blue">รายงานข้อมูลยา</h3>

                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div class="table-header">
                                    Results for "Latest Registered Domains"
                                </div>

                                <!-- div.table-responsive -->

                                <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </th>
                                                <th class="center">รหัสยา</th>
                                                <th class="center">ชื่อยา</th>
                                                <th class="center">ยอดคงเหลือ</th>
                                                <th class="center">หน่วย</th>
<!--                                                <th>ยอดแจ้งเตือน</th>-->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            require("db_connect.php");
                                            $strSQL = "SELECT * FROM A_MEDICINE order by NAME";
                                            $objParse = oci_parse($objConnect, $strSQL);
                                            oci_execute($objParse);
                                            while (oci_fetch($objParse)) {
                                                ?>

                                                <tr>
                                                    <td class="center">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace" />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </td>

                                                    <td class="center"> <?php echo oci_result($objParse, 'MEDICINEID'); ?></td>          
                                                    <td><?php echo oci_result($objParse, 'NAME'); ?></td>
                                                    <td class="center"><?php echo oci_result($objParse, 'QUANTITY'); ?></td>
                                                    <td class="hidden-480 center">
                                                        <span class="label label-sm label-warning"><?php echo oci_result($objParse, 'UNIT'); ?></span>
                                                    </td>
<!--                                                    <td><?php echo oci_result($objParse, 'REORDER_POINT'); ?></td>-->
                                                </tr>

                                                <?PHP
                                            }
                                            oci_close($objConnect);
                                            ?>
                                        </tbody>
                                    </table>
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
        <script type="text/javascript">
            jQuery(function ($) {
                //initiate dataTables plugin
                var oTable1 =
                        $('#dynamic-table')
                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                        .dataTable({
                            bAutoWidth: false,
                            "aoColumns": [
                                {"bSortable": false},
                                null, null, null,
                                {"bSortable": true}
                            ],
                            "aaSorting": [],
                        });

                var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
                    "sSwfPath": "../assets/js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path

                    "sRowSelector": "td:not(:last-child)",
                    "sRowSelect": "multi",
                    "fnRowSelected": function (row) {
                        //check checkbox when row is selected
                        try {
                            $(row).find('input[type=checkbox]').get(0).checked = true
                        }
                        catch (e) {
                        }
                    },
                    "fnRowDeselected": function (row) {
                        //uncheck checkbox
                        try {
                            $(row).find('input[type=checkbox]').get(0).checked = false
                        }
                        catch (e) {
                        }
                    },
                    "sSelectedClass": "success",
                    "aButtons": [
                        {
                            "sExtends": "copy",
                            "sToolTip": "Copy to clipboard",
                            "sButtonClass": "btn btn-white btn-primary btn-bold",
                            "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                            "fnComplete": function () {
                                this.fnInfo('<h3 class="no-margin-top smaller">Table copied</h3>\
                                                                 <p>Copied ' + (oTable1.fnSettings().fnRecordsTotal()) + ' row(s) to the clipboard.</p>',
                                        1500
                                        );
                            }
                        },
                        {
                            "sExtends": "csv",
                            "sToolTip": "Export to CSV",
                            "sButtonClass": "btn btn-white btn-primary  btn-bold",
                            "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
                        },
                    ]
                });
                //we put a container before our table and append TableTools element to it
                $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

                //also add tooltips to table tools buttons
                //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
                //so we add tooltips to the "DIV" child after it becomes inserted
                //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
                setTimeout(function () {
                    $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function () {
                        var div = $(this).find('> div');
                        if (div.length > 0)
                            div.tooltip({container: 'body'});
                        else
                            $(this).tooltip({container: 'body'});
                    });
                }, 200);



                //ColVis extension
                var colvis = new $.fn.dataTable.ColVis(oTable1, {
                    "buttonText": "<i class='fa fa-search'></i>",
                    "aiExclude": [0, 6],
                    "bShowAll": true,
                    //"bRestore": true,
                    "sAlign": "right",
                    "fnLabel": function (i, title, th) {
                        return $(th).text();//remove icons, etc
                    }

                });

                //style it
                $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')

                //and append it to our table tools btn-group, also add tooltip
                $(colvis.button())
                        .prependTo('.tableTools-container .btn-group')
                        .attr('title', 'Show/hide columns').tooltip({container: 'body'});

                //and make the list, buttons and checkboxed Ace-like
                $(colvis.dom.collection)
                        .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
                        .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
                        .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');



                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $(this).closest('table').find('tbody > tr').each(function () {
                        var row = this;
                        if (th_checked)
                            tableTools_obj.fnSelect(row);
                        else
                            tableTools_obj.fnDeselect(row);
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                    var row = $(this).closest('tr').get(0);
                    if (!this.checked)
                        tableTools_obj.fnSelect(row);
                    else
                        tableTools_obj.fnDeselect($(this).closest('tr').get(0));
                });




                $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });


                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox
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



                /********************************/
                //add tooltip for small view action buttons in dropdown menu
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

                //tooltip placement on right or left
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();

                    var off2 = $source.offset();

                    //var w2 = $source.width();

                    if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                        return 'right';
                    return 'left';
                }
                $('.input-daterange').datepicker({autoclose: true});

            })
        </script>
        <script src="../assets/js/date-time/bootstrap-datepicker.js"></script>
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
        <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="../assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
        <script src="../assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <script src="../assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

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
