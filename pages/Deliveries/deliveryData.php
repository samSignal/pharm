<?php 
require_once '../../includes/session.php';
require_once '../../includes/config.php';

if (!$pdo) {
    die("Database connection is not established.");
}

function insertDelivery($pdo) {
    try {
        $pname = htmlentities($_POST["pname"]);
        $qty = htmlentities($_POST["qty"]);
        $total = htmlentities($_POST["total"]);
        $supplier = htmlentities($_POST["Supplier"]);
        $ref = htmlentities($_POST["referrence"]);
        $date = htmlentities($_POST["xpdate"]);
        $staff = $_SESSION['first_name'];

        $insert = $pdo->prepare("INSERT INTO deliveries (Supplier_name, Refference_No, product, quantity, Total_purchased, Expiry_Date, Receive_by) 
            VALUES (:supplier, :ref, :pname, :qty, :total, :date, :staff)");

        $insert->bindParam(':supplier', $supplier);
        $insert->bindParam(':ref', $ref);
        $insert->bindParam(':pname', $pname);
        $insert->bindParam(':qty', $qty);
        $insert->bindParam(':total', $total);
        $insert->bindParam(':date', $date);
        $insert->bindParam(':staff', $staff);

        $insert->execute();
    } catch (PDOException $e) {
        echo "Error inserting delivery: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pro_code = htmlentities($_POST["procode"]);

    try {
        $stmt = $pdo->prepare("SELECT id, product_id, med_name, price FROM medicinelist WHERE product_id = :pro_code");
        $stmt->bindParam(':pro_code', $pro_code);
        $stmt->execute();

        $output = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $output[] = array(
                "id" => $row["id"],
                "product_code" => $row["product_id"],
                "productname" => $row["med_name"],
                "price" => $row["price"]
            );
        }

        echo json_encode($output);
    } catch (PDOException $e) {
        echo "Error fetching medicine data: " . $e->getMessage();
    }
}
?>
