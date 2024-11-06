<?php

require_once '../../includes/session.php';


$page_title = "Customers List";

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
        
        <button type="button" class="btn btn-primary ms-auto" data-toggle="modal" data-target="#addCustomerModal">
            <i class="fa-solid fa-plus"></i> Add medicine
        </button>
</button>
    </div>

    <ul class="nav nav-tabs nav-tabs-highlight">
    </ul>

    <div class="card-body">
        <table class="table table-bordered datatable-button-html5-tab" id="Medicinelist">
            <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Age</th>
              <th scope="col">Gender</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </thead>
            <tbody>
              <?php require_once 'customerData.php'?>
            </tbody>
        </table>      
    </div>
</div>

<?php  require_once 'addCust.php';?>


<?php

require_once '../../includes/popmsg.php';
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

