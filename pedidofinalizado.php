<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}

include('conexaolog.php');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pedidofinalizado.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- responsividade -->
    <link rel="stylesheet" href="style/responsive.css">

    <title>Cardápio PF Lanches</title>
</head>
<body>
    <header>
        <div class="container">
            <h2 class="logo">PEDIDO</h2>
            <nav>
                <a href="home.php">Olá, <?php echo $_SESSION['nome'] ?></a>
                <a href="logout.php">Sair</a>
                <a href="fecharpedidos.php">
                <i class="fas fa-shopping-cart">(<?php if (empty($_SESSION['quantidade'])){ echo 0; }else echo $_SESSION['quantidade']; ?>)</i>
                </a>
            </nav>
        </div>
    </header>

    <h2 class="tey">Pedido Finalizado</h2>

    <div class="borda">
        <h4>Seu pedido foi finalizado com sucesso!</h4>
        <br> O número do seu pedido é <b><?php echo $_GET['pedido_id']; ?>
    </b>. Entre em contato conosco pelo whatsapp e informe o número do seu pedido para efetuar o pagamento!
    </div>
    <br><button class="btn btn-success btn-block"><a href="https://wa.me/5521993442846" 
    style="text-decoration:none; color:inherit">Efetuar pagamento</a></button>


    <script src="https://kit.fontawesome.com/b6a87fb752.js" crossorigin="anonymous"></script> <!-- link para os icons --> 
</body>
</html>