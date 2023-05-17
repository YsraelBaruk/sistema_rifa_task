<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
<form method="post">
  <label for="titulo">Titulo:</label>
  <input type="text" id="titulo" name="titulo" required>
  <br>
  <label for="descricao">Descricao:</label>
  <input type="text" id="descricao" name="descricao" required>
  <br>
  <label for="quant_num">Quantidade de Números:</label>
  <input type="number" id="quant_num" name="quant_num" required>
  <br>
  <label for="valor">Valor:</label>
  <input type="number" id="valor" name="valor" step="0.01">
  <br>
  <label for="data_termino">Data Final:</label>
  <input type="date" id="data_termino" name="data_termino">
  <br>
  <label for="tempo_reserva">Tempo reserva:</label>
  <input type="number" id="tempo_reserva" name="tempo_reserva">
  <br>
  <input type="submit" value="Cadastrar">
</form>
    <?php
    require_once 'model/RifaDAO.php';
    require_once 'model/Rifa.php';
    // verifica se os dados foram enviados pelo formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // obtém os dados do formulário
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $quant_num = $_POST['quant_num'];
        $valor = $_POST['valor'];
        $data_termino = $_POST['data_termino'];
        $tempo_reserva = $_POST['tempo_reserva'];
    
      // cria um novo objeto Usuario com os dados do formulário
      //$usuario = new Usuario(0, $email, $senha, $nome, $foto, $tel, $endereco, $cpf, "", "");
      $rifa = new Rifa(true, 0, $titulo, $descricao, $quant_num, $valor, $data_termino, $tempo_reserva, 131, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
      
      // var_dump($usuario);
      

      // cria um novo objeto UsuarioDAO e insere o novo usuário no banco de dados
      //  $usuarioDAO = new UsuarioDAO();
      // $usuario = $usuarioDAO->insert($usuario);
      $rifaDAO = new RifaDAO(true);
      $rifa = $rifaDAO->insert($rifa);
      if($rifa){
        var_dump($rifa);
      }
      else{
        var_dump($rifaDAO->getErro());
      }
    }
    $rifaDAO = new RifaDAO(true);
    var_dump($rifaDAO->select('Eletr'));
    ?>
</body>
</html>