<?php

session_start();

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
            <h2 class="logo">CARDÁPIO</h2>
                <?php 
                    if (!empty($_SESSION['nome'])) {
                ?>
                    <nav>
                        <a href="#">Olá, <?php if (empty($_SESSION['nome'])){ echo "";}else echo $_SESSION['nome']; ?></a>
                        <a href="logout.php">Sair</a>
                        <a href="fecharpedidos.php">
                        <i class="fas fa-shopping-cart">(<?php if (empty($_SESSION['quantidade'])){ echo 0; }else echo $_SESSION['quantidade']; ?>)</i>
                        </a>
                        </nav>
                <?php } ?>
        </div>
    </header>
    
    <div class="carrosel-lanches">
        <div class="owl-carousel owl-theme">

            <?php
            
            $query="SELECT id, nome, imagem FROM produtos WHERE categorias = 1 AND quantidade > 0 ";

            $result = mysqli_query($conexao, $query);
            $data = mysqli_fetch_all($result);

            foreach ($data as $item) { ?>
                <div class="item">
                    <h3 align="center"><?php echo $item[1]; ?></h3>
                    <img class="box-cardapio" src="<?php echo $item[2];  ?>" alt="" srcset="">
                    
                    <a class="botaovivo" style="color:#f7c53b; text-decoration:none;" href="detalhes.php?id=<?php echo $item[0] ?>">Comprar</a>
                </div>      
            <?php
            }
            ?>
        </div>
    </div>

    <div class="carrosel-lanches">
        <div class="owl-carousel owl-theme">
        <?php
            
            $query="SELECT id, nome, imagem FROM produtos WHERE categorias =2 AND quantidade > 0 ";

            $result = mysqli_query($conexao, $query);
            $data = mysqli_fetch_all($result);

            foreach ($data as $item) { ?>
                <div class="item">
                    <h3 align="center"><?php echo $item[1]; ?></h3>
                    <img class="box-cardapio" src="<?php echo $item[2];  ?>" alt="" srcset=""></a>
                    <a class="botaovivo" style="color:#f7c53b; text-decoration:none;" href="detalhes.php?id=<?php echo $item[0] ?>">Comprar</a>
                </div>
            <?php                    
            }
            ?> 
        </div>
    </div>

    <div class="carrosel-lanches">
        <div class="owl-carousel owl-theme">
        <?php
            
            $query="SELECT id, nome, imagem FROM produtos WHERE categorias =3 AND quantidade > 0 ";

            $result = mysqli_query($conexao, $query);
            $data = mysqli_fetch_all($result);

            foreach ($data as $item) { ?>
                <div class="item">
                    <h3 align="center"><?php echo $item[1]; ?></h3>
                    <img class="box-cardapio" src="<?php echo $item[2];  ?>" alt="" srcset=""></a>
                    <a class="botaovivo" style="color:#f7c53b; text-decoration:none;" href="detalhes.php?id=<?php echo $item[0] ?>">Comprar</a>
                </div>
            <?php                    
            }
            ?>
        </div>
    </div>
    
    <footer class="partebaixo">
            <button role="button" class="botao">
                <i class="fas fa-info-circle"></i> <!-- link do icon -->
                <a class="botaovivo" href="contato.html" target="_blank">RECLAMAÇÃO OU SUGESTÃO</a>
            </button>
        </div>
    </footer>


    <script src="https://kit.fontawesome.com/b6a87fb752.js" crossorigin="anonymous"></script> <!-- link para os icons -->
    <script src="js/owl/jquery.min.js"></script>
    <script src="js/owl/owl.carousel.min.js"></script>
    <script src="js/owl/setup.js"></script>

</body>
</html>