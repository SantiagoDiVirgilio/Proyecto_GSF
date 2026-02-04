<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
    }

    public function checkout(Request $request)
    {
       try {
        $client = new PreferenceClient();

        $preference = $client->create([
            "items" => [
                [
                    "title" => $request->name,
                    "quantity" => 1,
                    "unit_price" => (float)$request->price,
                    "currency_id" => "ARS"
                ]
            ],      
            "back_urls" => [
                "success" =>"http://localhost:8000/pago/success",
                "failure" => "http://localhost:8000/pago/failure",
                "pending" => "http://localhost:8000/pago/pending"
            ],
            "notification_url" => env('MERCADOPAGO_WEBHOOK_URL'),
            "auto_return" => "approved"
        ]);

        return redirect($preference->init_point);
           
       } catch (MPApiException $e) {
            dd($e->getApiResponse()->getContent());
       } catch (\Exception $e) {
            dd($e->getMessage());
       }
    }
    
    //aca llamar a los demas metodos para que realice el pago (manejar db de reservas canchas pagos ETC) y redirija a la vista correspondiente
    public function success(Request $request)
    {
        $datosPago = $request->all();
        return view('pago.success',compact('datosPago'));
    }

    public function failure(Request $request)
    {
        return view('pago.failure');
    }

    public function pending(Request $request)
    {
        return view('pago.pending');
    }

    public function webhook(Request $request)
    {
    Log::info('Webhook recibido', $request->all());
       $data = $request->all();
       
       if(isset($data['type']) && $data['type'] === 'payment') {
           $paymentId = $data['data']['id'];

           Log::info('Procesando pago ID: ' . $paymentId);
           $client = new PaymentClient();

           try {
            $payment = $client->get($paymentId);

             Log::info('Estado del pago: ' . $payment->status);
            if($payment->status === 'approved') {      
                Pago::create([
                    'payment_id' => $payment->id,
                    'status' => $payment->status, 
                ]);
                Log::info('Pago guardado en BD');
            }
           } catch (\Exception $e) {
            Log::error('Error al guardar el pago en la DB: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 200);
           }
           return response()->json(['status' => 'success'], 200);
       }
    }   
}
