<?php
$message = "";
if (isset($_GET['op']) and $_GET['op'] == 2) {
    $message = '<h6>O email informado não está cadastrado no sistema!</h6>';
}
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Esqueci minha senha</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="login.css" />
</head>
<body>
  <div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
     
    <div class="content">      
      <div id="login">
        <form method="post" action="enviaemailsenha.php"> 
          <h1>Recupere sua senha</h1> 
          <p> 
            <label for="emailRecuperacao">Seu email</label>
            <input id="email" name="emailRecuperacao" type="email" placeholder="ex. meuemail@gmail.com" required/>
          </p>
          <?php echo "<br>".$message;?> 
          <p> 
            <input type="submit" value="Enviar email de recuperação"/> 
          </p>
        </form>
      </div>
    </div>
  </div>  
</body>
</html>