<?php
 require_once '../../includes/session.php';
 require_once '../../includes/config.php';

 $transaction_count = $pdo->prepare("SELECT * FROM purchase WHERE (Date_purchased >= CURDATE()) GROUP BY Customer");
 $transaction_count->execute();
 echo $transaction_count->rowCount();
