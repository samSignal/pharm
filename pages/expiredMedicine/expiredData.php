<?php
require_once '../../includes/session.php';
require_once '../../includes/config.php';

// Define the query to select expired medicines
$expired = $pdo->prepare("SELECT * FROM medicinelist WHERE exp_date <= CURDATE()");
$expired->execute();

if($expired->rowCount() > 0){
?>
    <?php foreach($expired as $i => $med): 
           $date = $med['exp_date'];
           $newdate = date("M d, Y", strtotime($date));
        ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo htmlspecialchars($med['med_name']); ?></td>
            <td><?php echo htmlspecialchars($med['Unit']); ?></td>
            <td><?php echo htmlspecialchars($med['quantitypcs']); ?></td>
            <td><?php echo $newdate; ?></td>
        </tr>
    <?php endforeach; ?>
<?php
} else {
?>
    <tr>
        <td colspan="5" style="text-align: center;">No data found</td>
    </tr>
<?php
}
?>
