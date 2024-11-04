<?php
    require_once '../../includes/config.php';
   
   
   $expired->execute();
   if($expired->rowCount() > 0){
   ?>
      <?php foreach($expired as $i => $med):
             $date = $med->exp_date;
            $newdate = date("M d Y",strtotime($date));
         ?>
           <tr>
              <td><?php echo $i+1 ?></td>
              <td><?php echo $med->med_name ?></td>
              <td><?php echo $med->Unit ?></td>
              <td><?php echo $med->quantitypcs ?></td>
              <td><?php echo $newdate ?></td>
           </tr>
       <?php endforeach?>

   <?php }
   else{
        ?>


       
        <?php
   }

?>