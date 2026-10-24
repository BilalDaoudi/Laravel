<?php

namespace App\Http\Controllers;

use App\Models\Destinataire;
use App\Models\Message;
// use Exception;
// use GuzzleHttp\Client;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class EnvoyerMessageController extends Controller
{
    public function index()
    {
        $destinataires = Destinataire::all();
        $messages = Message::all();

        return view('EnvoyerMessage', ["destinataires" => $destinataires, "messages" => $messages]);
    }
    public function envoyer(Request $request)
    {
        // $selectedDestinataires = $request->input('destinataires', []);

        // $selectedMessages = $request->input('messages', []);
        // echo "Destinataires cochés : <pre>";
        // print_r($selectedDestinataires);
        // echo "</pre>";
        // echo "Messages cochés : <pre>";
        // print_r($selectedMessages);
        // echo "</pre>";

        // $accessToken = 'EAAJAHazkfeYBO3wE4SZB2drhZByMqoT7jPuZCNxwDXOmKZB3JWJA74q6BZBNc79CnZCKZC04aaxw2PtBtgEjxZBhiBck9nkZBNAERfm9xAq5WyAzKmWZBvAnIdEy2aNJLMLZB1EYZCZBPxJRM4lglGmVIgFjZA9duy3ZA4qUZCLN51Rbs7z8ryaZAR0E6kyHpmW6ttMdCCrqnyxHTZBeCqadWpDQPZAX5Fay1ZBdMT4ZD';
        // $url = 'https://graph.facebook.com/v17.0/130284510174093/messages';

        // $messageData = [
        //     'messaging_product' => 'whatsapp',
        //     'to' => '212707900867',
        //     'type' => 'template',
        //     'template' => [
        //         'name' => 'bilal',
        //         'language' => [
        //             'code' => 'en_US',
        //         ],
        //     ],
        // ];

        // $client = new Client();

        // try {
        //     $response = $client->post($url, [
        //         'headers' => [
        //             'Authorization' => 'Bearer ' . $accessToken,
        //             'Content-Type' => 'application/json',
        //         ],
        //         'json' => $messageData,
        //     ]);

        //     // Traitez la réponse ici si nécessaire
        //     $statusCode = $response->getStatusCode();
        //     $responseBody = $response->getBody();

        //     return response()->json([
        //         'status' => $statusCode,
        //         'response' => json_decode($responseBody, true),
        //     ]);
        // } catch (Exception $e) {
        //     // Gestion des erreurs
        //     return response()->json([
        //         'error' => $e->getMessage(),
        //     ]);
        // }




        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        $destinataire = "+212707900867"; // Le numéro de téléphone du destinataire
        $message = "bilal daoudi"; // Le message à envoyer

        $twilio->messages->create($destinataire, [
            'from' => config('services.twilio.from'),
            'body' => $message,
        ]);

        return response()->json(['message' => 'Message envoyé avec succès']);
    










    }
}
