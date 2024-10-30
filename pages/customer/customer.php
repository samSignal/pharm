<?php

require_once '../../includes/session.php';


$page_title = "Customer";

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
    <div class="containerss d-flex flex-wrap justify-content-around">
        <div class="left d-flex mb-4 align-items-center" id="customerLocation" style="width: 48%;">
            <img src="https://cdn-icons.flaticon.com/png/512/1365/premium/1365700.png?token=exp=1657522440~hmac=979e545cc2ee3f61577599adbabd44d7" alt="">
            <span class="ms-3">
                <h5>Regular Customer Location</h5>
                <?php require_once 'custLocationData.php';?>
            </span>
        </div>

        <div class="right d-flex mb-4 align-items-center" id="customerLocation" style="width: 48%;">
            <img src="https://cdn-icons-png.flaticon.com/512/1484/1484584.png" alt="">
            <span class="ms-3">
                <h5>Regular Customers</h5>
                <?php require_once 'customerData.php';?>
            </span>
        </div>
    </div>

    <div class="containerss d-flex flex-wrap justify-content-around">
        <div class="left d-flex mb-4 align-items-center" id="customerLocation" style="width: 48%;">
            <img src="https://cdn-icons.flaticon.com/png/512/647/premium/647186.png?token=exp=1657522406~hmac=da90b4f351f51f64121a0aade2630664" alt="">
            <span class="ms-3">
                <h5>Most Bought Product</h5>
                <?php require_once 'mostBuy.php';?>
            </span>
        </div>

        <div class="right d-flex mb-4 align-items-center" id="customerLocation" style="width: 48%;">
            <img src="https://cdn-icons-png.flaticon.com/512/822/822143.png" alt="">
            <span class="ms-3">
                <h5>Least Bought Product</h5>
                <?php require_once 'leastBuy.php';?>
            </span>
        </div>
    </div>
</div>

</div>




<?php
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

