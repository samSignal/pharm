<?php

require_once '../../includes/session.php';
require_once 'medADDlist.php';


$page_title = "Medicine List";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: ../../index.php');
    exit; // Stop further execution of the script
}

ob_start();  // Start output buffering

?>

<div class="card">
    <div class="card-header header-elements-inline d-flex justify-content-between">
        <h6 class="card-title"><?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?></h6>
        
        <button type="button" class="btn btn-primary ms-auto" data-toggle="modal" data-target="#addMedicineModal">
            <i class="fa-solid fa-plus"></i> Add medicine
        </button>
</button>
    </div>

    <ul class="nav nav-tabs nav-tabs-highlight">
    </ul>

    <div class="card-body">
        <table class="table datatable-button-html5-tab" id="Medicinelist">
            <thead>
            <tr>
                <th>No.</th>
                <th scope="col">Product ID</th>
                <th scope="col">Brand</th>
                <th scope="col">Type</th>
                <th scope="col">Categories</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Expired Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
              <?php require_once 'Ml_data.php'?>
            </tbody>
        </table>      
    </div>
</div>

<?php require_once 'Addmed.php'; ?>


<?php

require_once '../../includes/popmsg.php';
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

