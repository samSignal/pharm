<?php
    require_once '../../includes/session.php';
    require_once '../../includes/config.php';

    if(isset($_POST['submit'])){
        $date1 = htmlentities($_POST['firstdate']);
        $date2 = htmlentities($_POST['seconddate']);
        $newdate1 = date("M d,Y",strtotime($date1));
        $newdate2 = date("M d,Y",strtotime($date2));
  
        $expired = $pdo->prepare("SELECT * FROM medicinelist WHERE `exp_date` >= :date1 && `exp_date` <=:date2");
        $expired->bindValue(':date1',$date1);
        $expired->bindValue(':date2',$date2);
        ?>
        <h5 class="text-center d-flex justify-content-center mb-3">
            Medicines that expired from &nbsp; <span class="text-danger"><?php echo $newdate1; ?></span> &nbsp; to &nbsp; <span class="text-danger"><?php echo $newdate2; ?></span>
        </h5>

        <?php
     }else{
           $expired = $pdo->prepare("SELECT * FROM medicinelist WHERE (exp_date <= CURDATE())"); 
     }
     