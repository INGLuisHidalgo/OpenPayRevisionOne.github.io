<?php

    include("conect.php");
    session_start();

    use Openpay\Data\OpenpayApiAuthError;
    use Openpay\Data\OpenpayApiConnectionError;
    use Openpay\Data\OpenpayApiError;
    use Openpay\Data\OpenpayApiRequestError;
    use Openpay\Data\OpenpayApiTransactionError;
    use Openpay\Data\Openpay;

    require(dirname(__FILE__) . '/OpenPayPHP/Openpay.php');
    require(dirname(__FILE__) . '/vendor/autoload.php');

    try{

        //Openpay::setProductionMode(true);

        $openpay = Openpay::getInstance('MERCHANT_ID', 'OPENPAY_SECRET_KEY', 'MX');
        Openpay::setProductionMode(false);

        $dataCard = json_decode($_POST['arrayDataTarjeta']);
        $token_id = $dataCard[0];
        $Device = $dataCard[1];

        $dataUser = json_decode($_POST['arrayNameUserOne']);
        $name_user = $dataUser[0];
        $lastName_user = $dataUser[1];

        $databanner = json_decode($_POST['arrayprevbanner']);
        $bannersize = $databanner[0];
        $bannerpaym = $databanner[1];
        $bannerrgns = $databanner[2];
        $bannerttls = $databanner[3];
        $bannerogss = $databanner[4];

        $telephone = $_SESSION['tlfn'];
        $email_user = $_SESSION['email'];

        $customerr = array(
            'name' => $name_user,
            'last_name' => $lastName_user,
            'phone_number' => $telephone,
            'email' => $email_user);

        $customer = $openpay->customers->add($customerr);
        $empleadoId = $customer->id;

        // AGREGAR TARETA AL CLIENTE
        $cardDataDos = array(
            'token_id' => $token_id,
            'device_session_id' => $Device        
        );        
        $customer = $openpay->customers->get($empleadoId);
        $card2 = $customer->cards->add($cardDataDos);
        $tarjetaId2 = $card2->id;

        $chargeRequest = array(
            'method' => 'card',
            'source_id' => $token_id,
            'amount' => $bannerttls,
            'currency' => 'MXN',
            'description' => 'Pago de: '. $bannersize . ' con alcance de: ' . $bannerrgns . ' por: ' . $bannerpaym,
            'device_session_id' => $Device);

        //Obteniendo Empleado
        $customeree = $openpay->customers->get($empleadoId);

        $Cargoo = $customeree->charges->create($chargeRequest);
        $CardoId = $Cargoo->id;
        
        //Obteniendo el estatus del cargo
        $charge = $customeree->charges->get($CardoId);
        $status = $charge->status;

        $status_BD = $status;

        if($charge) {
            $id_usuario = $_SESSION['id'];

            $sql = "SELECT * FROM prchss_mxs";
            $execute_rg = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $num_filas = $execute_rg->num_rows;

            $sql_update = "UPDATE prchss_mxs SET STATUS_B = 'Pagado.' WHERE ID = '$num_filas' AND CODE_CLNT = '$id_usuario'";
            $execute_update = mysqli_query($conn, $sql_update) or die(mysqli_error($conn));
        }

        $response = array();
        if ($status === "completed") {
            $response['completed'] = true;
        } else {
            $response['completed'] = false;
        }

        // Enviar respuesta como JSON
        echo json_encode($response);

    } catch (OpenpayApiTransactionError $e) {
        error_log('ERROR on the transaction: ' . $e->getMessage() . 
              ' [error code: ' . $e->getErrorCode() . 
              ', error category: ' . $e->getCategory() . 
              ', HTTP code: '. $e->getHttpCode() . 
              ', request ID: ' . $e->getRequestId() . ']', 0);
    
    } catch (OpenpayApiRequestError $e) {
        error_log('ERROR on the request: ' . $e->getMessage(), 0);
    
    } catch (OpenpayApiConnectionError $e) {
        error_log('ERROR while connecting to the API: ' . $e->getMessage(), 0);
    
    } catch (OpenpayApiAuthError $e) {
        error_log('ERROR on the authentication: ' . $e->getMessage(), 0);
        
    } catch (OpenpayApiError $e) {
        error_log('ERROR on the API: ' . $e->getMessage(), 0);
        
    } catch (Exception $e) {
        error_log('Error on the script: ' . $e->getMessage(), 0);
    }

?>