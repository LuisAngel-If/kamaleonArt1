<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaymentController extends Controller
{
    //
    private $_api_context;
    public function __construct()
    {
    $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {//procesa el pago
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();//total que se paga
           $amount->setCurrency('MXN')
            ->setTotal($request->get('total'));
        

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');
        $callbackUr2 = url('/order');
        // $callbackUr2 = url('/order');
        

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)//ha pagado
            ->setCancelUrl($callbackUrl);//no ha pagado y cancelo el pago

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->_api_context);//paypal crea un pago
            return redirect()->away($payment->getApprovalLink());//acceso aprovado por paypal, away para ir directo a la url de paypal
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    
    }

    public function getPaymentStatus(Request $request)
    {
        //dd($request->all());
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/home')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        $result = $payment->execute($execution, $this->_api_context);

        //dd($result);

        if ($result->getState() === 'approved') {
            $status = '!Gracias! El pago a través de PayPal se ha ralizado correctamente. Por favor de clic al botón "Confirmar" y posteriormente este al pendiente de su correo electrónico';
            return redirect('/paypal/results')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/home')->with(compact('status'));
    }
    
       
}
