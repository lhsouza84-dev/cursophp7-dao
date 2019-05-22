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
            $usuario = new Usuario();
            $usuario->loadById(5);
            
            echo $usuario;
        ?>
    </body>
</html>
