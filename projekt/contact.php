<?php
session_start();
require_once 'libs/phpmailer/PHPMailerAutoload.php';

$errors =[];

if(isset($_POST['name'],$_POST['email'],$_POST['message'])){
    $fields=[
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'message'=>$_POST['message']
    ];
    foreach($fields as $field=>$data){
        if(empty($data)){
            $errors[]='The '.$field . ' field is required.';
        }
    }
    if(empty($errors)){
        $m=new PHPMailer;
        $m->isSMTP();
        $m->SMTPAuth=true;
        $m->Host='smtp.gmail.com';
        $m->Username='brunokralj2146@gmail.com';//zamjenit sa svojim mailom
        $m->Password='';//zamjenit sa svojom sifrom
        $m->SMTPSecure='ssl';
        $m->Port=587;

        $m->isHTML();
        $m->Subject ='Contact form Submitted';
        $m->Body='From:'.$fields['name'].'('.$fields['email'].')<p>'.$fields['message'].'</p>';

        $m->FromName='Contact';
        $m->AddAddress('brunokralj2146@gmail.com','Some one');
        if ($m->send()) {
            header('Location:thanks.php');
            die();
        }else{
            $errors[]="Nazalost, doslo je do greske,mail se ne moze poslati";
        }
    }
}else{
    $errors[]= 'Something went wrong';
}
$_SESSION['errors']=$errors;
$_SESSION['fields']=$fields;
header ('Location:forma.php');