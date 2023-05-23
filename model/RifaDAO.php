<?php
require_once 'DataBase.php';
require_once 'Rifa.php';
class RifaDAO{
    private $pdo;
    private $erro;

    public function getErro(){
        return $this->erro;
    }

    public function __construct(){
        try {
            $this->pdo = (new DataBase())->connection();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(\PDOExcepyion $e){
            $this->erro = 'Erro ao conectar com o banco de dados' . $e->getMessage();
            die;
        }
    }

    public function insert(Rifa $rifa): Rifa|bool{
        $stmt = $this->pdo->prepare("INSERT INTO rifa(titulo, descricao, quant_num, valor, data_termino, tempo_reserva, fk_Usuario_id) VALUES (:titulo, :descricao, :quant_num, :valor, :data_termino, :tempo_reserva, :fk_Usuario_id)");
        $dados = [
            'titulo'            => $rifa->getTitulo(),
            'descricao'         => $rifa->getDescricao(),
            'quant_num'         => $rifa->getQuant_num(),
            'valor'             => $rifa->getValor(),
            'data_termino'      => $rifa->getData_termino(),
            'tempo_reserva'     => $rifa->getTempo_reserva(),
            'fk_Usuario_id'     => $rifa->getFk_Usuario_id()
        ];
        try{
            $stmt->execute($dados);
            return $this->selectById($this->pdo->lastInsertId());
        } catch (\PDOException $e) {
            $this->erro = 'Erro ao inserir o usuário: ' . $e->getMessage();
            return false;
        }
    }

    public function selectById($id): Rifa|bool{
        $stmt = $this->pdo->prepare("SELECT * FROM Rifa WHERE Rifa.id = :id");
        try {
            if($stmt->execute(['id'=>$id])){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return (new Rifa(true, $row['id'], $row['titulo'], $row['descricao'], $row['quant_num'], $row['valor'], $row['data_termino'], $row['tempo_reserva'], $row['fk_Usuario_id'], $row['creation_time'], $row['modification_time']));
            }
            return false;
        }
        catch (\PDOException $e) {
            $this->erro = 'Erro ao selecionar a rifa: ' . $e->getMessage();
            return false;
        }
    }
    
    public function listarTodos(){
        $cmdSql = "SELECT * FROM Rifa";
        $cx = $this->pdo->prepare($cmdSql);
        $cx->execute();
        if($cx->rowCount() > 0){
            $cx->setFetchMode(PDO::FETCH_CLASS, 'Rifa');
            return $cx->fetchAll();
        }
        return false;
    }

    public function select($filtro=""):array|bool{
        $cmdSql = 'SELECT * FROM rifa WHERE rifa.titulo LIKE :titulo OR rifa.descricao LIKE :descricao';
        try{
            $cx = $this->pdo->prepare($cmdSql);
            $cx->bindValue(':titulo',"%$filtro%");
            $cx->bindValue(':descricao',"%$filtro%");
            $cx->execute();
            $cx->setFetchMode(PDO::FETCH_CLASS, 'Rifa');
            return $cx->fetchAll();
        }
        catch(\PODException $e){
            $this->erro = 'Erro ao selecionar o usuário ' . $e->getMessage();
            return false;
        }
    }

    public function selectByTitulo($titulo=""){
        $stmt = $this->pdo->prepare("SELECT * FROM rifa WHERE rifa.titulo LIKE :titulo");
        $titulo = '%' . $titulo . '%';
        try{
            $stmt->execute(['titulo'=>$titulo]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Rifa');
        }catch(PDOException $e) {
            throw new Exception('Erro ao selecionar a rifa pelo nome: ' . $e->getMessage());
        }
    }
//update
    public function deleteById($id){
        $stmt = $this->pdo->prepare("DELETE FROM Rifa WHERE rifa.id = ?");
        try{
            $stmt->execute([$id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            throw new Exception('Erro ao excluir a rifa: ' . $e->getMessage());
        }
    }

    public function __destruct(){
        $this->pdo = null;
    }
}