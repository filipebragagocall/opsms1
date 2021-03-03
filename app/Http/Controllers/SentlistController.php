<?php

namespace App\Http\Controllers;

use App\Models\listas;
use App\Models\sentlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SentlistController extends Controller
{

    // Envia uma menssagem para uma lista selecionada
    public function sendtoolist(Request $request){
        $data=$request->validate([
            'teste' => "integer|required",
            'message'=>'required'
        ]);
//      dd($data);
//      dd($request);
        $info  = listas::where('id', $data["teste"])->first();
        $t="".$info->numbers;
        $myArray = explode(',', $t);
        //Conta gateway
        $SMS_gateway_account = 'teste';
        //password do gateway
        $SMS_gateway_password = '13786103';
        //menssagem
        $SMS_message = $data['message'];
        // Numero de portas do gateway
        $SMS_channels = array(1,2);
        // COUNT
        $SMS_channel_count = 0;
        // Site / ip do gateway
        $SMS_gateway = 'probetter.pt';
        //  Numero de destino


        $SMS_destination = $myArray;

        $SMS_success = 'NO';
        // Array para percorrer as portas
        foreach ($SMS_destination as $item){
            //retira os 351 por dar erro.
            $t = str_replace("351", "",$item);

            $channel = $SMS_channels[$SMS_channel_count];
            $ch = curl_init();
            $SMS_gateway_password_encoded = curl_escape($ch, $SMS_gateway_password);
            $SMS_message_encoded = curl_escape($ch, $SMS_message);
            $transmission = "http://" . $SMS_gateway . ":2082" .  "/cgi/WebCGI?1500101=account=" . $SMS_gateway_account . "&password=" . $SMS_gateway_password_encoded . "&port=" . $channel . "&destination=" . $t . "&content=" . $SMS_message_encoded;
            curl_setopt($ch, CURLOPT_URL, $transmission);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $SMS_result = curl_exec($ch);

            if ((strpos($SMS_result, 'Response: Success') !== false) && ((strpos($SMS_result, 'Message: Commit successfully!') !== false)))
            {
                $SMS_success = 'YES';
            }
            elseif($SMS_result !=="")
            {
                $SMS_success = 'NO';
            }
            curl_close($ch);
            if ($SMS_success == 'YES')
            {
                // Resposta do Servidor
            }
            elseif ($SMS_success == 'NO')
            {
                //erro durante o envio
                return redirect('/sendlist')->with('err','Contactar o administrador de serviços');
            }




            $SMS_channel_count++;
            if ($SMS_channel_count >= count($SMS_channels)){
                $SMS_channel_count = 0;
                // 1 sms por cada porta a cada 10 segundos MAX
                sleep(11);
            }
        }
        $te["Body"]=$data["message"];
        $te["To"] = $info->numbers;
        $te["list_id"]=$info->id;
        $te["user_id"]=Auth::user()->id;
        sentlist::create($te);
        return redirect('/sendlist')->with('suc','Done');


    }
    // caso o utilizador seja o briefing, envia menssagens de briefing para todos.
    public function Briefing(Request $request)
    {
        $data=$request->validate([
            'Grupo'   =>'required',
            'message'=>'required'
        ]);
        //Conta gateway
        $SMS_gateway_account = 'teste';
        //password do gateway
        $SMS_gateway_password = '13786103';
        //menssagem
        $SMS_message = $data['message'];
        // Numero de portas do gateway
        $SMS_channels = array(1,2);
        // COUNT
        $SMS_channel_count = 0;
        // Site / ip do gateway
        $SMS_gateway = 'probetter.pt';
        //  Numero de destino
        $SMS_destination = '912078431';

        $SMS_success = 'NO';
        // Array para percorrer as portas
        foreach ($SMS_destination as $item){
            //retira os 351 por dar erro.
            $t = str_replace("351", "",$item);

            $channel = $SMS_channels[$SMS_channel_count];
            $ch = curl_init();
            $SMS_gateway_password_encoded = curl_escape($ch, $SMS_gateway_password);
            $SMS_message_encoded = curl_escape($ch, $SMS_message);
            $transmission = "http://" . $SMS_gateway . ":2082" .  "/cgi/WebCGI?1500101=account=" . $SMS_gateway_account . "&password=" . $SMS_gateway_password_encoded . "&port=" . $channel . "&destination=" . $t . "&content=" . $SMS_message_encoded;
            curl_setopt($ch, CURLOPT_URL, $transmission);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $SMS_result = curl_exec($ch);

            if ((strpos($SMS_result, 'Response: Success') !== false) && ((strpos($SMS_result, 'Message: Commit successfully!') !== false)))
            {
                $SMS_success = 'YES';
            }
            elseif($SMS_result !=="")
            {
                $SMS_success = 'NO';
            }
            curl_close($ch);
            if ($SMS_success == 'YES')
            {
                // Resposta do Servidor
            }
            elseif ($SMS_success == 'NO')
            {
                //erro durante o envio
                return redirect('/Briefing')->with('err','Contactar o administrador de serviços');
            }




            $SMS_channel_count++;
            if ($SMS_channel_count >= count($SMS_channels)){
                $SMS_channel_count = 0;
                // 1 sms por cada porta a cada 10 segundos MAX
                sleep(11);
            }
        }
        return redirect('/briefing')->with('suc','Done');

    }


}
