<a href="index.php" class="ui blue button"> <i class="arrow left icon"></i>Voltar</a><br>
 <?php if( isset($_GET['edit']) && $_GET['edit'] == true): ?>
 <?php echo isset($mensagem) ? $mensagem : '' ?>
<form method="post" autocomplete="off" class="ui form">
    <label>User: </label>
    <input type="text" name="name" value="<?=$find->name?>" required autofocus placeholder="digite um nome: "/>
    <label>E-mail: </label>
    <input type="text" name="email" value="<?=$find->email?>" required placeholder="email"/>
    <input type="hidden" name="atualizar" value="<?=$find->email?>" required placeholder="email"/>
    <button type="submit" class="ui blue button"><i class="check green icon"></i>Atualizar</button>
    
</form>


<?php else: ?>
<hr> 
Escolhe um usuário para editar.
<?php endif; ?>