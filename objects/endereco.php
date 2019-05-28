<?php
class Endereco {
    private $tabela = "endereco";
    private $conn;
    
    private $id;
    private $tipo;
    private $cep;
    private $uf;
    private $cidade;
    private $bairro;
    private $logradouro;
    private $numero;
    private $complemento;
    private $donoendereco;

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
        $query = $this->conn->prepare("INSERT INTO telefone(id, tipo, cep, uf, cidade, bairro, logradouro, numero, complemento, donoendereco) 
                                       VALUES :id, :tipo, :cep, :uf, :cidade, :bairro, :logradouro, :numero, :complemento, :donoendereco");

        $query->bindParam(':id',           $this->id);
        $query->bindParam(':tipo',         $this->tipo);
        $query->bindParam(':cep',          $this->cep);
        $query->bindParam(':uf',           $this->uf);
        $query->bindParam(':cidade',       $this->cidade);
        $query->bindParam(':bairro',       $this->bairro);
        $query->bindParam(':logradouro',   $this->logradouro);
        $query->bindParam(':numero',       $this->numero);
        $query->bindParam(':complemento',  $this->complemento);
        $query->bindParam(':donoendereco', $this->donoendereco);

        $query->execute();

        return $query->rowCount();
    }

    public function update() {
        $query = $this->conn->prepare("UPDATE telefone SET tipo=:tipo, cep=:cep, uf=:uf, cidade=:cidade, bairro=:bairro, logradouro=:logradouro, 
                                              numero=:numero, complemento=:complemento, donoendereco=:donoendereco WHERE id=:id");
        
        $query->bindParam(':id',           $this->id);
        $query->bindParam(':tipo',         $this->tipo);
        $query->bindParam(':cep',          $this->cep);
        $query->bindParam(':uf',           $this->uf);
        $query->bindParam(':cidade',       $this->cidade);
        $query->bindParam(':bairro',       $this->bairro);
        $query->bindParam(':logradouro',   $this->logradouro);
        $query->bindParam(':numero',       $this->numero);
        $query->bindParam(':complemento',  $this->complemento);
        $query->bindParam(':donoendereco', $this->donoendereco);
        
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

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getUf(){
		return $this->uf;
	}

	public function setUf($uf){
		$this->uf = $uf;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getLogradouro(){
		return $this->logradouro;
	}

	public function setLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getComplemento(){
		return $this->complemento;
	}

	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	public function getDonoendereco(){
		return $this->donoendereco;
	}

	public function setDonoendereco($donoendereco){
		$this->donoendereco = $donoendereco;
	}
}
?>