
<?php $codestudent = $_GET["codestudent"];
?>
<body class="no-skin" onLoad="setFocus()">
    <!-- #section:basics/navbar.layout -->
    <!-- /section:basics/navbar.layout -->
    <div class="main-container" id="main-container">
        <!-- /section:basics/sidebar -->
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="table-header">
                                &nbsp;
                            </div>
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center col-sm-3">
                                                รหัสการรักษา
                                            </th>
                                            <th class="center col-sm-3">วัน/เวลา</th>
                                            <th class="center col-sm-4">ชื่อโรค</th>
                                            <th>อื่นๆ</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php
                                        require("db_connect.php");
                                        $strSQL = "SELECT A_MEDICALHISTORY.MEDICALHISTORYID,to_char(to_date(A_MEDICALHISTORY.DATEE, 'DD/MM/YYYY')) AS DATEE,A_MEDICALHISTORY.TIME,A_DISEASE.NAME  FROM A_MEDICALHISTORY INNER  JOIN A_DISEASE ON A_DISEASE.DISEASEID=A_MEDICALHISTORY.DISEASEID 
WHERE A_MEDICALHISTORY.PATIENTID='$codestudent' ORDER BY DATEE DESC
";
                                        $objParse = oci_parse($objConnect, $strSQL);
                                        oci_execute($objParse, OCI_DEFAULT);
                                        while ($objResult = oci_fetch_array($objParse, OCI_BOTH)) {
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $objResult['MEDICALHISTORYID'] ?></td>
                                                <td class="center"><?php echo $objResult['DATEE'] . '   /   ' . $objResult['TIME']; ?></td>
                                                <td class="center"><?php echo $objResult['NAME'] ?></td>
                                                <td class="center">
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green"  href="#alerthistory" role="button" data-toggle="modal"  onclick="getmedicinehisandnote(<?php echo $objResult['MEDICALHISTORYID'] ?>);">
                                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
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

                            <div id="alerthistory" class="modal fade" tabindex="-1">
                                <div class="col-sm-2"> </div><div class="col-sm-8">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="blue bigger"></h5>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="">
                                                    <form class="form-horizontal" role="form" name="formnotialert">


                                                        <div class="form-group">
                                                            <div class="col-xs-1"></div><div class="col-xs-10">

                                                                <table id="listmedicinemedicalhistory" class="table table-striped table-bordered table-hover">

                                                                </table>   
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-10">
                                                                <textarea  rows="5" id="notehis" class="form-control" placeholder="อาการของผู้ป่วย"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->



    <!-- page specific plugin scripts -->

    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
    <script src="../assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
    <script src="../assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>





    <!-- inline scripts related to this page -->
    <script type="text/javascript">
                                                           
                                                            jQuery(function ($) {
                                                               
                                                                var oTable1 =
                                                                        $('#dynamic-table')
                                                                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                                                        .dataTable({
                                                                            bAutoWidth: false,
                                                                            "aoColumns": [
                                                                                {"bSortable": true},
                                                                                null, null,
                                                                                {"bSortable": true}
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
                                                                //oTable1.fnAdjustColumnSizing();


                                                                //TableTools settings
                                                                TableTools.classes.container = "btn-group btn-overlap";
                                                                TableTools.classes.print = {
                                                                    "body": "DTTT_Print",
                                                                    "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
                                                                    "message": "tableTools-print-navbar"
                                                                }

                                                                //initiate TableTools extension

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

                                                            });
    </script>

    <!-- the following scripts are used in demo only for onpage help and you don't need them -->


</body>
</html>
