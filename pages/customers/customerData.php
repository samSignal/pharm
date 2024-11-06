<?php 
    require_once '../../includes/config.php';
    $customer_data = $pdo->prepare("SELECT * FROM customer");
    $customer_data->execute();
    if($customer_data->rowCount() > 0){
    ?>
       <?php foreach($customer_data as $i => $customer):?>
            <tr>
                <td><?php echo $i+1?></td>
                <td><?php echo $customer->name?></td>
                <td><?php echo $customer->age?></td>
                <td><?php echo $customer->gender?></td>
                <td><?php echo $customer->address?></td>
                <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#customer<?php echo $customer->id;?>">
                <i class="fa-solid fa-trash"></i>  Delete
                </button>
                </td>
            </tr>
            <?php include '../../includes/modals.php';?>
        <?php endforeach?>
    <?php }
    else{

    }
?>

    