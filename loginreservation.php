<?php
    session_start();
    if(isset($_SESSION['UsuarioLog'])){
        header("Location: ../reservation.php");
        die();
    }
?>

<html lang="pt-br">
<head>
    <title>Reservation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<?php include "views/header.php"?>

<!-- Sidebar -->
<?php include "views/sidebar.php"?>
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        Reservas
    </h2>
</section>


<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-b-30">
                <div class="t-center">
						<span class="tit2 t-center">
							Reservas
						</span>

                    <h3 class="tit3 t-center m-b-35 m-t-2">
                        Para reservar uma mesa, faça login
                    </h3>
                </div>
                <div id="horizontal">
            <div id="cadastrar">
                <form  id="cadastro-form" action="action/usuario.store.php"  method="post" class="wrap-form-reservation size22 m-l-r-auto">

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Name -->
                            <span class="txt9">
									Nome
								</span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Phone -->
                            <span class="txt9">
									Telefone
								</span>

                            <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Telefone">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Email -->
                            <span class="txt9">
									Email
								</span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Senha -->
                            <span class="txt9">
									Senha
								</span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="senha" placeholder="Senha">
                            </div>
                        </div>

                    </div>

                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        <div id="login">
                <form id="login-form" action="action/usuario.login.php"  method="post" class="wrap-form-reservation size22 m-l-r-auto">
                    <div class="area">
                        <div class="col-md-4">
                            <!-- login-->
                            <span class="txt9">
							    		Login
                            </span>
                            <!-- Email -->
                            <span class="txt9">
                                Email
                            </span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Senha -->
                            <span class="txt9">
									Senha
								</span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="senha" placeholder="Senha">
                            </div>
                        </div>


                    </div>
                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Entrar
                        </button>
                    </div>
                </form>
        </div>
                </div>
            </div>
        </div>

        <div class="info-reservation flex-w p-t-80">
            <div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
                <h4 class="txt5 m-b-18">
                    Reservas por Telefone
                </h4>

                <p class="size25">
                    A comodidade de fazer suas reservas por telefone
                    <span class="txt25">Nulla vulputate</span>
                    , calor humano unido a eficiência!
                    <span class="txt25">lacus sodales</span>
                    Fale conosco pelo telefone:
                    <span class="txt24">(055) 63 99202 9021</span>
                </p>
            </div>

            <div class="size24 w-full-md p-t-40">
                <h4 class="txt5 m-b-18">
                    Reservar para eventos
                </h4>

                <p class="size26">
                    Seus eventos terão vida e sabor em nosso Restaurante, traga quem é especial para um lugar único,
                    com sabores únicos! Fale conosco pelo telefone:
                    <span class="txt24">(055) 63 99202 9088</span>
                </p>
            </div>

        </div>
    </div>
</section>


<!-- Footer -->
<?php include "views/footer.php"?>

</body>
</html>

