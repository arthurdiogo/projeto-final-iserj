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

    <title>Cardápio PF Lanches</title>
</head>
<body>
    <header>
        <div class="container">
            <h2 class="logo">DETALHES</h2>
            <nav>
                <a href="home.php">Olá, <?php echo $_SESSION['nome'] ?></a>
                <a href="logout.php">Sair</a>
                <a href="fecharpedidos.php">
                <i class="fas fa-shopping-cart">(<?php if (empty($_SESSION['quantidade'])){ echo 0; }else echo $_SESSION['quantidade']; ?>)</i>
                </a>
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
                    <br> <h2> <?php echo $data[1]; ?> </h2>
                    <br> <?php echo $data[2]; ?>
                    <br> R$ <?php echo $data[3]; ?>
                    <form method="post" action="pedidos.php">
                        <input name="quantidade" type="number">
                        <input name="produto_id" type="hidden" value="<?php echo $_GET['id'];?>">
                        <input name="valor" type="hidden" value="<?php echo $data[3];?>">
                        <input class="botaoAdicionar" type="submit" value="Adicionar ao Carrinho">
                        <?php if (isset($_GET['op']) == 1) {
                        echo "<div class='alert'> Você digitou uma quantidade acima da disponível no nosso estoque! </div>";
                        echo "<div class='alert'> Por favor digite outra quantidade! </div>";
                        exit();
                    }
                    ?>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <script src="https://kit.fontawesome.com/b6a87fb752.js" crossorigin="anonymous"></script> <!-- link para os icons -->    

</body>
</html>