<?php
$message = "";
if (isset($_GET['op']) and $_GET['op'] == 1) {
    $message = '<h4>Email ou senha incorretos! Tente novamente!</h4>';
}
if (isset($_GET['op']) and $_GET['op'] == 4) {
  $message = '<h4>Sua nova senha foi enviada para o seu email!</h4>';
}
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="login.css" />
</head>
<body>
  <div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
     
    <div class="content">    
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
          <img class="logo" src="img/logoprojetolanches.png" alt="">          
          <form method="post" action="login.php"> 
            <h1>Login</h1>
            <?php echo "<br>".$message;?>
            <p> 
              <label for="email">Seu email</label>
              <input id="email" name="email" type="text" placeholder="ex. meuemail@gmail.com" required/>
            </p>
            
            <p> 
              <label for="senha">Sua senha</label>
              <input id="senha" name="senha" type="password" required/> 
            </p>
            
            <p> 
              <a href="esquecisenha.php">Esqueceu sua senha?</a>
            </p>
            
            <p> 
              <input type="submit" value="Logar" /> 
            </p>
            
            <p class="link">
              Ainda não tem conta?
              <a href="cadastro.php">Cadastre-se</a>
            </p>
        </form>
      </div>
    </div>
  </div>  
</body>
</html>