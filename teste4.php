<?php
require_once './model/UsuarioDAO.php';
require_once './model/Usuario.php';
require_once './model/RifaDAO.php';
require_once './model/Rifa.php';

$userDAO = new UsuarioDAO(true, 129, 'lucas@gmail.com', 'senha', 'Lucas', 'foto.png', '110', 'rua', '1290', '', 'CURRENT_TIMESTAMP');
$usuario = new UsuarioDAO();
$user = $userDAO->update($userDAO);
if($user){
    var_dump($user);
  }
  else{
    var_dump($userDAO->getErro());
}
// $rifaDAO = new RifaDAO(true);
// $rifa = $rifaDAO->update();
// if($rifaDAO){
//     var_dump($rifaDAO);
//   }
//   else{
//     var_dump($rifaDAO->getErro());
// }