<?php
$message = "";
if (isset($_GET['op']) and $_GET['op'] == 1) {
    $message = 'Email ou senha incorretos! Tente novamente!';
}
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Formulário de Login e Registro com HTML5 e CSS3</title>
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
      <?php echo "<br>".$message;?>
        <form method="post" action="login.php"> 
          <h1>Login</h1> 
          <p> 
            <label for="email">Seu email</label>
            <input id="email" name="email" required="required" type="text" placeholder="ex. meuemail@gmail.com"/>
          </p>
           
          <p> 
            <label for="senha">Sua senha</label>
            <input id="senha" name="senha" required="required" type="password"/> 
          </p>
           
          <p> 
            <input type="checkbox" name="manterlogado" id="manterlogado" value="" /> 
            <label for="manterlogado">Lembrar senha</label>
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