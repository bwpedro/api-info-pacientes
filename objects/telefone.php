<?php
class Telefone {
    private $tabela = "telefone";
    private $conn;
    
    private $id;
    private $numero;
    private $tipo;
    private $donotelefone;

    public function __construct($db = null) {
        $this->conn = $db;
    }

    public function read($id) {
        $query = null;

        if ($id == 'all') {
            $query = $this->conn->prepare("SELECT * from {$this->tabela}");
        } else {
            $query = $this->conn->prepare("SELECT * from {$this->tabela} where id=:id");
            $query->bindParam(':id', $id);
        }

        $query->execute();

        return $query;
    }

    public function create() {
        $query = $this->conn->prepare("INSERT INTO telefone(id, numero, tipo, donotelefone) VALUES :id, :numero, :tipo, :donotelefone");

        $query->bindParam(':id',           $this->id);
        $query->bindParam(':numero',       $this->numero);
        $query->bindParam(':tipo',         $this->tipo);
        $query->bindParam(':donotelefone', $this->donotelefone);

        $query->execute();

        return $query->rowCount();
    }

    public function update() {
        $query = $this->conn->prepare("UPDATE telefone SET numero=:numero, tipo=:tipo, donotelefone=:donotelefone WHERE id=:id");
        
        $query->bindParam(':id',           $this->id);
        $query->bindParam(':numero',       $this->numero);
        $query->bindParam(':tipo',         $this->tipo);
        $query->bindParam(':donotelefone', $this->donotelefone);
        
        $query->execute();

        return $query->rowCount();
    }

    public function delete() {
        $query = $this->conn->prepare("DELETE from {$this->tabela} WHERE id=:id");
        $query->bindParam(':id', $this->id);
        
        $query->execute();

        var_dump($query);
        echo $this->id;

        return $query->rowCount();
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getTipo(){
		return $this->tipo;
    }

    public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getDonotelefone(){
		return $this->donotelefone;
	}

	public function setDonotelefone($donotelefone){
		$this->donotelefone = $donotelefone;
	}
}
?>