<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}

if (empty($_SESSION['pedido_id'])) {
    header('Location: home.php');
}

include('conexaolog.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fecharpedidos.css">

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
                <a href="#">
                <i class="fas fa-shopping-cart">(<?php if (empty($_SESSION['quantidade'])){ echo 0; }else echo $_SESSION['quantidade']; ?>)</i>
                </a>
            </nav>
        </div>
    </header>

    <h2 class="tey">Itens selecionados</h2>
    
    <div class="container">
        <div class="col-md-6">
            <?php
                $query="SELECT p.nome, i.valor, i.quantidade, i.id FROM itens i
                INNER JOIN produtos p ON i.produto_id = p.id WHERE pedido_id =".$_SESSION['pedido_id'];

                $result = mysqli_query($conexao, $query);

                $row = mysqli_num_rows($result);
                $data = mysqli_fetch_all($result);

            ?>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                        <?php
                                $soma = 0;
                                foreach ($data as $item) { ?>
                                <tr>
                                    <td><?php echo $item[0];?></td>
                                    <td><?php echo $item[1]?></td>
                                    <td><?php echo $item[2]?></td>
                                    <td>
                                        <?php 
                                            $calculo = $item[1] * $item[2];
                                            $soma += $calculo; 
                                            echo 'R$'. number_format($calculo,2,',','.');

                                        ?>
                                    </td>
                                    <td><button class="btn btn-danger btn-block"><a href="excluiritem.php?item_id=<?php echo $item[3]; 
                                    ?>" style="color:inherit; text-decoration:none">Excluir</a></button></td>
                                </tr>    
                                <?php
                                }
                        ?>
                    <tr>
                        <td colspan="2"></td>
                        <td><b>Valor Total:</b></td>
                        <td><?php echo 'R$'. number_format($soma,2,',','.'); ?></td>
                    </tr>
                <table>
                <button class="btn btn-success btn-block"><a href="finalizarpedido.php?op=1"
                style="text-decoration:none; color:inherit">Finalizar pedido</a></button>
                </table>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b6a87fb752.js" crossorigin="anonymous"></script> <!-- link para os icons -->    
</body>
</html>