<?php
require_once './model/Rifa.php';
require_once './model/RifaDAO.php';

$rifaDAO = new RifaDAO(true);
if($rifaDAO){
  var_dump($rifaDAO);
}
else{
  var_dump($rifaDAO->getErro());
}
var_dump($rifaDAO->deleteById(1));