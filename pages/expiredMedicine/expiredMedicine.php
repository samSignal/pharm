<?php

require_once '../../includes/session.php';

$page_title = "Expired Medicine";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}

ob_start();  // Start output buffering
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0">Manage <?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?></h6>
        
        <div class="d-flex align-items-center">
            <span class="me-3">Medicine expired FROM - TO</span> &nbsp;
            
            <form action="expiredMedicine.php" method="POST" class="row g-2 align-items-center">
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
        <?php require_once 'expiredMedSearch.php';?>
        <table class="table datatable-button-html5-tab">
            <thead>
                <tr>
                    <th>ID</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Expired On</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'expiredData.php';?>
            </tbody>
        </table>      
    </div>
</div>

<?php
$content = ob_get_clean();  // Capture the output and store it in $content
include '../../includes/layout.php';
