<?php
$message = "";
if (isset($_GET['op']) and $_GET['op'] == 1) {
    $message = '<h6>O email informado já está cadastrado. Por favor informe um outro ou faça o login!</h6>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">

    <!-- bootstrap css -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Cadastro</title>
</head>
<body>
    <div class="titulo">
        <h1>Cadastre-se</h1>
    </div>
        <div class="container">
            <form method="POST" action="cadastrar.php">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome">Seu nome:</label>
                        <input type="text" class="form-control" name="nome" placeholder="ex. Arthur Diogo" maxlength="80" required>
                    </div>                
                </div>
        
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="endereco">Seu endereço e número:</label>
                        <input type="text" class="form-control" name="endereco" placeholder="ex. Rua Marize Barros 43" maxlength="120" required>
                    </div>                
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="complemento">Complemento:</label>
                        <input type="text" class="form-control" name="complemento" placeholder="ex. 99" required>
                    </div>                
                </div>       
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="numero">Número de telefone:</label>
                        <input type="text" class="form-control" name="telefone" placeholder="ex. (21)91232-4242" maxlength="15" required>
                    </div>                
                </div>      
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" name="cpf" placeholder="143.535.864-87" maxlength="14" required>
                    </div>                
                </div>       
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">E-mail:</label>
                        <?php echo "<br>".$message;?>
                        <input type="email" class="form-control" name="email" placeholder="ex. meuemail@gmail.com" required>
                    </div>                
                </div>       
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>                
                </div>       
                <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
            </form>
        </div>

    <!-- bootstrap bundle with popper -->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>