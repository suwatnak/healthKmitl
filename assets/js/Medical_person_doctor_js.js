function display(text)
{
    document.getElementById("showresultnamelastnameperson").innerHTML = text;
}
function display2(text)
{
    document.getElementById("showmedicine").innerHTML = text;
}
function display3(text)
{
    document.getElementById("showbuttonmodify").innerHTML = text;
}
function display4(text)
{
    document.getElementById("deletebutton").innerHTML = text;
}

function getmedicinehisandnote(MEDICALHISTORYID)
{

    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        data: {'functionName': 'selectnote', 'codestudent': MEDICALHISTORYID, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {
            $('#notehis').val(data);
        }
    });
    selectmedecinehistory(MEDICALHISTORYID)
}

function countHistoryMedical(codestudent)
{
    $("#areashowhistory").load('table_showhistory.php?codestudent=' + codestudent);

    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        datatype: 'json',
        data: {'functionName': 'countHistoryMedical', 'codestudent': codestudent, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {
            showconunthistory(data);
        },
    }); // end ajax call
}

function getmedicinehisandnote(MEDICALHISTORYID)
{

    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        data: {'functionName': 'selectnote', 'codestudent': MEDICALHISTORYID, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {
            $('#notehis').val(data);
        }
    });
    selectmedecinehistory(MEDICALHISTORYID)
}
function listmedicinemedicalhistory(n)
{
    var x = '<thead><tr><th class="center col-sm-3">รหัสยา</th><th class="center col-sm-4">ชื่อยา</th><th class="center col-sm-2">จำนวน</th><th class="center">หน่วย</th></tr> </thead>';
    for (var i = 0; i < n.length; i++) {
        if (n[i][0] == null)
        {
        }
        else
            x = x + '<tbody><tr><td class="center">' + n[i][0] + '</td><td>' + n[i][1] + '</td><td class="center">' + n[i][2] + '</td><td class="center"><span class="label label-sm label-warning">' + n[i][3] + '</span></td></tr></tbody>';
    }
    $('#listmedicinemedicalhistory').html(x);
}
function pager(test, his)
{
    if (test == 'previous')
    {
        if (j == 0)
        {
        } else
        {
            j--;
            showHistoryMedical(his);

            showconunthistory(his.length - j);
        }
    }
    else
    {
        if (his.length - 1 == j)
        {
        }
        else
        {
            j++;
            showHistoryMedical(his);
            showconunthistory(his.length - j);
        }
    }
}

