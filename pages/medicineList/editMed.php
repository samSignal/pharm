<?php
    require_once '../../includes/config.php';
    require_once '../../includes/session.php';
    
    if (isset($SESSION['id']))
    {
        $id = $SESSION['id'];
        $data = $pdo->prepare("SELECT * FROM medicinelist WHERE id=:id");
        $data->bindValue(":id",$id);
        $data->execute();             
           
    }