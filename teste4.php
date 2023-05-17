<?php
require_once './model/UsuarioDAO.php';
require_once './model/Usuario.php';
require_once './model/RifaDAO.php';
require_once './model/Rifa.php';


$userDAO = new UsuarioDAO();
$rifaDAO = new RifaDAO();

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

var_dump(new Rifa(true));
var_dump($rifaDAO->select('rifa'));