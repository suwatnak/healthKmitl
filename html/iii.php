<!doctype html>
<html lang="en">
    <head>
        <meta charset=utf-8 />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>




            $(document).ready(function () {
                var mounthh;
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
                for (var i = 0; i <= 6; i++)
                {
                    var d = new Date();
                    var j = 6;
                    d.setMonth(d.getMonth() - (j - i));
                    var monthh = d.getMonth();
                    mounthh.push(month[monthh]);
                }
            });



            //                
            //                document.write(month[today] + "<br/>");
            //              
            //                document.write(month[monthh] + "<br/>");
        </script>

    </head>
    <body>


    </body>
</html>