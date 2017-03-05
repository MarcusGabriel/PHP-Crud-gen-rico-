<h2 class="verde"><i class="user icon"></i>Cadastrar User</h2>
<?php echo isset($mensagem) ? $mensagem : '' ?>
<form method="post" autocomplete="off" class="ui form">
    <label>User: </label>
    <input type="text" name="name" required autofocus placeholder="digite um nome: "/>
    <label>E-mail: </label>
    <input type="text" name="email" required placeholder="email"/>
    <label>Password: </label>
    <input type="password" name="password" required/>    
    <input type="hidden" name="cadastrar"/>    
    <button type="submit" class="ui blue button"><i class="check green icon"></i>Cadastrar</button>
    
</form>

<div class='ui divider'></div>

<?php
    $user = new Acme\Models\UserModel;
    $users = $user->read();
?>

<table border = "100%" class='ui green table'>
    <thead class='center aligned'>
        <tr>
            <td>User </td>
            <td>email </td>
            <td>Editar</td>
            <td>Deletar</td>
        </tr>
    </thead>
    <tbody class='center aligned'>
        <?php foreach($users as $u) : ?>
        <tr>
            <td> <?=$u->name?> </td>
            <td> <?=$u->email?> </td>
            <td><a href="?p=editar&edit=true&id=<?=$u->id?>"><button class='ui green button'><i class="ui edit icon" ></i>E</button></a></td>        
            <td><a href="?delete=true&id=<?=$u->id?>"><button class='ui red button'><i class='ui delete icon'></i>D</button></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>