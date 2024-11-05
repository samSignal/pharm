<?php

require_once '../../includes/session.php';



$page_title = "Transactions";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: ../../index.php');
    exit; // Stop further execution of the script
}

ob_start();  // Start output buffering

?>

<div class="card w-50" id="transaction">
    <div class="card-body  d-flex justify-content-between text-white">
        <div class="left ">
            <h3>Total Transaction today</h3>
            <h4><?php require_once 'transactionlinks.php';?></h4>
        </div>
        
        <div class="right text-white">
        <i class="fa-solid fa-receipt"></i>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline d-flex justify-content-between">
        <h6 class="card-title"><?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?></h6>
    </div>

    <ul class="nav nav-tabs nav-tabs-highlight">
    </ul>

    <div class="card-body">
        <table class="table table-sm table-bordered datatable-button-html5-tab" id="Medicinelist">
            <thead>
            <tr>
              <th scope="col">No.</th>  
              <th scope="col">Staff name</th>
              <th scope="col">Products Sold</th>
              <th scope="col">Total Sold</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
              <?php require_once 'transactiondata.php';?>
            </tbody>
        </table>      
    </div>
</div>

<?php
require_once 'transactionview.php';
require_once '../../includes/popmsg.php';
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

