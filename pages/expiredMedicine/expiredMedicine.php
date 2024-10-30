<?php

require_once '../../includes/session.php';

$page_title = "Expired Medicine";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: ../../index.php');
    exit; // Stop further execution of the script
}

ob_start();  // Start output buffering

?>

<div class="card w-75 mt-5 mx-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title">Manage <?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?></h6>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text me-3">Medicine expired FROM - TO</span>
            </div>
            <form action="expiredMedicine.php" method="POST" class="d-flex align-items-center">
                <input type="date" class="form-control p-1 me-3" name="firstdate">
                <input type="date" class="form-control p-1 me-3" name="seconddate">
                <input type="submit" class="btn btn-success btn-md" name="submit" value="Filter">
            </form>
        </div>
    </div>

    <div class="card-body">
        <?php require_once 'expiredMedSearch.php'; ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="xpmed">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Expired On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once 'expiredData.php'; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

