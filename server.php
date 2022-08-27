<?php 
   header('Content-Type: application/json; charset=utf-8');

   if($_POST['login'] && $_POST['phone_number']) {
      $data = [$_POST['login'],$_POST['phone_number'],'res'=>'good'];
      echo json_encode($data);
   } else {
      echo json_encode(['res'=>'falid']);
   }