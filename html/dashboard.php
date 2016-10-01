<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>แดชบอร์ด</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/css/font-awesome.css" />
   <link rel="shortcut icon" href="../assets/images/A_A.ico" />
        <!-- page specific plugin styles -->

        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

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

    <body class="no-skin" onLoad="getdatachart(), getdatachartfaculty()">
        <?php
        $m = null;
        $f = null;
        $s = null;
        $p = null;
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


                                <div class="col-md-8">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">โรคที่เป็นมากที่สุดของแต่ละเดือน</h3>

                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-8">
                                                    <div id="chartdis" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                                                </div><!-- /.col -->
                                     
                                            </div><!-- /.row -->
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->

                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">คณะที่เข้าการรักษามากที่สุดของแต่ละเดือน</h3>
                                            <div id="chartfaculty" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-8">

                                                    <div id="morris-bar-chart"></div>


                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>

                                <div class="col-md-4">
                                    <!-- Info Boxes Style 2 -->
                                    <!--<div id="timee" style="width: 300px; height: 200px; margin: 0 auto"></div>-->



                                    <div class="box-body">
                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">เพศ</h3>

                                            </div><!-- /.box-header -->

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <!-- #section:plugins/charts.flotchart -->
                                                    <div id="chartgender" style="min-width: 230px; height: 230px; max-width: 600px; margin: 0 auto"></div>

                                                    <!-- /section:plugins/charts.flotchart -->
                                                    <div class="hr hr8 hr-double"></div>

                                                    <div class="clearfix">
                                                        <!-- #section:custom/extra.grid -->
                                                        <div class="grid3">
                                                            <span class="grey">
                                                                <i class="ace-icon fa fa-male fa-2x blue"></i>
                                                                &nbsp; ชาย
                                                            </span>
                                                            <h5 class="bigger pull-right"><?php
                                                                require("db_connect.php");
                                                                $strSQL = "SELECT COUNT(A_PATIENT.SEX) AS COUNTSEXMAN FROM A_PATIENT INNER JOIN A_MEDICALHISTORY ON A_PATIENT.PATIENTID=A_MEDICALHISTORY.PATIENTID  WHERE A_PATIENT.SEX='M'";
                                                                $objParse = oci_parse($objConnect, $strSQL);
                                                                oci_execute($objParse);
                                                                while (oci_fetch($objParse)) {
                                                                    $m = oci_result($objParse, 'COUNTSEXMAN');
                                                                    echo $m;
                                                                }
                                                                ?>
                                                            </h5>
                                                        </div>

                                                        <div class="grid3">
                                                            <span class="grey">
                                                                <i class="ace-icon fa fa-female fa-2x green"></i>
                                                                &nbsp; หญิง
                                                            </span>
                                                            <h5 class="bigger pull-right">
                                                                <?php
                                                                require("db_connect.php");
                                                                $strSQL = "SELECT COUNT(A_PATIENT.SEX) AS COUNTSEXWOMAN FROM A_PATIENT INNER JOIN A_MEDICALHISTORY ON A_PATIENT.PATIENTID=A_MEDICALHISTORY.PATIENTID  WHERE A_PATIENT.SEX='F'";
                                                                $objParse = oci_parse($objConnect, $strSQL);
                                                                oci_execute($objParse);
                                                                while (oci_fetch($objParse)) {
                                                                    $f = oci_result($objParse, 'COUNTSEXWOMAN');
                                                                    echo $f;
                                                                }
                                                                ?>
                                                            </h5>
                                                        </div>
                                                        <div class="grid3">
                                                            <span class="grey">
                                                                <i class="ace-icon fa fa-users fa-2x red"></i>
                                                                &nbsp; รวม
                                                            </span>
                                                            <h5 class="bigger pull-right">
                                                                <?php
                                                                require("db_connect.php");
                                                                $strSQL = "SELECT COUNT(A_PATIENT.SEX) AS COUNTSEXALL FROM A_PATIENT INNER JOIN A_MEDICALHISTORY ON A_PATIENT.PATIENTID=A_MEDICALHISTORY.PATIENTID";
                                                                $objParse = oci_parse($objConnect, $strSQL);
                                                                oci_execute($objParse);
                                                                while (oci_fetch($objParse)) {
                                                                    echo oci_result($objParse, 'COUNTSEXALL');
                                                                }
                                                                ?>
                                                            </h5>
                                                        </div>
                                                        <!-- /section:custom/extra.grid -->
                                                    </div> 
                                                </div>
                                            </div><!-- /.widget-main -->
                                        </div><!-- /.widget-body -->
                                        <div class="box-body ">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">ประเภทผู้ใช้บริการ</h3>

                                                </div><!-- /.box-header -->

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <!-- #section:plugins/charts.flotchart -->
                                                        <div id="charttype" style="min-width: 230px; height: 230px; max-width: 600px; margin: 0 auto"></div>

                                                        <!-- /section:plugins/charts.flotchart -->
                                                        <div class="hr hr8 hr-double"></div>

                                                        <div class="clearfix">
                                                            <!-- #section:custom/extra.grid -->
                                                            <div class="grid2">
                                                                <span class="grey">
                                                                    <i class="ace-icon fa fa-male fa-2x orange2"></i>
                                                                    &nbsp; นักศึกษา
                                                                </span>
                                                                <h5 class="bigger pull-right"><?php
                                                                    require("db_connect.php");
                                                                    $strSQL = "SELECT COUNT(A_PATIENT.TYPE) AS COUNTTYPES FROM A_PATIENT INNER JOIN A_MEDICALHISTORY ON A_PATIENT.PATIENTID=A_MEDICALHISTORY.PATIENTID WHERE TYPE='นักศึกษา'";
                                                                    $objParse = oci_parse($objConnect, $strSQL);
                                                                    oci_execute($objParse);
                                                                    while (oci_fetch($objParse)) {
                                                                        $s = oci_result($objParse, 'COUNTTYPES');
                                                                        echo $s;
                                                                    }
                                                                    ?>
                                                                </h5>
                                                            </div>

                                                            <div class="grid2">
                                                                <span class="grey">
                                                                    <i class="ace-icon fa fa-female fa-2x brown"></i>
                                                                    &nbsp; บุคลากร
                                                                </span>
                                                                <h5 class="bigger pull-right">
                                                                    <?php
                                                                    require("db_connect.php");
                                                                    $strSQL = "SELECT COUNT(A_PATIENT.TYPE) AS COUNTTYPEP FROM A_PATIENT INNER JOIN A_MEDICALHISTORY ON A_PATIENT.PATIENTID=A_MEDICALHISTORY.PATIENTID WHERE TYPE='บุคลากร'";
                                                                    $objParse = oci_parse($objConnect, $strSQL);
                                                                    oci_execute($objParse);
                                                                    while (oci_fetch($objParse)) {
                                                                        $p = oci_result($objParse, 'COUNTTYPEP');
                                                                        echo $p;
                                                                    }
                                                                    ?>
                                                                </h5>
                                                            </div>

                                                            <!-- /section:custom/extra.grid -->
                                                        </div> 
                                                    </div>
                                                </div><!-- /.widget-main -->
                                            </div><!-- /.widget-body -->
                                        </div>
                                    </div><!-- /.widget-box -->
                                </div><!-- /.box -->

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
            var mounthh;
            function getdatachartfaculty()
            {

                $.ajax({
                    url: 'dashboard_php.php',
                    type: 'post',
                    datatype: 'json',
                    data: {'functionName': 'selectchartfaculty'},
                    success: function (data) {
                        var datachart = new Array();
                        for (var i = 0; i < data.length; i++)
                        {
                            datachart[i] = new Array();
                            datachart[i][0] = data[i].TNAME;
                            datachart[i][1] = parseInt(data[i].NUM);

                        }
                        showcchartfaculty(datachart);

                    },
                    error: function (xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                }); // end ajax call

            }

            function showcchartfaculty(datachart)
            {

                $('#chartfaculty').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: mounthh
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'จำนวน (คน)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: '<b>{point.y} คน</b>'
                    },
                    series: [{
                            name: 'Population',
                            data: datachart,
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: '#FFFFFF',
                                align: 'right',
                                format: '{point.y}', // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        }]

                });

            }

            var chart;
            var datamounth;
            function getdatachart()
            {
                chart = new Array();
                $.ajax({
                    url: 'dashboard_php.php',
                    type: 'post',
                    datatype: 'json',
                    data: {'functionName': 'selectchart'},
                    success: function (data) {

                        for (var i = 0; i < data.length; i++)
                        {
                            chart[i] = new Array();
                            chart[i][0] = data[i].NAME;
                            chart[i][1] = parseInt(data[i].NUM);

                        }

                        showchart();


                    },
                    error: function (xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                }); // end ajax call
            }



            function showchart()
            {
                var dd = new Date();
                var month = new Array();
                month[0] = "มกราคม";
                month[1] = "กุมภาพันธ์";
                month[2] = "มีนาคม";
                month[3] = "เมษายน";
                month[4] = "พฤษภาคม";
                month[5] = "มิถุนายน";
                month[6] = "กรกฎาคม";
                month[7] = "สิงหาคม";
                month[8] = "กันยายน";
                month[9] = "ตุลาคม";
                month[10] = "พฤศจิกายน";
                month[11] = "ธันวาคม";
                mounthh = new Array();
                var data = new Array();

                for (var i = 0; i < chart.length; i++)
                {
                    var data1 = new Array();
                    data1.push(chart[i][0]);
                    data1.push(chart[i][1]);
                    data.push(data1);
                    var d = new Date();
                    var j = chart.length - 1;
                    d.setMonth(d.getMonth() - (j - i));
                    var monthh = d.getMonth();
                    mounthh.push(month[monthh]);
                }
                mounthh.push(month[dd.getMonth()]);
                $('#chartdis').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: mounthh
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'จำนวน (คน)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: '<b>{point.y} คน</b>'
                    },
                    series: [{
                            name: 'Population',
                            data: data,
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: '#FFFFFF',
                                align: 'right',
                                format: '{point.y}', // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        }]

                });
            }
            jQuery(function () {

                $(function () {

                    /**
                     * Get the current time
                     */
                    function getNow() {
                        var now = new Date();

                        return {
                            hours: now.getHours() + now.getMinutes() / 60,
                            minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
                            seconds: now.getSeconds() * 12 / 60
                        };
                    }

                    /**
                     * Pad numbers
                     */
                    function pad(number, length) {
                        // Create an array of the remaining length + 1 and join it with 0's
                        return new Array((length || 2) + 1 - String(number).length).join(0) + number;
                    }

                    var now = getNow();

                    // Create the chart
                    $('#timee').highcharts({
                        chart: {
                            type: 'gauge',
                            plotBackgroundColor: null,
                            plotBackgroundImage: null,
                            plotBorderWidth: 0,
                            plotShadow: false,
                            height: 200
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: ''
                        },
                        pane: {
                            background: [{
                                    // default background
                                }, {
                                    // reflex for supported browsers
                                    backgroundColor: Highcharts.svg ? {
                                        radialGradient: {
                                            cx: 0.5,
                                            cy: -0.4,
                                            r: 1.9
                                        },
                                        stops: [
                                            [0.5, 'rgba(255, 255, 255, 0.2)'],
                                            [0.5, 'rgba(200, 200, 200, 0.2)']
                                        ]
                                    } : null
                                }]
                        },
                        yAxis: {
                            labels: {
                                distance: -20
                            },
                            min: 0,
                            max: 12,
                            lineWidth: 0,
                            showFirstLabel: false,
                            minorTickInterval: 'auto',
                            minorTickWidth: 1,
                            minorTickLength: 5,
                            minorTickPosition: 'inside',
                            minorGridLineWidth: 0,
                            minorTickColor: '#666',
                            tickInterval: 1,
                            tickWidth: 2,
                            tickPosition: 'inside',
                            tickLength: 10,
                            tickColor: '#666',
                            title: {
                                text: 'สจล',
                                style: {
                                    color: '#BBB',
                                    fontWeight: 'normal',
                                    fontSize: '8px',
                                    lineHeight: '10px'
                                },
                                y: 10
                            }
                        },
                        tooltip: {
                            formatter: function () {
                                return this.series.chart.tooltipText;
                            }
                        },
                        series: [{
                                data: [{
                                        id: 'hour',
                                        y: now.hours,
                                        dial: {
                                            radius: '60%',
                                            baseWidth: 4,
                                            baseLength: '95%',
                                            rearLength: 0
                                        }
                                    }, {
                                        id: 'minute',
                                        y: now.minutes,
                                        dial: {
                                            baseLength: '95%',
                                            rearLength: 0
                                        }
                                    }, {
                                        id: 'second',
                                        y: now.seconds,
                                        dial: {
                                            radius: '100%',
                                            baseWidth: 1,
                                            rearLength: '20%'
                                        }
                                    }],
                                animation: false,
                                dataLabels: {
                                    enabled: false
                                }
                            }]
                    },
                    // Move
                    function (chart) {
                        setInterval(function () {

                            now = getNow();

                            var hour = chart.get('hour'),
                                    minute = chart.get('minute'),
                                    second = chart.get('second'),
                                    // run animation unless we're wrapping around from 59 to 0
                                    animation = now.seconds === 0 ?
                                    false :
                                    {
                                        easing: 'easeOutElastic'
                                    };

                            // Cache the tooltip text
                            chart.tooltipText =
                                    pad(Math.floor(now.hours), 2) + ':' +
                                    pad(Math.floor(now.minutes * 5), 2) + ':' +
                                    pad(now.seconds * 5, 2);

                            hour.update(now.hours, true, animation);
                            minute.update(now.minutes, true, animation);
                            second.update(now.seconds, true, animation);

                        }, 1000);

                    });
                });

// Extend jQuery with some easing (copied from jQuery UI)
                $.extend($.easing, {
                    easeOutElastic: function (x, t, b, c, d) {
                        var s = 1.70158;
                        var p = 0;
                        var a = c;
                        if (t == 0)
                            return b;
                        if ((t /= d) == 1)
                            return b + c;
                        if (!p)
                            p = d * .3;
                        if (a < Math.abs(c)) {
                            a = c;
                            var s = p / 4;
                        }
                        else
                            var s = p / (2 * Math.PI) * Math.asin(c / a);
                        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
                    }
                });


                $(function () {

                    $(document).ready(function () {

                        // Build the chart
                        $('#chartgender').highcharts({
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false
                                    },
                                    showInLegend: false
                                }
                            },
                            series: [{
                                    type: 'pie',
                                    name: 'จำนวน',
                                    data: [
                                        ['ชาย', <?php echo $m ?>],
                                        ['หญิง',<?php echo $f ?>],
                                    ]
                                }]
                        });
                        Highcharts.setOptions({
                            colors: ['#feb902', '#a52a2a']
                        });
                    });

                });

                $(function () {

                    $(document).ready(function () {

                        // Build the chart
                        $('#charttype').highcharts({
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false
                                    },
                                    showInLegend: false
                                }
                            },
                            series: [{
                                    type: 'pie',
                                    name: 'จำนวน',
                                    data: [
                                        ['นักศึกษา', <?php echo $s ?>],
                                        ['บุคคลากร',<?php echo $p ?>],
                                    ]
                                }]
                        });

                    });
                    Highcharts.setOptions({
                        colors: ['#478fca', '#69aa46']
                    });

                });
            })
        </script>
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
        </script>
        <script src="../assets/js/bootstrap.js"></script>

        <script src="../assets/js/jquery-ui.custom.js"></script>
        <script src="../assets/js/jquery.ui.touch-punch.js"></script>
        <script src="../assets/js/jquery.easypiechart.js"></script>
        <script src="../assets/js/jquery.sparkline.js"></script>
        <script src="../assets/js/flot/jquery.flot.js"></script>
        <script src="../assets/js/flot/jquery.flot.pie.js"></script>
        <script src="../assets/js/flot/jquery.flot.resize.js"></script>




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
        <script src="../assets/js/highcharts.js"></script>
        <script src="../assets/js/highcharts-more.js"></script>
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
