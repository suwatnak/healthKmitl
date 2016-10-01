function display(text) {
    document.getElementById("showbutton").innerHTML = text;
}
function display2(text) {
    document.getElementById("deletebutton").innerHTML = text;
}


function insertmedicine(codedisease, MEDICINEID, QUANTITYMEDICINE, chack)
{
    var cancle = false;
    if (MEDICINEID == 0)
    {
        alert('กรุณาเลือกยา');
        document.form2.select3.focus();
        cancle = true;
    }
    else if (QUANTITYMEDICINE == 0)
    {
        alert('กรุณาระบุจำนวนยา');
        document.form2.spinner1.focus();
        cancle = true;
    }
    else if (chack == 'true')
    {
        alert('คุณได้เลือกยาตัวนี้ไปแล้ว');
        document.form2.select3.focus();
        cancle = true;
    }
    if (cancle == false)
    {
        $.ajax({
            url: 'pair_dm_php.php',
            type: 'POST',
            data: {'functionName': 'inserttotable', 'codedisease': codedisease, 'medicineid': MEDICINEID, 'QUANTITYMEDICINE': QUANTITYMEDICINE},
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
function deletemedicine(codedisease, MEDICINEID)
{
    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal" ><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-danger"  onclick="deletedata(' + codedisease + ',' + MEDICINEID + ')"><i class="ace-icon fa fa-trash-o"></i>ลบ</button></div>';
    display2(x);
}
function modifymedicine(codedisease, MEDICINEID, QUANTITYMEDICINE)
{

    document.getElementById('spinner2').value = QUANTITYMEDICINE;

    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-primary" onclick="updatedata(' + codedisease + ',' + MEDICINEID + ',form1.spinner2.value)"><i class="ace-icon fa fa-check"></i>บันทึก</button></div>';
    display(x);
}

function deletedata(codedisease, MEDICINEID)
{
    $.ajax({
        url: 'pair_dm_php.php',
        type: 'POST',
        data: {'functionName': 'deletedata', 'codedisease': codedisease, 'medicineid': MEDICINEID, 'QUANTITYMEDICINE': ''},
        success: function () {
            location.reload();
//           document.getElementById("showdelete").innerHTML =('<font color="green">&nbsp;&nbsp;ลบข้อมูลเรียบร้อยแล้ว</font>'); 
        }
    }); // end ajax call
}

function updatedata(codedisease, MEDICINEID, QUANTITYMEDICINEE)
{
    var QUANTITYMEDICINE = QUANTITYMEDICINEE.trim();
    var cancle = false;

    if (QUANTITYMEDICINE == 0)
    {
        alert('กรุณาระบุจำนวนยา');
        document.form1.spinner1.focus();
        cancle = true;
    }

    if (cancle == false)
    {
        $.ajax({
            url: 'pair_dm_php.php',
            type: 'POST',
            data: {'functionName': 'updatedata', 'codedisease': codedisease, 'medicineid': MEDICINEID, 'QUANTITYMEDICINE': QUANTITYMEDICINE},
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
function getlistmedicine()
{
    var x = document.getElementById("form-field-select-3").value;
    alert(x);
}
