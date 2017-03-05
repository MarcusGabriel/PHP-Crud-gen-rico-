<?php require 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8"/>
        <title>PHPOO COM PDO</title>
        <link rel="stylesheet" href="public/assets/css/semantic.css"/>
        <link rel="stylesheet" href="public/assets/css/custom.css"/>
        
    </head>
    <body>
        <div class="container">
            <?php 
                $user = new Acme\Models\UserModel;
                $cadastro = 0;
                $update = 0;
                // create
               
                if(isset($_POST['cadastrar']))
                    $cadastro = $user->create([
                        'name'      => $_POST['name'],
                        'email'     => $_POST['email'],
                        'password'  => $_POST['password'] 
                    ]);
                if($cadastro>0){
                    $mensagem = '<div class="ui positive message">
                                <i class="close icon"></i>
                                <div class="header">
                                    Alerta
                                </div>            
                                <p>Cadastro realizado com sucesso</p>
                                </div>';
                }
                
                /* delete
                $delete = $user->delete('id',1);
                dump($delete);
                */
                /* findBy
                $find = $user->findby('id',2);
                dump($find);
                */
                //update
                if( isset($_GET['edit']) && $_GET['edit'] == true)                   
                    $find = $user->findBy('id',$_GET['id']);
                    
                if(isset($_POST['atualizar']))
                    $update = $user->update($_GET['id'],[
                        'name'  => $_POST['name'],
                        'email' => $_POST['email'],
                    ]);
                if($update>0)
                    $mensagem = '<div class="ui positive message">
                                <i class="close icon"></i>
                                <div class="header">
                                    Alerta
                                </div>            
                                <p>Atualizado com sucesso</p>
                                </div>';
                //deletar
                if(isset($_GET['delete']) && $_GET['delete'] == true)  :
                    $delete = $user->delete('id',$_GET['id']);
                    header('Location: /');
                endif;
            ?>
            <h1>Hello World</h1>
            <?php require (isset($_GET['p'])) ? 'includes/'.$_GET['p'].'.php' : 'includes/home.php' ?>
        </div>
        <script src="public/assets/js/jquery-3.1.1.js"></script>
        <script src="public/assets/js/custom.js"></script>        
        <script src="public/assets/js/semantic.js"></script>
        
        
    </body>
</html>
