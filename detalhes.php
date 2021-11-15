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
    <link rel="stylesheet" href="style/style.css">

    <!-- responsividade -->
    <link rel="stylesheet" href="style/responsive.css">

    <!-- OWL CSS  -->
    <link rel="stylesheet" href="style/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl/owl.theme.default.min.css">

    <title>Cardápio PF Lanches</title>
</head>
<body>
    <header>
        <div class="container">
            <h2 class="logo">DETALHES</h2>
            <nav>
                <a href="#">Olá, <?php echo $_SESSION['nome'] ?></a>
                <a href="logout.php">Sair</a>
                <i class="fas fa-shopping-cart">(<?php echo $_SESSION['quantidade'] ?>)</i>
            </nav>
        </div>
    </header>

    <div class="tabelaDetalhes" style= 'background-color: black;'>
        <table class="tabela" border="1">
            <tr>
                <td>
                    <?php
                        $query="SELECT id, nome, descricao, valor, imagem FROM produtos WHERE id =".$_GET['id'];

                        $result = mysqli_query($conexao, $query);

                        $row = mysqli_num_rows($result);
                        $data = mysqli_fetch_row($result);
                    ?>
                    <img src="<?php echo $data[4]; ?>" alt="" style='height: 300px;'>
                </td>
                <td>
                    <br> <?php echo $data[1]; ?>
                    <br> <?php echo $data[2]; ?>
                    <br> R$ <?php echo $data[3]; ?>
                    <form method="post" action="pedidos.php">
                        <input name="quantidade" type="number">
                        <input name="produto_id" type="hidden" value="<?php echo $_GET['id'];?>">
                        <input name="valor" type="hidden" value="<?php echo $data[3];?>">
                        <input type="submit" value="Adicionar ao Carrinho">
                    </form>
                </td>
            </tr>
        </table>
    </div>




    <script src="https://kit.fontawesome.com/b6a87fb752.js" crossorigin="anonymous"></script> <!-- link para os icons -->    