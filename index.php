<?php require 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>PHP - Desvendando OO</title>
	
	<link rel="stylesheet" href="public/assets/css/semantic.css"/>
	<link rel="stylesheet" href="public/assets/css/custom.css"/>
    
	<!-- Bootstrap Core CSS -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/assets/css/logo-nav.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                </button>
                <a class="navbar-brand" style="padding-top: 0;"href="/encosis">
                    <img src="public/assets/img/logo.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/encosis">Home</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
        <div class="container">
        
            <?php 
                $user = new Acme\Models\UserModel;
                $cadastro = 0;
                $update = 0;
                // create
                
                if(isset($_POST['cadastrar']))
                    $cadastro = $user->create([
                        'name'      => $_POST['name'],
                        'email'     => $_POST['email']
                    ]);
                if( isset($_GET['edit']) && $_GET['edit'] == true)                   
                    $find = $user->findBy('id',$_GET['id']);
                    
                if(isset($_POST['atualizar'])) : 
                    $update = $user->update($_GET['id'],[
                        'name'  => $_POST['name'],
                        'email' => $_POST['email'],
                    ]);
                    header('Location: /encosis');
                endif;
                if(isset($_GET['delete']) && $_GET['delete'] == true)  :
                    $delete = $user->delete('id',$_GET['id']);
                    header('Location: /encosis');
                endif;
            ?>
            <?php require (isset($_GET['p'])) ? 'includes/'.$_GET['p'].'.php' : 'includes/home.php' ?>
        </div>

</body>

</html>
