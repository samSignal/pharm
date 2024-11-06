<?php
 require_once '../../includes/session.php';
 require_once '../../includes/config.php';


if(isset($_POST['submit'])){

    $name = htmlentities($_POST['name']);
    $age =  htmlentities($_POST['age']);
    $gender =  htmlentities($_POST['gender']);
    $address =  htmlentities($_POST['address']);

    $customer_insert = $pdo->prepare("INSERT INTO customer(name,age,gender,address) VALUES (:name,:age,:gender,:address)");
    $customer_insert->bindValue(':name',$name);
    $customer_insert->bindValue(':age',$age);
    $customer_insert->bindValue(':gender',$gender);
    $customer_insert->bindValue(':address',$address);
    $customer_insert->execute();
    $_SESSION['sucess-left'] = "Medicine added successfully";
    header('location:customer.php');
}
