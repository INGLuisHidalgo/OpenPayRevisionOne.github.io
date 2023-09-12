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

    try {

        $openpay = Openpay::getInstance('MERCHANT_ID', 'OPENPAY_SECRET_KEY', 'MX');
        Openpay::setProductionMode(false);

        $bannersize = $_POST['banner_selected'];
        $bannerpaym = $_POST['pago_selected'];
        $bannerrgns = $_POST['alcance_selected'];
        $bannerttls = $_POST['total_selected'];
        $bannerogss = $_POST['precio_original'];

        $token_id =  $_POST['token_id'];
        $deviceIdHiddenFieldName =  $_POST['deviceIdHiddenFieldName'];

        $name_pay_input = $_POST['holder_name'];
        $name_pay = $name_pay_input;
        $nameArray = explode(' ', $name_pay);
        $firstName = $nameArray[0];
        $lastName = $nameArray[1];

        $telephone = $_SESSION['tlfn'];
        $email_user = $_SESSION['email'];

        $customerData = array(
            'name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $telephone,
            'email' => $email_user
        );

        $chargeData = array(
            'method' => 'card',
            'source_id' => $token_id,
            'amount' => $bannerttls,
            'currency' => 'MXN',
            'description' => 'Pago de: '. $bannersize . ' con alcance de: ' . $bannerrgns . ' por: ' . $bannerpaym,
            'device_session_id' => $deviceIdHiddenFieldName,
            'customer' => $customerData
        );

        $charge = $openpay->charges->create($chargeData);
        $chargeId = $charge->id;

        $chargeCheck = $openpay->charges->get($chargeId);
        $chargeStatus = $chargeCheck->status;

    if ($chargeStatus === "completed") {
        echo
            "<script> 
                alert('Cargo Completado.');
            </script>";
        header('Location: facturacion.php');
        exit;
    } else {
        echo
            "<script> 
                alert('Cargo No Completado.');
            </script>";
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }

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