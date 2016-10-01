<?php if ($_SESSION['zzz'] == "doctor") { ?>
 
    <ul class="nav nav-list">
    	<li class="">
            <a href="Medical_stu_doctor.php">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> ตรวจนักศึกษา </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="Medical_person_doctor.php">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> ตรวจบุคลากร </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="dashboard.php">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> แดชบอร์ด </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a h
            ref="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    ข้อมูลผู้ป่วย
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="info_stu.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        นักศึกษา
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="info_person.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        บุคลากร
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>


        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> ข้อมูลโรค </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="info_disease.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        จัดการข้อมูลโรค
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="pair_disease_medicine.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        จัดชุดยาของโรค
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

    </ul>
<?php } else {
    ?>
    <ul class="nav nav-list">
    	<li class="">
            <a href="Medical_stu.php">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> ตรวจนักศึกษา </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="Medical_person.php">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> ตรวจบุคลากร </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="dashboard.php">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> แดชบอร์ด </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    ข้อมูลผู้ป่วย
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="info_stu.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        นักศึกษา
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="info_person.php" >
                        <i class="menu-icon fa fa-caret-right"></i>
                        บุคลากร
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">ข้อมูลยา </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="info_medicine.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        จัดการข้อมูลยา
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="inputmedicine.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        นำยาเข้าระบบ
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> ข้อมูลโรค </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="info_disease.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        จัดการข้อมูลโรค
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="pair_disease_medicine.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        จัดชุดยาของโรค
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa fa-list-alt"></i>
                <span class="menu-text"> ออกรายงาน </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="reportmedicine.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        รายงานข้อมูลยาคงเหลือ
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="reportinputmedicine.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                       รายงานนำยาเข้าระบบ
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="reportmedicineoutput.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        รายงานข้อมูลการจ่ายยา
                    </a>

                    <b class="arrow"></b>
                </li>
                
                 <li class="">
                    <a href="reportsummaryday.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        รายงานสรุป
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->        
<?php } ?>

