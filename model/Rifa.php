<?php

class Rifa {
    public int $id;
    public string $titulo;
    public string $descricao;
    public int $quant_num;
    public float $valor; //double
    public string $data_termino;
    public int $tempo_reserva;
    public int $fk_Usuario_id; //bigint
    public string $creation_time;
    public string $modification_time;
    
    public function __construct($c=0, $id=0, $titulo="", $descricao="", $quant_num=0, $valor="", $data_termino="", $tempo_reserva=0, $fk_Usuario_id="", $creation_time="", $modification_time=""){
        if($c){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->quant_num = $quant_num;
            $this->valor = $valor;
            $this->data_termino = $data_termino;
            $this->tempo_reserva = $tempo_reserva;
            $this->fk_Usuario_id = $fk_Usuario_id;
            $this->creation_time = $creation_time;
            $this->modification_time = $modification_time;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this-> titulo = $titulo;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this-> descricao = $descricao;
    }

    public function getQuant_num(){
        return $this->quant_num;
    }

    public function setQuant_num($quant_num){
        $this-> quant_num = $quant_num;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this-> valor = $valor;
    }

    public function getData_termino(){
        return $this->data_termino;
    }

    public function setData_termino($data_termino){
        $this-> data_termino = $data_termino;
    }

    public function getTempo_reserva(){
        return $this->tempo_reserva;
    }

    public function setTempo_reserva($tempo_reserva){
        $this-> tempo_reserva = $tempo_reserva;
    }

    public function getFk_Usuario_id(){
        return $this->fk_Usuario_id;
    }

    public function setFk_Usuario_id($fk_Usuario_id){
        $this-> fk_Usuario_id = $fk_Usuario_id;
    }

    public function getCreation_time(){
        return $this->creation_time;
    }

    public function setCreation_time($creation_time){
        $this-> creation_time = $creation_time;
    }

    public function getModification_time(){
        return $this->modification_time;
    }

    public function setModification_time($modification_time){
        $this-> modification_time = $modification_time;
    }
}