function showconunthistory(data)
{
    $('#showconunthistory').html(data);
}
var j = 0;
function showHistoryMedical(his)
{
    $("#codemedicalhistory").val(his[j][0]);
    $("#diseasemedicalhistory").val(his[j][1]);
    $("#datemedicalhistory").val(his[j][2]);
    $("#timemedicalhistory").val(his[j][3]);
    $("#notemedicalhistory").val(his[j][4]);
    selectmedecinehistory(his[j][0]);
}
var n;
function selectmedecinehistory(historyid)
{
    n = null;
    n = new Array();
    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        datatype: 'json',
        data: {'functionName': 'selectmedecinehistory', 'codestudent': historyid, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                n[i] = new Array();
                n[i][0] = data[i].MEDICINEID;
                n[i][1] = data[i].NAME;
                n[i][2] = parseInt(data[i].QUANTITY);
                n[i][3] = data[i].UNIT;

            }
            listmedicinemedicalhistory(n);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
}
function chackquantitybeforesubmit()
{
    var cancle = false;
    var codeperson = $("#codeperson").val();
    var disease = $("#disease").val();
    var note = $("#note").val();
    if (codeperson.length == 0)
    {
        alert('กรุณาค้นหาข้อมูลผู้ป่วย');
        cancle = true;
    }
    else if (disease == 0)
    {
        alert('กรุณาเลือกโรค');
        cancle = true;
    } else if (note.length == 0)
    {
        alert('กรุณาระบุอาการของผู้ป่วย');
        $("#note").focus();
        cancle = true;
    }
    else if (test.length > 0)
    {
        for (var i = 0; (i < test.length) && (!cancle); i++)
        {
            if (test[i][0] !== null)
            {
                if (test[i][4] == 0)
                {
                    alert('ยา ' + test[i][1] + ' มียอดคงเหลือคือ ' + test[i][4] + ' ' + test[i][3] + ' ไม่สามารถสั่งยาตัวนี้ได้\nกรุณาลบยา ' + test[i][1] + ' ออกจากรายการ');
                    cancle = true;
                }
                else if (test[i][2] > test[i][4])
                {
                    alert('ยา ' + test[i][1] + ' มียอดคงเหลือคือ ' + test[i][4] + ' ' + test[i][3] + ' ไม่สามารถสั่งเกินจำนวนนี้ได้\nระบบจะปรับยอดในรายการให้อัตโนมัติ');
                    test[i][2] = test[i][4];
                    cancle = true;
                    showmedicine(test);

                }
            }
        }
    }

    if (cancle == false)
    {
        var codeperson = $("#codeperson").val();
        var diseaseid = $("#disease").val();
        var date = $("#date").val();
        var time = $("#time").val();
        var note = $("#note").val();


        $.ajax({
            url: 'Medical_MedicalHistory_doctor_php.php',
            type: 'post',
            data: {'functionName': 'insertMedicalHistory', 'codestudent': codeperson, 'date': date, 'time': time, 'diseaseid': diseaseid, 'note': note, 'test': test},
            success: function (data) {
                if (data.trim().length == 8)
                {
                    document.getElementById("showresultsubmit").innerHTML = '<font color="green">บันทึกข้อมูลเรียบร้อย</font>';
                    setTimeout(reload, 1500);
                }

            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call   
        $("#submit").attr("disabled", "disabled");


    }

}

function reload()
{
    location.reload();
}

function addmedicine(NAME, QUANTITY)
{
    var medicine = $("#medicine").val().trim();
    var spinner1 = $("#spinner1").val().trim();
    var unit = $("#unit").val();
    var cancle = false;
    if (spinner1 == 0)
    {
        alert('กรุณาระบุจำนวนยา')
        cancle = true;
    }
    else
    {
        for (var i = 0; i < test.length; i++)
            if (medicine == test[i][0])
            {
                alert('มียาชื่อ ' + NAME + ' อยู่ในรายการแล้ว');
                cancle = true;
            }
    }
    if (cancle == false)
    {

        var z = new Array(medicine, NAME, spinner1, unit, QUANTITY);
        test.push(z);
        showmedicine(test);
    }
}

function selectQUANTITY()
{
    var medicine = $("#medicine").val();
    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        datatype: 'json',
        data: {'functionName': 'selectQUANTITY', 'codestudent': medicine, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {

            addmedicine(data.NAME, parseInt(data.QUANTITY));
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
}

function selectunit()
{
    var medicine = $("#medicine").val().trim();
    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        data: {'functionName': 'selectunit', 'codestudent': medicine, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {
            $("#unit").val(data);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

}

function deletemedicine(i)
{
    test[i][0] = null;
    showmedicine(test);
}
function showbuttondeletemedicine(i)
{
    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button class="btn btn-sm btn-primary" onclick="deletemedicine(' + i + ')" data-dismiss="modal"><i class="ace-icon fa fa-check"></i>ลบ</button></div>';
    display4(x);
}
function updatemedicine(i)
{


    var x = document.getElementById('spinner1modify').value;
    if (x == 0)
    {
        alert('กรุณาระบุจำนวนยา');
    }
    else
    {
        test[i][2] = x;
    }

    showmedicine(test);
}

function setmodifymedicine(QUANTITYMEDICINE, i)
{
    document.getElementById('spinner1modify').value = QUANTITYMEDICINE;
    var x = '<div class="modal-footer"><button class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ยกเลิก</button><button id="r" class="btn btn-sm btn-primary" onclick="updatemedicine(' + i + ')" data-dismiss="modal"><i class="ace-icon fa fa-check"></i>บันทึก</button></div>';
    display3(x);
}

function showmedicine(test)
{
    var x = '<thead><tr><th class="center col-sm-3">รหัสยา</th><th class="center col-sm-4">ชื่อยา</th><th class="center col-sm-2">จำนวน</th><th class="center">หน่วย</th><th class="center col-sm-1"></th></tr> </thead>';
    for (var i = 0; i < test.length; i++) {
        if (test[i][0] == null)
        {
        }
        else
            x = x + '<tbody><tr><td class="center">' + test[i][0] + '</td><td>' + test[i][1] + '</td><td class="center">' + test[i][2] + '</td><td class="center"><span class="label label-sm label-warning">' + test[i][3] + '</span></td><td><div class="hidden-sm hidden-xs btn-group"><button type="button" href="#modifymedicine" role="button" data-toggle="modal" onclick="setmodifymedicine(' + test[i][2] + ',' + i + ');" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil bigger-120"></i></button><button type="button" href="#deletemedicine" role="button" data-toggle="modal" onclick="showbuttondeletemedicine(' + i + ');" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button></div></td></tr></tbody>';
    }
    $('#simple-table').html(x);
}
var test;
function selectmedicine()
{
    test = null;
    test = new Array();
    var diseaseid = $("#disease").val().trim();
    $.ajax({
        url: 'Medical_person_doctor_php.php',
        type: 'post',
        datatype: 'json',
        data: {'functionName': 'selectmedecine', 'codestudent': diseaseid, 'namestudent': '', 'lastnamestudent': '', 'gender': '', 'faculty': ''},
        success: function (data) {

            for (var i = 0; i < data.length; i++) {
                test[i] = new Array();
                test[i][0] = data[i].MEDICINEID;
                test[i][1] = data[i].NAME;
                test[i][2] = parseInt(data[i].QUANTITYMEDICINE);
                test[i][3] = data[i].UNIT;
                test[i][4] = parseInt(data[i].QUANTITY);

            }
            test[data.length] = new Array();
            test[data.length][0] = null;
            test[data.length][1] = null;
            test[data.length][2] = null;
            test[data.length][3] = null;
            test[data.length][4] = null;
            showmedicine(test);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
}

function chacknamelastnameperson()
{
    var nameperson = $("#nameperson").val().trim();
    var lastnameperson = $("#lastnameperson").val().trim();
    if (nameperson.length == 0)
    {
        alert('กรุณากรอกชื่อ');
        $("#nameperson").focus();
    }
    else if (lastnameperson.length == 0)
    {
        alert('กรุณากรอกนามสกุล');
        $("#lastnameperson").focus();
    }
    else
    {

        $.ajax({
            url: 'Medical_person_doctor_php.php',
            type: 'post',
            datatype: 'json',
            data: {'functionName': 'chacknamelastnameperson', 'codestudent': '', 'namestudent': nameperson, 'lastnamestudent': lastnameperson, 'gender': '', 'faculty': ''},
            success: function (data) {
                if (data.STATUS == '0')
                {
                    countHistoryMedical(data.PATIENTID);
                    $("#nameperson").attr("disabled", "disabled");
                    $("#lastnameperson").attr("disabled", "disabled");
                    $("#buttonnamelastname").attr("disabled", "disabled");
                    $("#codeperson").val(data.PATIENTID);
                    $("#nameperson").val(data.TNAME);
                    $("#lastnameperson").val(data.LNAME);
                    if (data.SEX == 'M')
                        $("[name=genderperson]").val(["M"]);
                    else
                        $("[name=genderperson]").val(["F"]);
                    $("#facultperson").val(data.FACID);
                    $("#submit").removeAttr('disabled');
                    display('<i class="fa fa-check  bigger-150 green"></i>');
                } else if (data.STATUS == '1')
                {
                    $(document).ready(function () {
                        $('#addpersonn').click();
                    });
                    var addnameperson = $("#nameperson").val().trim();
                    var lastnameperson = $("#lastnameperson").val().trim();
                    $("#addnameperson").val(addnameperson);
                    $("#addlastnameperson").val(lastnameperson);
                }


            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    }
}

function addperson()
{
    var addnameperson = $("#addnameperson").val().trim();
    var addlastnameperson = $("#addlastnameperson").val().trim();
    var addgender = $('input[name=addgender]:checked').val();
    var addfacultystudent = $("#addfacultystudent").val();

    var cancle = false;
//                     $("#addcodestudent").val(codestudent);

    if (addgender == null)
    {
        alert('กรุณาเลือกเพศ');
        cancle = true;
    }

    else if (addfacultystudent == 0)
    {
        alert('กรุณาเลือกหน่วยงาน');
        cancle = true;
    }

    if (cancle == false)
    {
        $.ajax({
            url: 'Medical_person_doctor_php.php',
            type: 'post',
            data: {'functionName': 'insertdataA_PATIENT', 'codestudent': '', 'namestudent': addnameperson, 'lastnamestudent': addlastnameperson, 'gender': addgender, 'faculty': addfacultystudent},
            success: function () {
                $(document).ready(function () {
                    $('#cancle').click();

                });
                chacknamelastnameperson();
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call   


    }
}