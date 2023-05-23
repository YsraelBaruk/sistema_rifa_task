<?php
require_once './model/Rifa.php';
require_once './model/RifaDAO.php';

$rifaDAO = new RifaDAO(true);

$rifa = $rifaDAO->selectByTitulo($rifa);
if($rifa){
  var_dump($rifa);
}
else{
  var_dump($rifaDAO->getErro());
}