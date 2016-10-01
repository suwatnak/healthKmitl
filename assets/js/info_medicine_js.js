function display(text) {
    document.getElementById("shownamemedicine").innerHTML = text;
}

function display2(text) {
    document.getElementById("showbutton").innerHTML = text;
}
function display3(text) {
    document.getElementById("showmodify").innerHTML = text;
}
function display4(text) {
    document.getElementById("deletebutton").innerHTML = text;
}


function deletemedicine(medicineid)
{
    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal" ><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-danger"  onclick="deletedata('+medicineid+')"><i class="ace-icon fa fa-trash-o"></i>ลบ</button></div>';              
    display4(x);
}
function deletedata(medicineid)
{
    $.ajax({
        url: 'info_medicine_php.php',
        type: 'POST',
        data: {'functionName': 'deletedata', 'medicineid': medicineid, 'namemedicine': '', 'unit': '', 'REORDER_POINT': ''},
        success: function () {
             location.reload();
//           document.getElementById("showdelete").innerHTML =('<font color="green">&nbsp;&nbsp;ลบข้อมูลเรียบร้อยแล้ว</font>'); 
        }
    }); // end ajax call
}
function modifymedicine(medicineid)
{

    $.ajax({
        url: 'info_medicine_php.php',
        type: 'POST',
        data: {'functionName': 'selectdata', 'medicineid': medicineid, 'namemedicine': '', 'unit': '', 'REORDER_POINT': ''},
        datatype: 'json',
        success: function (data) {

            document.getElementById('namemedicinemodify').value = data.NAME;
            document.getElementById('unitmodify').value = data.UNIT;
            document.getElementById('spinner1modify').value = data.REORDER_POINT;
        }
    }); // end ajax call

    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-primary" onclick="updatedata('+medicineid+',form2.namemedicinemodify.value,form2.unitmodify.value,form2.spinner1modify.value)"><i class="ace-icon fa fa-check"></i>บันทึก</button></div>';              
    display2(x);

}
function updatedata(medicineid,namemedicinee,unitt, REORDER_POINTT)
{
    var namemedicine = namemedicinee.trim();
    var REORDER_POINT = REORDER_POINTT.trim();
    var cancle = false;
    
     if (namemedicine.length == 0)
    {
        alert('กรุณากรอกชื่อยา');
        document.form2.namemedicinemodify.focus();
        cancle = true;
    }
     else if (unitt.length == 0)
    {
        alert('กรุณาเลือกหน่วยยา');
        document.form2.unitmodify.focus();
        cancle = true;
    }
    else if (REORDER_POINT == 0)
    {
        alert('กรุณาระบุจำนวนแจ้งเตือน');
        document.form2.spinner1modify.focus();
        cancle = true;
    }
    if (cancle == false)
    {
        $.ajax({
            url: 'info_medicine_php.php',
            type: 'POST',
            data: {'functionName': 'updatedata','medicineid':medicineid, 'namemedicine': namemedicine, 'unit': unitt, 'REORDER_POINT': REORDER_POINT},
            success: function () {
 location.reload();
//                document.getElementById('namemedicinemodify').value = "";
//                document.getElementById('unitmodify').value = "";
//                document.getElementById('spinner1modify').value = "0";
//                document.getElementById("showmodify").innerHTML = '<font color="green">&nbsp;&nbsp;แก้ไขข้อมูลเรียบร้อยแล้ว</font>';
            }
        }); // end ajax call
    }
}

function insertmedicine(namemedicinee, unitt, spinner11)
{


    var namemedicine = namemedicinee.trim();
    var spinner1 = spinner11.trim();

    var cancle = false;


    if (namemedicine.length == 0)
    {
        alert('กรุณากรอกชื่อยา');
        document.form1.namemedicine.focus();
        cancle = true;
    }
    else if (unitt.length == 0)
    {
        alert('กรุณาเลือกหน่วยยา');
        document.form1.unit.focus();
        cancle = true;
    }
    else if (spinner1 == 0)
    {
        alert('กรุณาระบุจำนวนแจ้งเตือน');
        document.form1.spinnert1.focus();
        cancle = true;
    }
    if (cancle == false)
    {
        $.ajax({
            url: 'info_medicine_php.php',
            type: 'POST',
            data: {'functionName': 'inserttotable','medicineid':'', 'namemedicine': namemedicine, 'unit': unitt, 'REORDER_POINT': spinner1},
            success: function () {
                 location.reload();
//                document.getElementById('namemedicine').value = "";
//                document.getElementById('unit').value = "";
//                document.getElementById('spinner1').value = "0";
//                document.getElementById("shownamemedicine").innerHTML = '<font color="green">&nbsp;&nbsp;บันทึกข้อมูลเรียบร้อย</font>';
            }
        }); // end ajax call
    }
}