<?php
    class Usuario{
        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;
        
        function getIdusuario() {
            return $this->idusuario;
        }

        function getDeslogin() {
            return $this->deslogin;
        }

        function getDessenha() {
            return $this->dessenha;
        }

        function getDtcadastro() {
            return $this->dtcadastro;
        }

        function setIdusuario($idusuario) {
            $this->idusuario = $idusuario;
        }

        function setDeslogin($deslogin) {
            $this->deslogin = $deslogin;
        }

        function setDessenha($dessenha) {
            $this->dessenha = $dessenha;
        }

        function setDtcadastro($dtcadastro) {
            $this->dtcadastro = $dtcadastro;
        }

        public function loadById($id){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));
            if(count($result) > 0){
                
                $this->setData($result[0]);
            }
        }
        
        public static function getList(){
            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
        }
        
        public static function search($login){
            $sql = new Sql();
            
            return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH order by deslogin", array(
                ":SEARCH"=>"%" . $login . "%"
            ));
        }
        
        public function login($login, $password){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(":LOGIN"=>$login, ":PASSWORD"=>$password));
            if(count($result) > 0){
                //$row = $result[0];
                $this->setData($result[0]);
                
            }else{
                throw new Exception("Login e/ou senha inválidos.");
            }
        }
        
        public function setData($data){
            $this->setIdusuario($data['idusuario']);
            $this->setDeslogin($data['deslogin']);
            $this->setDessenha($data['dessenha']);
            $this->setDtcadastro(new DateTime($data['dtcadastro']));
            
        }
        
        public function insert(){
            $sql = new Sql();
            $result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
                ":LOGIN"=>$this->getDeslogin(),
                ":PASSWORD"=>$this->getDessenha()
            ));
            
            if(count($result) > 0){
                $this->setData($result[0]);
            }
        }
        
        public function update($login, $passord){
            
            $this->setDeslogin($login);
            $this->setDessenha($passord);
            $sql = new Sql();
            $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
                ":LOGIN"=>  $this->getDeslogin(), 
                ":PASSWORD"=>  $this->getDessenha(),
                ":ID"=>  $this->getIdusuario()
            ));
        }
        
        public function __construct($login = "", $password = ""){
            $this->setDeslogin($login);
            $this->setDessenha($password);
        } 
        
        public function __toString() {
            return json_encode(array(
                "idusuario"=>  $this->getIdusuario(),
                "deslogin"=>  $this->getDeslogin(),
                "dessenha"=>  $this->getDessenha(),
                "dtcadastro"=>  $this->getDtcadastro()->format("d/m/Y H:i:s")
            ));
        }
        
        
        
        
    }
?>


