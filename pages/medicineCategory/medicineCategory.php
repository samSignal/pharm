<?php

require_once '../../includes/session.php';

$page_title = "Medicine Category";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: ../../index.php');
    exit; // Stop further execution of the script
}

ob_start();  // Start output buffering

?>

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage <?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?></h6>
    </div>
    <ul class="nav nav-tabs nav-tabs-highlight">
    </ul>

    <div class="card-body">
        <table class="table datatable-button-html5-tab">
            <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Medtype</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
              <?php require_once 'medicineCategoryData.php'?>
            </tbody>
        </table>      
    </div>
</div>


<?php
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place
