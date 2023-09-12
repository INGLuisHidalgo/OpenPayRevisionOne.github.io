<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="https://js.openpay.mx/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://js.openpay.mx/openpay-data.v1.min.js"></script>

    <title>Formulario de Pago - MX Servicios. A un clic de todo lo que buscas!</title>
    <link rel="icon" href="media/MXS.png">

    <link rel="stylesheet" href="css/banner_select4.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/navbar2.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="fonts/BootstrapIcons/bootstrap-icons.css">
    <link rel="stylesheet" href="fonts/css/fontello.css">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

</head>

<body>


    <div id="overlay">
        <div class="spinner">
        </div>
        <img class="icono" src="media/mxlogo.png" alt="">
    </div>

    <nav id="navbar2" class="sticky-top"></nav>
    <script>
        fetch('navbar2.php')
            .then(response => response.text())
            .then(html => document.querySelector('#navbar2').innerHTML = html);
    </script>

    <div class="container global_styles">
        <section>&nbsp;</section>
        <section class="container title_section">
            <div class="row justify-content-center" align="center">
                <div class="col-12">
                    <h3>CARRITO DE COMPRAS</h3>
                </div>
                <div class="col-12">
                    <a>Aquí podrás hacer la elección del banner deseado, aplicar códigos de descuento y realizar tu pago.</a>
                </div>
            </div>
        </section>
        <form action="openpay_val.php" method="POST" id="payment_form" class="form_style">

            <section>&nbsp;</section>

            <section class="container payment_resume_section">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                        <section class="payment_section">

                            <div class="row justify-content-center" align="center">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <h3>Métodos de Pago</h3>
                                </div>
                            </div>

                            <div class="row">&nbsp;</div>

                            <div class="row justify-content-center" align="left">
                                <div class="col-6 col-sm-6 col-md-6" style="display: grid; place-content: center;">
                                    <label class="form-check-label" for="credit_cards">Tarjeta de Crédito</label>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="row justify-content-center" align="center">
                                        <div class="col-4 col-sm-4 col-md-4">
                                            <img src="media/VISA-Logo.png" style="width: 100%; height: 100%;" style="display: grid; place-content: center;">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">
                                            <img src="media/Mastercard-logo.svg.png" style="width: 100%; height: 100%;" style="display: grid; place-content: center;">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">
                                            <img src="media/american-express-logo-.png" style="width: 100%; height: 100%;" style="display: grid; place-content: center;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;</div>

                            <div class="row justify-content-center" align="left">
                                <div class="col-6 col-sm-6 col-md-6" style="display: grid; place-content: center;">
                                    <label class="form-check-label" for="debit_cards">Tarjeta de Débito</label>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="row justify-content-center" align="center">
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/HSBC.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/BBVA.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Inbursa.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Ixe.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Santande.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Scotiabank.png" width="100%">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/BANCO-AZTECA-LOGO-02.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Citibanamex-logo.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Logo_de_BanCoppel.svg.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Logo_de_Banorte.svg.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/Logo_de_Banregio.svg.png" width="100%">
                                        </div>
                                        <div class="col-5 col-sm-2 col-md-2">
                                            <img src="media/logo-eactinver-enr-blue.png" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">&nbsp;</div>
                            <div class="row">&nbsp;</div>

                            <div class="row justify-content-center">
                                <section class="form_cards">

                                    <div class="row justify-content-center">
                                        <input type="hidden" name="token_id" id="token_id">
                                        <input type="hidden" name="use_card_points" id="use_card_points" value="false">

                                        <input type="hidden" name="banner_selected" id="banner_selected" value="<?php echo $_SESSION['banner']; ?>">
                                        <input type="hidden" name="pago_selected" id="pago_selected" value="<?php echo $_SESSION['planpago']; ?>">
                                        <input type="hidden" name="alcance_selected" id="alcance_selected" value="<?php echo $_SESSION['alcance']; ?>">
                                        <input type="hidden" name="total_selected" id="total_selected" value="<?php echo $_SESSION['amount']; ?>">
                                        <input type="hidden" name="precio_original" id="precio_original" value="<?php echo $_SESSION['amountog']; ?>">
                                    </div>

                                    <div class="row">&nbsp;</div>

                                    <div class="row justify-content-center">
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <label for="holder_name" class="form-label">
                                                <h5>Nombre del Titular</h5>
                                            </label>
                                            <input type="text" class="form-control" name="holder_name" id="holder_name" data-openpay-card="holder_name" autocomplete="off" placeholder="Como aparece en la tarjeta">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <label for="card_number" class="form-label">
                                                <h5>Número de Tarjeta</h5>
                                            </label>
                                            <input type="text" class="form-control" id="card_number" autocomplete="off" data-openpay-card="card_number" maxlength="16" placeholder="42424242424242">
                                        </div>
                                    </div>

                                    <div class="row">&nbsp;</div>

                                    <div class="row justify-content-center">

                                        <div class="col-12 col-sm-12 col-md-6">
                                            <h5>Fecha de Expiración</h5>
                                            <section>
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <select class="form-control" id="expiration_month" data-openpay-card="expiration_month">
                                                            <option disabled selected>Mes</option>
                                                            <?php
                                                            include 'conexion.php';

                                                            $consulta_ctg = "SELECT ID, CODES, DESCR from months_mxs ORDER BY ID ASC";
                                                            $execute_ctg = mysqli_query($conexion, $consulta_ctg) or die(mysqli_error($conexion));

                                                            while ($row_ctg =  mysqli_fetch_array($execute_ctg)) {
                                                            ?>

                                                                <option value="<?php echo $row_ctg['CODES']; ?>"><?php echo $row_ctg['DESCR']; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <select class="form-control" id="expiration_year" data-openpay-card="expiration_year">
                                                            <option disabled selected>Año</option>
                                                            <?php
                                                            include 'conexion.php';

                                                            $consulta_ctg = "SELECT ID, CODES, DESCR from years_mxs ORDER BY ID ASC";
                                                            $execute_ctg = mysqli_query($conexion, $consulta_ctg) or die(mysqli_error($conexion));

                                                            while ($row_ctg =  mysqli_fetch_array($execute_ctg)) {
                                                            ?>

                                                                <option value="<?php echo $row_ctg['CODES']; ?>"><?php echo $row_ctg['DESCR']; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <div class="col-12 col-sm-12 col-md-6">
                                            <h5>Código de Seguridad</h5>
                                            <input type="password" class="form-control" maxlength="3" id="cvv2" autocomplete="off" data-openpay-card="cvv2" placeholder="3 digitos">
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>

                    <script>
                        const card_number = document.getElementById('card_number');
                        const maxCaracteres = 16;

                        card_number.addEventListener('input', function() {
                            if (this.value.length > maxCaracteres) {
                                this.value = this.value.slice(0, maxCaracteres);
                            }
                        });
                    </script>
            </section>

            <section>&nbsp;</section>

            <section class="container announcement_section">
                <div class="row justify-content-center" align="left">

                    <style>
                        .row_an_sty {

                            border-left: 2px solid #bdbdbd;

                            margin: 10px 0px;

                        }
                    </style>

                    <div class="col-10 col-sm-10 col-md-4 col-lg-4 row_an_sty">
                        <h6>Transacciones realizadas via:</h6>
                        <img src="media/openpay-color.png" width="150px">
                    </div>

                    <div class="col-10 col-sm-10 col-md-3 col-lg-3 row_an_sty">
                        <h6>Paga con:</h6>
                        <img src="media/puntosBBVA.png" width="90px">
                    </div>

                    <div class="col-10 col-sm-10 col-md-4 col-lg-4 row_an_sty">
                        <section>
                            <div class="row justify-content-center">
                                <div class="col-4 col-sm-4 col-md-4">
                                    <img src="media/seguro.png" width="100%">
                                </div>
                                <div class="col-8 col-sm-8 col-md-8" style="display: grid; place-content: center;">
                                    <h6 align="justify">Tus pagos se realizan de forma segura con encriptación de 256 bits</h6>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>

            <section>&nbsp;</section>

            <section class="btn_section">
                <div class="row justify-content-center" align="center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <a class="btn btn_banner" id="payment_button">
                            COMPRAR BANNER
                        </a>
                    </div>
            </section>
        </form>
    </div>

    <!--Footer de MXServicios-->
    <footer id="footer" style="margin-top: 50px;"></footer>
    <script>
        fetch('footer2.php')
            .then(response => response.text())
            .then(html => document.querySelector('#footer').innerHTML = html);
    </script>

    <script src="js/preloader.js"></script>

    <script>
        $(document).ready(function() {
            OpenPay.setId('MERCHANT_ID');
            OpenPay.setApiKey('OPENPAY_PUBLIC_KEY_');
            OpenPay.setSandboxMode(true);
            var deviceSessionId = OpenPay.deviceData.setup("payment_form", "deviceIdHiddenFieldName");
        });

        $('#payment_button').on('click', function(event) {
            event.preventDefault();
            $("#payment_button").prop("disabled", true);
            var isValidCardNumber = OpenPay.card.validateCardNumber($('#card_number').val());
            var isValidCVC = OpenPay.card.validateCVC($('#cvv2').val());
            var isValidExpiry = OpenPay.card.validateExpiry($('#expiration_month').val(), $('#expiration_year').val());

            if (isValidCardNumber || isValidCVC || isValidExpiry) {
                // Mostrar un mensaje de error indicando que el número de tarjeta es inválido
                OpenPay.token.extractFormAndCreate('payment_form', success_callbak, error_callbak);
            } else {
                alert('Error con la tarjeta. Contacta a tu banco');
            }
        });

        var success_callbak = function(response) {
            var token_id = response.data.id;
            $('#token_id').val(token_id);
            $('#payment_form').submit();
            var deviceHiddenFieldName = document.getElementById("deviceIdHiddenFieldName").value;
            var arrayData = [token_id, deviceHiddenFieldName];

            var data = {
                token_id: token_id,
                deviceHiddenFieldName: deviceHiddenFieldName
            };

            $.ajax({
                url: $('#payment_form').attr('action'), // Obtiene la URL del atributo action del formulario
                method: 'POST',
                data: data,
                success: function(response) {
                    // Maneja la respuesta del servidor aquí
                },
                error: function(xhr, status, error) {
                    // Maneja los errores de la solicitud AJAX aquí
                }
            });
            console.log(token_id);
        };

        var error_callbak = function(response) {
            var desc = response.data.description != undefined ?
                response.data.description : response.message;
            alert("ERROR [" + response.status + "] " + desc);
            $("#payment_button").prop("disabled", false);
        };
    </script>
</body>

</html>