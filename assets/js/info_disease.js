function display(text) {
    document.getElementById("showbuttonmodify").innerHTML = text;
}
function display2(text) {
    document.getElementById("showbuttondelete").innerHTML = text;
}
function modifydisease(diseaseid)
{
    $.ajax({
        url: 'info_disease_php.php',
        type: 'POST',
        data: {'functionName': 'selectdata','diseaseid':diseaseid, 'namemedisease':''},
        success: function (data) {
            document.getElementById('namediseasemodify').value = data;
        }
    }); // end ajax call
    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-primary" onclick="updatedata('+diseaseid+',form2.namediseasemodify.value)"><i class="ace-icon fa fa-check"></i>แก้ไข</button></div>';              
    display(x);        
   
}

function deletedisease(diseaseid)
{var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal" ><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-danger"  onclick="deletedata('+diseaseid+')"><i class="ace-icon fa fa-trash-o"></i>ลบ</button></div>';              
    display2(x);
}

function deletedata(diseaseid)
{
    $.ajax({
            url: 'info_disease_php.php',
            type: 'POST',
            data: {'functionName': 'deletedata','diseaseid':diseaseid,'namemedisease':''},
            success: function () {
                 location.reload();
            }
        }); // end ajax call
}
function updatedata(diseaseid,namemediseasee)
{
    var namemedisease = namemediseasee.trim();
    var cancle = false;
    if (namemedisease.length == 0)
    {   
        cancle = true;
        alert('กรุณากรอกชื่อโรค');
        document.form1.namediseasemodify.focus();
    }
     if (cancle == false)
    { 
        $.ajax({
            url: 'info_disease_php.php',
            type: 'POST',
            data: {'functionName': 'updatedata','diseaseid':diseaseid,'namemedisease':namemedisease},
            success: function () {
               
            }
        }); // end ajax call
    }
}
function insertdisease(namemediseasee)
{
   var namemedisease = namemediseasee.trim();
    var cancle = false;


    if (namemedisease.length == 0)
    {
        alert('กรุณากรอกชื่อโรค');
        document.form2.namemedisease.focus();
        cancle = true;
    }
    
    if (cancle == false)
    {
        $.ajax({
            url: 'info_disease_php.php',
            type: 'POST',
            data: {'functionName': 'insertdata','diseaseid':'','namemedisease':namemedisease},
            success: function () {
                 location.reload();
            }
        }); // end ajax call
    }
}
