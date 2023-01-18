<!DOCTYPE html>
<html>
<head>
	<title>Registar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Inscrever-se</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Nome</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Nome"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Nome Usuário</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Nome Usuário"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Nome Usuário"><br>
          <?php }?>


     	<label>Senha</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Senha"><br>

          <label>digita a senha novamente</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Senha"><br>

     	<button type="submit">Registar</button>
          <a href="index.php" class="ca">Já tem uma conta?</a>
     </form>
</body>
</html>