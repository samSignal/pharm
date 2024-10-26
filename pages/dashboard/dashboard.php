<?php
$title = "Page Title";
ob_start();  // Start output buffering

?>

<h1>Welcome to the Page</h1>
<p>This is the main content of the page.</p>

<?php
$content = ob_get_clean();  // Capture the output and store it in $content

include '../../includes/layout.php';  // Include the layout, which will render $content in the correct place
