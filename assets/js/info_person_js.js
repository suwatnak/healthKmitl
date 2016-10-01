
function display(text) {
    document.getElementById("messagesbutton").innerHTML = text;
}
function check_data(gender, namestudentt, lastnamestudentt, facultystudent)
{
    var namestudent = namestudentt.trim();
    var lastnamestudent = lastnamestudentt.trim();

    $.ajax({
        url: 'info_person_php.php',
        type: 'POST',
        data: {'functionName': 'checkdata', 'nameperson': namestudent, 'lastnameperson': lastnamestudent, 'gender': '', 'faculty': '', 'codeperson': ''},
        success: function (data) {
            check_data2(gender, namestudentt, lastnamestudentt, facultystudent, data.trim().length);


        }
    }); // end ajax call
}


function check_data2(gender, namestudent, lastnamestudent, facultystudent, data)
{
    var cancle = false;


    if (gender.length == 0)
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
    else if (data == 4)
    {
        alert('มีข้อมูลคุณ: ' + namestudent + ' ' + lastnamestudent + ' ในระบบแล้ว');
        cancle = true;
    }

    if (cancle == false)
    {

        $.ajax({
            url: 'info_person_php.php',
            type: 'POST',
            data: {'functionName': 'insertdata', 'nameperson': namestudent, 'lastnameperson': lastnamestudent, 'gender': gender, 'faculty': facultystudent, 'codeperson': ''},
            success: function () {
                display('<font color="green">บันทึกข้อมูลเรียบร้อย</font>');
                setTimeout(reload, 1000);
            }
        }); // end ajax call

    }
}
function reload()
{
    location.reload();
}