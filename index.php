<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        require_once 'config.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //loading only one object
            //$usuario = new Usuario();
            //$usuario->loadById(5);            
            //echo $usuario;
        
            //loading all objects
            //$list = Usuario::getList();
            
            //echo json_encode($list);
        
            //loading a list of users looking for login
        
            //$login = Usuario::search('a');
            //echo json_encode($login);
        
            //loading an user looking for login and senha
            //$usuario = new Usuario();
            //$usuario->login('lhsouzaa', 'jh2005');
            
            //echo $usuario;
        
            $aluno = new Usuario("teste", "newteste");
            //$aluno->setDeslogin("aluno");
            //$aluno->setDessenha("@lun0");

            $aluno->insert();

            echo $aluno;
        ?>
    </body>
</html>
