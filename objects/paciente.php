<?php
class Paciente {
    private $tabela = "paciente";
    private $conn;
    
    private $id;
    private $nomecompleto;
    private $nomesocial;
    private $nomemae;
    private $nomepai;
    private $nascimento;
    private $sexo;
    private $rg;
    private $ufrg;
    private $cpf;
    private $email;
    private $datacriacao;
    private $dataalteracao;

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
        $query = $this->conn->prepare("INSERT INTO paciente(id, nomecompleto, nomesocial, nomemae, nomepai, nascimento, sexo, rg, ufrg, cpf, email, datacriacao, dataalteracao) 
                                       VALUES :id, :nomecompleto, :nomesocial, :nomemae, :nomepai, :nascimento, :sexo, :rg, :ufrg, :cpf, :email, :datacriacao, :dataalteracao)");

        $query->bindParam(':id',            $this->id);
        $query->bindParam(':nomecompleto',  $this->nomecompleto);
        $query->bindParam(':nomesocial',    $this->nomesocial);
        $query->bindParam(':nomemae',       $this->nomemae);
        $query->bindParam(':nomepai',       $this->nomepai);
        $query->bindParam(':nascimento',    $this->nascimento);
        $query->bindParam(':sexo',          $this->sexo);
        $query->bindParam(':rg',            $this->rg);
        $query->bindParam(':ufrg',          $this->ufrg);
        $query->bindParam(':cpf',           $this->cpf);
        $query->bindParam(':email',         $this->email);
        $query->bindParam(':datacriacao',   $this->datacriacao);
        $query->bindParam(':dataalteracao', $this->dataalteracao);

        $query->execute();

        return $query->rowCount();
    }

    public function update() {
        $query = $this->conn->prepare("UPDATE paciente SET id=:id, nomecompleto=:nomecompleto, nomesocial=:nomesocial, nomemae=:nomemae, 
                                      nomepai=:nomepai, nascimento=:nascimento, sexo=:sexo, rg=:rg, ufrg=:ufrg, cpf=:cpf, email=:email, 
                                      datacriacao=:datacriacao, dataalteracao=:dataalteracao WHERE id=:id");
        
        $query->bindParam(':id',            $this->id);
        $query->bindParam(':nomecompleto',  $this->nomecompleto);
        $query->bindParam(':nomesocial',    $this->nomesocial);
        $query->bindParam(':nomemae',       $this->nomemae);
        $query->bindParam(':nomepai',       $this->nomepai);
        $query->bindParam(':nascimento',    $this->nascimento);
        $query->bindParam(':sexo',          $this->sexo);
        $query->bindParam(':rg',            $this->rg);
        $query->bindParam(':ufrg',          $this->ufrg);
        $query->bindParam(':cpf',           $this->cpf);
        $query->bindParam(':email',         $this->email);
        $query->bindParam(':datacriacao',   $this->datacriacao);
        $query->bindParam(':dataalteracao', $this->dataalteracao);
        
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

	public function getNomecompleto(){
		return $this->nomecompleto;
	}

	public function setNomecompleto($nomecompleto){
		$this->nomecompleto = $nomecompleto;
	}

	public function getNomesocial(){
		return $this->nomesocial;
	}

	public function setNomesocial($nomesocial){
		$this->nomesocial = $nomesocial;
	}

	public function getNomemae(){
		return $this->nomemae;
	}

	public function setNomemae($nomemae){
		$this->nomemae = $nomemae;
	}

	public function getNomepai(){
		return $this->nomepai;
	}

	public function setNomepai($nomepai){
		$this->nomepai = $nomepai;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getRg(){
		return $this->rg;
	}

	public function setRg($rg){
		$this->rg = $rg;
	}

	public function getUfrg(){
		return $this->ufrg;
	}

	public function setUfrg($ufrg){
		$this->ufrg = $ufrg;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getDatacriacao(){
		return $this->datacriacao;
	}

	public function setDatacriacao($datacriacao){
		$this->datacriacao = $datacriacao;
	}

	public function getDataalteracao(){
		return $this->dataalteracao;
	}

	public function setDataalteracao($dataalteracao){
		$this->dataalteracao = $dataalteracao;
    } 
}
?>