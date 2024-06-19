<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Admin </title>
</head>

<body>
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">LOGO</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item ">
                <a href="index.php">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-user-star-fill sidebar-menu-item-icon"></i>
                    Staffs
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="addstaff.php">
                             Add Staff 
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item has-dropdown">
                        <a href="#">
                            Staff List
                            <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                        </a>
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-menu-item">
                                <a href="stafflist.php">
                                    All Staff
                                </a>
                            </li>
                            <li class="sidebar-dropdown-menu-item">
                                <a href="stafffilter.php">
                                    Filter Staff
                                </a>
                            </li>
                        </ul>
                    </li>
                  
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                   
                    <i class="ri-team-fill sidebar-menu-item-icon"></i>
                    Students
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="studentregistration.php">
                            Student Registration
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="studentadmission.php">
                            Student Admission
                        </a>
                    </li>
                </ul>
            </li>
           
            
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <main class="bg-light">
        <div class="p-2">