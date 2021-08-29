<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}
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

    <title>CARDÁPIO PF LANCHES</title>
</head>
<body>
    <header>
        <div class="container">
            <h2 class="logo">CARDÁPIO</h2>
            <nav>
                <a href="https://wa.me/552199342846">Olá, <?php echo $_SESSION['nome'] ?></a>
                <a href="logout.php">Sair</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="promocao"></div>
    </main>

    <div class="carrosel-lanches">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <h3 align="center">EGG CHESSE BURGUER</h3>
                <img class="box-cardapio" src="img/lanches/eggchesseburguer.jpeg" alt="" srcset=""></a> 
            </div>
            <div class="item">
                <h3 align="center">MEGA STACKER</h3>
                <img class="box-cardapio" src="img/lanches/megastacker.jpeg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">PF MONSTRO</h3>
                <img class="box-cardapio" src="img/lanches/pfmonstro.jpeg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">TRIPLO BURGUER</h3>
                <img class="box-cardapio" src="img/lanches/triploburguer.jpeg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">TRIPLO PRESUNTO</h3>
                <img class="box-cardapio" src="img/lanches/triplopresunto.jpeg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">SUPER DUPLO BACON</h3>
                <img class="box-cardapio" src="img/lanches/superduplobacon.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">X FRANGO</h3>
                <img class="box-cardapio" src="img/lanches/xfrangooo.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">X SALADA BACON</h3>
                <img class="box-cardapio" src="img/lanches/xsaladabacon.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">TRIPLO CHEDDAR</h3>
                <img class="box-cardapio" src="img/lanches/triplocheddarr.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">X CALABRESA</h3>
                <img class="box-cardapio" src="img/lanches/xcalabresa.jpg" alt="" srcset=""></a>
            </div>
        </div>
    </div>
    <div class="carrosel-lanches">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <h3 align="center">BATATA FRITA</h3>
                <img class="box-cardapio" src="img/acompanhamentos/fritas.jpeg" alt="" srcset=""></a> 
            </div>
            <div class="item">
                <h3 align="center">BATATA COM CHEDDAR P/ 1</h3>
                <img class="box-cardapio" src="img/acompanhamentos/batatacheddarp1.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">BATATA COM CHEDDAR P/ 2</h3>
                <img class="box-cardapio" src="img/acompanhamentos/batatacheddarp2.jpeg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">BATATA CANOA</h3>
                <img class="box-cardapio" src="img/acompanhamentos/batatacanoa.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">BATATA CANOA C/ CHEDDAR</h3>
                <img class="box-cardapio" src="img/acompanhamentos/batatacanoacheddar.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">NUGGETS</h3>
                <img class="box-cardapio" src="img/acompanhamentos/nuggets.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">GUARANÁ LATA</h3>
                <img class="box-cardapio" src="img/acompanhamentos/guaranalata.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">GUARANÁ 2 LITROS</h3>
                <img class="box-cardapio" src="img/acompanhamentos/guarana2l.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">COCA COLA LATA</h3>
                <img class="box-cardapio" src="img/acompanhamentos/cocalata.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">COCA COLA 1.5 LITROS</h3>
                <img class="box-cardapio" src="img/acompanhamentos/coca15l.jpg" alt="" srcset=""></a>
            </div>
        </div>
    </div>
    <div class="carrosel-lanches">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <h3 align="center">AÇAÍ</h3>
                <img class="box-cardapio" src="img/sobremesas/acai.jpg" alt="" srcset=""></a> 
            </div>
            <div class="item">
                <h3 align="center">SUNDAE</h3>
                <img class="box-cardapio" src="img/sobremesas/sundae.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">MILKSHAKE</h3>
                <img class="box-cardapio" src="img/sobremesas/milkshake.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">BROWNIE</h3>
                <img class="box-cardapio" src="img/sobremesas/brownie.jpg" alt="" srcset=""></a>
            </div>
            <div class="item">
                <h3 align="center">BOLO DE POTE</h3>
                <img class="box-cardapio" src="img/sobremesas/bolopote.jpeg" alt="" srcset=""></a>
            </div>
        </div>
    </div>
    <footer class="partebaixo">
    </footer>


    <script src="https://kit.fontawesome.com/b6a87fb752.js" crossorigin="anonymous"></script> <!-- link para os icons -->
    <script src="js/owl/jquery.min.js"></script>
    <script src="js/owl/owl.carousel.min.js"></script>
    <script src="js/owl/setup.js"></script>

</body>
</html>