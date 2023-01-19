<!DOCTYPE html>
<html>
<head>
	<title>Acessar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>CONECTE-SE</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nome Usuário</label>
     	<input type="text" name="uname" placeholder="Nome Usuário"><br>

     	<label>Senha</label>
     	<input type="password" name="password" placeholder="Senha"><br>

     	<button type="submit">CONECTE-SE</button>
          <a href="signup.php" class="ca">Registrar</a>
     </form>
	 
</body>
</html>