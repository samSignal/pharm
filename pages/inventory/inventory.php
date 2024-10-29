<?php

require_once '../../includes/session.php';
require_once 'inventory_data.php';

$page_title = "Inventory";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: ../../index.php');
    exit; // Stop further execution of the script
}

ob_start();  // Start output buffering

?>
<div class="class">
     <p>Helloe</p>
</div>




<?php
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place

