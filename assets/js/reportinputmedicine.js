function getidmedecineandtime()
{
    var medicinereport = $("#medicinereport").val().trim();
    var start = $("#start").val().trim();
    var end = $("#end").val().trim();
    var sort = $("#sort").val();
    
    var cancle = false;
    if (start.length == 0)
    {
        alert('กรุณาเลือกวันเริ่มต้น');
        $("#start").focus();
        cancle = true;
    }
    else if (end.length == 0)
    {
        alert('กรุณาเลือกวันสุดท้าย');
        $("#end").focus();
        cancle = true;
    }
    if (cancle == false)
    {

      
        $.ajax({
            url: 'reportinputmedicine_php.php',
            type: 'post',
            data: {'medicinereport': medicinereport, 'start': start, 'end': end},
            success: function (data) {
                var x=parseInt(data);
                if (x== 0)
                {
                    alert('ไม่พบข้อมูล');
                }
                else {
                     senddata(); 
                }
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call

    }

    function senddata()
    {   
         location.href = 'reportinputmedicine_csv.php?medicinereport=' + medicinereport + '&start=' + start + '&end=' + end+'&sort=' + sort;
    }

}


 