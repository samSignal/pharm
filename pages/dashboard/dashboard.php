<?php

require_once '../../includes/session.php';
require_once 'dashboardData.php';

$page_title = "Dashboard";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: ../../index.php');
    exit; // Stop further execution of the script
}

ob_start();  // Start output buffering

?>

<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard5 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $sales->fetchColumn() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs font-weight-bold">Total Sales Today</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-peso-sign fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $md_list->rowCount() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs">Medicine Stocks</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-file-prescription fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard2 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $md_expired->rowCount() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs font-weight-bold">Expired Medicine</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-pills fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard7 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $deliveries->rowCount() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs">Items in Storage</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-warehouse fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard3 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $manager->rowCount() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs">Total Managers</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-user-tie fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard4 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $staff->rowCount() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs">Total Staff</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-users fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-warning-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $supplier->rowCount() ?? 0; ?></h3>
                    <span class="text-uppercase font-size-xs">Total Suppliers</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-truck fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body card-dashboard8 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">300</h3>
                    <span class="text-uppercase font-size-xs">Returned Supply</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="fa-solid fa-box fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <canvas id="chart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="wrapp-dashboard  mt-4 d-flex sm-flex-column justify-content-between w-50" id="Chart">

<div id="chartContainer" class="ms-5">
      
</div>

<div id="graph" class="ms-5">
      
</div>

</div>




<?php
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

