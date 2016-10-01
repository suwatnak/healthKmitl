$( document ).ready(function() {
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
                                    chart[i][1] = parseFloat(data[i].NUM);
                                    chart[i][2] = data[i].MOUNTH;
                                }
                            },
                            error: function (xhr, desc, err) {
                                console.log(xhr);
                                console.log("Details: " + desc + "\nError:" + err);
                            }
                        }); // end ajax call
  });

$(function () {
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
                                    categories: [
                                        chart[0][3],
                                        'Feb',
                                        'Mar',
                                        'Apr',
                                        'May',
                                    ],
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
                                    pointFormat: '<b>{point.y:.1f} คน</b>'
                                },
                                series: [{
                                        name: 'Population',
                                        data: [
                                            ['Shanghai', 23.7],
                                            ['Lagos', 16.1],
                                            ['Instanbul', 14.2],
                                            ['Karachi', 14.0],
                                            ['Mumbai', 12.5],
                                        ],
                                        dataLabels: {
                                            enabled: true,
                                            rotation: -90,
                                            color: '#FFFFFF',
                                            align: 'right',
                                            format: '{point.y:.1f}', // one decimal
                                            y: 10, // 10 pixels down from the top
                                            style: {
                                                fontSize: '13px',
                                                fontFamily: 'Verdana, sans-serif'
                                            }
                                        }
                                    }]

                            });

                        });

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
