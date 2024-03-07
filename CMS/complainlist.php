<?php
session_start();




require_once("config.php");



$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


$sql = "SELECT complains.* , users.name AS user_name, category.name as category_name FROM complains 
            INNER JOIN users ON complains.`user_id` = users.`id`
            INNER JOIN category ON complains.`category` = category.`id` ;";

$rs = mysqli_query($con,$sql);



?>

<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.4.1
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Basic - Datatables - SmartAdmin v4.4.1
        </title>
        <meta name="description" content="Basic">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="css/datagrid/datatables/datatables.bundle.css">
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
               <?php require_once('leftmenu.php') ?>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                  <?php  require_once("header.php") ?>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <?php if(isset($_GET['msg'])) { ?>
                    <div class="alert alert-success" role="alert" style="font-size: 20px;text-align: center;">
                      <?php echo $_GET['msg'] ?>
                    </div>
                    <?php } ?>
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                            <li class="breadcrumb-item">Complain</li>
                            <li class="breadcrumb-item active">Complain Listing</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                       
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Complain <span class="fw-300"><i>Listing</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-primary btn-sm" data-toggle="dropdown" onclick="location.href='add_complain.php'">Add Complain</button>
                                            
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                         
                                            <!-- datatable start -->
                                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>User Name</th>
                                                        <th>Complain</th>
                                                        <th>Complain Detail</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Category</th>
                                                        <th>Assigned To</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
									            <tbody>
									        <?php
									        $count = mysqli_num_rows($rs);
									        for($i =0;$i<$count;$i++)
									        {
									            $row = mysqli_fetch_array($rs);
									            ?>
									            <tr>
									                <td><?php echo $row['id']?></td>
                                                  <td><?=$row['user_name']?></td>
                                                  <td><?php echo $row['complain']?></td>
                                                  <td><?php echo $row['detail']?></td>
                                                   <td><?php echo $row['date']?></td>
                                                   <td><?php echo $row['status']?></td>
                                                     <td><?php echo $row['category_name']?></td>
                                                     <td><?php echo $row['assigned_to']?></td>
 <td>
        <a href='updatecomplain.php?id=<?php echo $row['id']?>'>Edit</a> 
        | 
        <a href='deletecomplain.php?id=<?php echo $row['id']?>'>Delete</a>
        |
        <a href='complaindetail.php?id=<?php echo $row['id']?>'>Detail</a>
    </td>
								            </tr>
								       <?php }




										        ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                         <th>Id</th>
                                                         <th>User_Id</th>
                                                        <th>Complain</th>
                                                        <th>Complain Detail</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Category</th>
                                                        <th>Assigned To</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- datatable end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down fw-700">2020 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a></span>
                        </div>
                        <div>
                            <ul class="list-table m-0">
                                <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
                                <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
                                <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                                <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </footer>
                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                  
                    <!-- END Shortcuts -->
                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->
                  
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="page_login.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
                <i class="fal fa-sign-out"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
                <i class="fal fa-expand"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
                <i class="fal fa-print"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
                <i class="fal fa-microphone"></i>
            </a>
        </nav>
        <!-- END Quick Menu -->
        <!-- BEGIN Messenger -->
       
        <!-- END Messenger -->
       
        <!-- END Page Settings -->
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <!-- datatble responsive bundle contains: 
	+ jquery.dataTables.js
	+ dataTables.bootstrap4.js
	+ dataTables.autofill.js							
	+ dataTables.buttons.js
	+ buttons.bootstrap4.js
	+ buttons.html5.js
	+ buttons.print.js
	+ buttons.colVis.js
	+ dataTables.colreorder.js							
	+ dataTables.fixedcolumns.js							
	+ dataTables.fixedheader.js						
	+ dataTables.keytable.js						
	+ dataTables.responsive.js							
	+ dataTables.rowgroup.js							
	+ dataTables.rowreorder.js							
	+ dataTables.scroller.js							
	+ dataTables.select.js							
	+ datatables.styles.app.js
	+ datatables.styles.buttons.app.js -->
        <script src="js/datagrid/datatables/datatables.bundle.js"></script>
        <script>
            /* demo scripts for change table color */
            /* change background */


            $(document).ready(function()
            {
                $('#dt-basic-example').dataTable(
                {
                    responsive: true
                });

                $('.js-thead-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    console.log(theadColor);
                    $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
                });

                $('.js-tbody-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    console.log(theadColor);
                    $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
                });

            });

        </script>
    </body>
</html>
