<?php
require_once '../../includes/session.php';
require_once '../../includes/config.php';

$products = $pdo->prepare('SELECT * FROM medicinelist GROUP BY med_name');
$products->execute();

$dataRows = []; // Initialize an array to store the data

if ($products->rowCount() > 0) {
    foreach ($products as $items) {
        $pname = $items->med_name;

        // Get stocks out
        $stocks_out = $pdo->prepare("SELECT SUM(quantity) FROM purchase WHERE Product = :pname");
        $stocks_out->bindValue(':pname', $pname);
        $stocks_out->execute();
        $data_out = $stocks_out->fetchColumn() ?: 0; // Use 0 if null

        // Get stocks in
        $stocks_in = $pdo->prepare("SELECT SUM(quantity) FROM deliveries WHERE Product = :pname");
        $stocks_in->bindValue(':pname', $pname);
        $stocks_in->execute();
        $data_in = $stocks_in->fetchColumn() ?: 0; // Use 0 if null

        // Get expired products
        $xp = $pdo->prepare("SELECT SUM(quantitypcs) FROM medicinelist WHERE (exp_date <= CURDATE()) AND med_name = :pname");
        $xp->bindValue(':pname', $pname);
        $xp->execute();
        $data_xp = $xp->fetchColumn() ?: 0; // Use 0 if null

        // Get total quantity
        $quant = $pdo->prepare("SELECT SUM(quantitypcs) FROM medicinelist WHERE med_name = :pname");
        $quant->bindValue(':pname', $pname);
        $quant->execute();
        $data_quant = $quant->fetchColumn() ?: 0; // Use 0 if null

        // Calculate stocks
        $stocks = $data_in + $data_quant;

        // Store the data in the array
        $dataRows[] = [
            'pname' => $pname,
            'data_in' => $data_in,
            'data_out' => $data_out,
            'data_xp' => $data_xp,
            'stocks' => $stocks,
        ];
    }
}

// Now you can handle the output as needed
// For example, if you want to display it in a table:
?>

