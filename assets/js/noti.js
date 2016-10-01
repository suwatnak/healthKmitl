var n;
var MEDICALHISTORYIDD;
function noti(MEDICALHISTORYID)
{
    MEDICALHISTORYIDD = MEDICALHISTORYID;
    $.ajax(
            {
                type: "POST",
                url: "Medical_dispense.php",
                datatype: 'json',
                data: {'functionName': 'selectnamelastnamedisease', 'MEDICALHISTORYID': MEDICALHISTORYID, 'm': ''},
                success: function (data) {
                    $("#namenoti").val(data.TNAME);
                    $("#lastnamenoti").val(data.LNAME);
                    $("#diseasenoti").val(data.NAME);
                    $("#notemedicalhistorynoti").val(data.NOTE);
                }
            });

    n = null;
    n = new Array();
    $.ajax({
        url: 'Medical_dispense.php',
        type: 'post',
        datatype: 'json',
        data: {'functionName': 'selectmedecinehistorynoti', 'MEDICALHISTORYID': MEDICALHISTORYID, 'm': ''},
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                n[i] = new Array();
                n[i][0] = data[i].MEDICINEID;
                n[i][1] = data[i].NAME;
                n[i][2] = parseInt(data[i].QUANTITY);
                n[i][3] = data[i].UNIT;
            }
            listmedicinemedicalhistorynoti(n);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

    function listmedicinemedicalhistorynoti(n)
    {
        var x = '<thead><tr><th class="center col-sm-3">รหัสยา</th><th class="center col-sm-4">ชื่อยา</th><th class="center col-sm-2">จำนวน</th><th class="center">หน่วย</th></tr> </thead>';
        for (var i = 0; i < n.length; i++) {
            if (n[i][0] == null)
            {
            }
            else
                x = x + '<tbody><tr><td class="center">' + n[i][0] + '</td><td>' + n[i][1] + '</td><td class="center">' + n[i][2] + '</td><td class="center"><span class="label label-sm label-warning">' + n[i][3] + '</span></td></tr></tbody>';
        }
        $('#listmedicinemedicalhistorynoti').html(x);
    }

}

function dispense(n)
{
    var t = null;
    t = new Array();
    $.ajax({
        url: 'Medical_dispense.php',
        type: 'post',
        datatype: 'json',
        data: {'functionName': 'selectquantitynoti', 'MEDICALHISTORYID': MEDICALHISTORYIDD, 'm': ''},
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                t[i] = new Array();
                t[i][0] = data[i].MEDICINEID;
                t[i][1] = parseInt(data[i].QUANTITY);
            }
            var cancle = false;
            for (var i = 0; i < n.length; i++)
            {
                if (t[i][1] == 0)
                {
                    alert('ยา ' + n[i][1] + ' มียอดคงเหลือคือ ' + t[i][1] + ' ' + n[i][3] + ' ไม่สามารถสั่งยาตัวนี้ได้\nกรุณาเพิ่มยา ' + n[i][1] + ' เข้าสู่ระบบ');
                    cancle = true;
                }
                else if (n[i][2] > t[i][1])
                {
                    alert('ยา ' + n[i][1] + ' มียอดคงเหลือคือ ' + t[i][1] + ' ' + n[i][3] + ' ไม่สามารถสั่งเกินจำนวนนี้ได้\nกรุณาเพิ่มยา ' + n[i][1] + ' เข้าสู่ระบบ');
                    cancle = true;
                }
            }
            if (cancle == false)
            {
                var m = new Array();
                for (var i = 0; i < n.length; i++) {
                    m[i] = new Array();
                    m[i][0] = n[i][0];
                    m[i][1] = t[i][1] - n[i][2];
                    
                    
                }
                if(n.length==0)
                { 
                    $.ajax({
                    url: 'Medical_dispense.php',
                    type: 'post',
                    data: {'functionName': 'updatedataa', 'MEDICALHISTORYID': MEDICALHISTORYIDD, 'm': ''},
                    success: function (data) {
                        if (data.trim().length == 8)
                        {
                            document.getElementById("showresultdispense").innerHTML = '<font color="green">บันทึกข้อมูลเรียบร้อย</font>';
                            $("#dispensesubmit").attr("disabled", "disabled");
                        }
                    },
                    error: function (xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                }); // end ajax call   
                }
                
                else{
                $.ajax({
                    url: 'Medical_dispense.php',
                    type: 'post',
                    data: {'functionName': 'updatedata', 'MEDICALHISTORYID': MEDICALHISTORYIDD, 'm': m},
                    success: function (data) {
                        if (data.trim().length == 8)
                        {
                            document.getElementById("showresultdispense").innerHTML = '<font color="green">บันทึกข้อมูลเรียบร้อย</font>';
                            $("#dispensesubmit").attr("disabled", "disabled");
                        }
                    },
                    error: function (xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                }); // end ajax call   

            }
        }
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call



}
function refresh()
{
    document.getElementById("showresultdispense").innerHTML = '';
    $('#dispensesubmit').removeAttr('disabled');
}
function autoRefresh_div()
{
    $("#xyz").load("checkz.php");
}

setInterval('autoRefresh_div()', 5000);