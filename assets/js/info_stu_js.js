
function display(text) {
    document.getElementById("massagecodestudent").innerHTML = text;
}
function display2(text) {
    document.getElementById("modifycode").innerHTML = text;
}
function display3(text) {
    document.getElementById("modifyshow").innerHTML = text;
}
function display4(text) {
    document.getElementById("deleteconfirmcode").innerHTML = text;
}


function check_data(codestudentt, gender, namestudentt, lastnamestudentt, facultystudent, codestu)
{
    var codestudent = codestudentt.trim();
    var namestudent = namestudentt.trim();
    var lastnamestudent = lastnamestudentt.trim();
    var cancle = false;

    if (codestudent.length == 0)
    {
        alert('กรุณากรอกรหัสนักศึกษา');
        document.form1.codestudent.focus();
        cancle = true;
    }
    else if (gender.length == 0)
    {
        alert('กรุณาเลือกเพศ');
        cancle = true;
    }
    else if (namestudent.length == 0)
    {
        alert('กรุณากรอกชื่อ');
        document.form1.namestudent.focus();
        cancle = true;
    }
    else if (lastnamestudent.length == 0)
    {
        alert('กรุณากรอกนามสกุล');
        document.form1.lastnamestudent.focus();
        cancle = true;
    }
    else if (facultystudent == 0)
    {
        alert('กรุณาเลือกคณะ');
        cancle = true;
    }
    else if (codestudent.length < 8)
    {
        alert('กรุณากรอกรหัสนักศึกษาให้ครบ 8 หลัก');
        document.form1.codestudent.focus();
        cancle = true;
    }
    else if (isNaN(codestudent))
    {
        alert('กรุณากรอกเฉพาะตัวเลข');
        document.getElementById('codestudent').value = "";
        cancle = true;
    }
    else if (codestudent.length > 8)
    {
        alert('กรุณากรอกรหัสนักศึกษา 8 หลักเท่านั้น');
        document.form1.codestudent.focus();
        cancle = true;
    }
    else if (codestu == 'no')
    {
        alert('รหัสนักศึกษานี้มีอยู่ในระบบแล้ว');
        document.form1.codestudent.focus();
        cancle = true;
    }

    if (cancle == false)
    {

        $.ajax({
            url: 'info_stu_s.php',
            type: 'POST',
            data: {'codestudent': codestudent, 'namestudent': namestudent, 'lastnamestudent': lastnamestudent, 'facultystudent': facultystudent, 'gender': gender},
            success: function () {
                document.getElementById('codestudent').value = "";
                document.getElementById('namestudent').value = "";
                document.getElementById('lastnamestudent').value = "";
                document.getElementById("ganderman").checked = false;
                document.getElementById("genderwoman").checked = false;
                document.getElementById('facultystudent').value = "";
                document.getElementById("messagesbutton").innerHTML = '<font color="green">บันทึกข้อมูลเรียบร้อย</font>';
                setTimeout(reload, 1000);
            }
        }); // end ajax call


    }
}
function reload()
{
    location.reload();
}
function update_data(codestudentt, gender, namestudentt, lastnamestudentt, facultystudent)
{

    var codestudent = codestudentt.trim();
    var namestudent = namestudentt.trim();
    var lastnamestudent = lastnamestudentt.trim();
    var cancle = false;


    if (namestudent.length == 0)
    {
        alert('กรุณากรอกชื่อ');
        document.form1.namestudent.focus();
        cancle = true;
    }
    else if (lastnamestudent.length == 0)
    {
        alert('กรุณากรอกนามสกุล');
        document.form1.lastnamestudent.focus();
        cancle = true;
    }
    else if (facultystudent.length == 0)
    {
        alert('กรุณาเลือกคณะ');
        cancle = true;
    }
    

    if (cancle == false)
    {



        $.ajax({
            url: 'info_stu_update.php',
            type: 'POST',
            data: {'codestudent': codestudent, 'namestudent': namestudent, 'lastnamestudent': lastnamestudent, 'facultystudent': facultystudent, 'gender': gender},
            success: function () {
                document.getElementById('codestudent2').value = "";
                document.getElementById('namestudent2').value = "";
                document.getElementById('lastnamestudent2').value = "";
                document.getElementById("ganderman2").checked = false;
                document.getElementById("genderwoman2").checked = false;
                document.getElementById('facultystudent2').value = "";
                document.getElementById("modifyshow").innerHTML = '<font color="green">บันทึกข้อมูลเรียบร้อย</font>';
                document.getElementById("codestudent2").disabled = false;
                document.getElementById("namestudent2").disabled = true;
                document.getElementById("lastnamestudent2").disabled = true;
                document.getElementById("ganderman2").disabled = true;
                document.getElementById("genderwoman2").disabled = true;
                document.getElementById("facultystudent2").disabled = true;
                $('#save2').hide();
                $('#modify').show();
                 document.getElementById("delete").disabled = true;
                 document.getElementById("modify").disabled = true;
                setTimeout(reload, 1000);
                
            }
        }); // end ajax call


    }

}
function reload()
{
    location.reload();
}

