<?php

require_once '../../includes/session.php';

$page_title = "Sales Summary";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}

ob_start();  // Start output buffering
?>
<div class="wrap d-flex align-items-center justify-content-center">
<div class="card w-75 mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0">Manage <?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?></h6>
        
        <div class="d-flex align-items-center">
            <span class="me-3">Select Sales FROM - TO</span> &nbsp;
            
            <form action="salesSummary.php" method="POST" class="row g-2 align-items-center">
                <div class="col-auto">
                    <input type="date" class="form-control" name="firstdate" placeholder="From date">
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="seconddate" placeholder="To date">
                </div>
                <div class="col-auto">
                    <input type="submit"  class="btn btn-success btn-md" name="submit">
                </div>
            </form>
        </div>
    </div>

    <ul class="nav nav-tabs nav-tabs-highlight">
    </ul>

    <div class="card-body">
      <?php require_once 'salesSummaryData.php';?>
      <div class="sales-data d-flex justify-content-between mt-5">
        <div class="leftsales d-flex">
            <img src="https://cdn-icons.flaticon.com/png/512/3271/premium/3271314.png?token=exp=1657507040~hmac=5b87d7922c67496a87f9ee38e532abdb" 
            >
            <span class="flex-column ms-3">
                <h2 class="text-secondary">Sales</h2>
                 <h1 class="text-primary mt-5"><i class="fa-solid fa-peso-sign"></i> 
                <?php echo $_SESSION['sales'] ?? '0'; unset( $_SESSION['sales'])?></h1>
            </span>
            
        </div>

        <div class="leftsales d-flex">
            <img src="https://cdn-icons.flaticon.com/png/512/2314/premium/2314511.png?token=exp=1657506980~hmac=078ff0b584513329b5c2785a3e2d3006" 
            >
            <span class="flex-column ms-3">
                <h2 class="text-secondary">Quantity sold</h2>
                 <h1 class="text-primary mt-5">
                 <?php echo  $_SESSION['quantity'] ?? '0'; unset($_SESSION['quantity'])?></h1>
            </span>
            
        </div>
      </div>
   
    </div>
</div>
</div>

<?php
$content = ob_get_clean();  // Capture the output and store it in $content
include '../../includes/layout.php';
