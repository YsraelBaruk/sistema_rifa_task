<?php
require_once './model/UsuarioDAO.php';
require_once './model/Usuario.php';
require_once './model/RifaDAO.php';
require_once './model/Rifa.php';


$userDAO = new UsuarioDAO();
$rifaDAO = new RifaDAO(true);
// $consulta = $userDAO->select('');
// $result['result'] = false;
// $result['quant'] = 0;
// $result['dados'] = [];
// if($consulta){
//     $result['result'] = true;
//     $result['quant'] = sizeof($consulta);
//     $result['dados'] = $consulta;
// }
// echo json_encode($result);
//var_dump(new Rifa(true));
if($rifaDAO){
    var_dump($rifaDAO);
  }
  else{
    var_dump($rifaDAO->getErro());
}
var_dump($rifaDAO->selectById(129));