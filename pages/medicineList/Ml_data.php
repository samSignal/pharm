<?php 
require_once '../../includes/session.php';
require_once '../../includes/config.php';

      $data = $pdo->prepare("SELECT * FROM medicinelist");
      
      $data->execute();
      if($data->rowCount() > 0){
        ?>
            <!-- fecthing all the data from the database -->
            <?php $id=1; foreach($data as $i => $datas):
                 $date = $datas->exp_date;
                 $newdate = date("M d Y",strtotime($date));
              ?>
            <tr id="myUL">
            <!-- Displaying if the medicine need a prescription or not -->
            <td><?php echo $id++; ?></td>
           <td><?php echo $datas->product_id ?></td>
            <td class="p-2"><?php echo $datas->med_name;echo '  '; echo $datas->Unit; echo'</br>';
            if($datas->prescription == '' || $datas->prescription == null){}
            else{ ?> 
            <small class="badge rounded-pill text-bg-success p-1"><?php echo $datas->prescription;?></small>
            <?php }
            ?></td>

            <td><?php echo $datas->type  ?></td>
            <td><?php echo $datas->categories  ?></td>
            <td><?php echo "P".$datas->price  ?></td>
            <td><?php echo $datas->quantitypcs ?></td>
            <td><?php echo $newdate ?></td>
             
            <td>
              <a class="btn btn-outline-info btn-sm" 
                href="#" 
                data-bs-toggle="modal" 
                data-bs-target="#edit<?php echo $datas->id; ?>" 
                data-sme-id="<?php echo $datas->id; ?>" 
                style="padding: 0.25rem 0.5rem; font-size: 0.875rem; color: black ;">
                  <i class="fa-solid fa-pen-to-square"></i> Edit
              </a>
              
              <a class="btn btn-outline-danger btn-sm" 
                href="#" 
                data-bs-toggle="modal" 
                data-bs-target="#medicinelist<?php echo $datas->id; ?>" 
                data-sme-id="<?php echo $datas->id; ?>" 
                style="padding: 0.25rem 0.5rem; font-size: 0.875rem; color: black;">
                  <i class="fa-solid fa-trash"></i> Delete
              </a>
          </td>



      
           <?php include '../../includes/modals.php';?>
           <?php include 'editMed.php';?>
           </tr>
            <?php endforeach?>
        <?php }
        else{
          ?>
          <tr>
             <td colspan="8" style="height:50px;"><strong>No data found</strong></td>
         </tr>
     
      <?php
        }

         
?>