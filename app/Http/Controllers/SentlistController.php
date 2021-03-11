<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSMS;
use App\Models\listas;
use App\Models\Requests;
use App\Models\sentlist;
use App\PAMI\SMSCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PAMI\Message\OutgoingMessage;

class SentlistController extends Controller
{

    // Envia uma menssagem para uma lista selecionada
    public function sendtoolist(Request $request){
        $data=$request->validate([
            'teste' => "integer|required",
            'message'=>'required',
            'Porta' => "integer|required"
        ]);
//      dd($request);
        if ($data["Porta"]==3){
            $porta= array(1,2,3,4,5,6,7,8);
        }elseif ($data["Porta"]==2){
            $porta= 2;
        }elseif ($data["Porta"]==1){
            $porta= 1;
        }
        $info  = listas::where('id', $data["teste"])->first();
        $t="".$info->numbers;
        $SMS_destination = explode(',', $t);

        $request = Requests::create();

        // Array para percorrer as portas
        foreach ($SMS_destination as $item) {
            $te = [];
            $te["Body"] = $data["message"];
            $te["To"] = $item;
            $te["Port"] = $porta;
            $te["request_id"] = $request->id;
            $te["State"] = "Sending";
            $te["list_id"] = $info->id;
            $te["user_id"] = Auth::user()->id;
            $sentlist = sentlist::create($te);

            $job = new ProcessSMS($sentlist);
            $this->dispatch($job);
        }

        return redirect('/sendlist')->with('suc','Done');


    }














    public function Test() {

        $options = array(
            "host" => "192.168.1.188",
            "scheme" => "tcp://",
            "port" => 5038,
            "username" => "teste",
            "secret" => "13786103",
            "connect_timeout" => 10,
            "read_timeout" => 10000
        );

        $client = new \PAMI\Client\Impl\ClientImpl($options);
        $client->registerEventListener(function($event) {
            dump($event);
        });
        $client->open();
        $smsCommand = new SMSCommand("gsm send sms 2 960476046 \"Fuck\" 1");
        $result = $client->send($smsCommand);
        dump($result);

        $count = 0;
        while ($count < 10) {
            $client->process();
            sleep(1);
            $count++;
        }
        $client->close();

        /*$ami = new \PHPAMI\Ami();

        $ami->addEventHandler("UpdateSMSSend", function($params) {
           var_dump($params);
        });

        if ($ami->connect('192.168.1.188:5038', 'teste', '13786103', 'on') === false) {
            throw new \RuntimeException('Could not connect to Asterisk Management Interface.');
        }

        $result = $ami->sendRequest("SMSCommand", [
            "command" => "gsm send sms 2 912078431 \"Yes\" 1"
        ]);
        var_dump($result);

        $ami->waitResponse(false);
        $ami->disconnect();

        return response("teta");*/
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
        // Porta 2 - optmode
        // Porta 1 - Iberdrola
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

    public function seestatus(){
            if (!Auth::user()->Admin) {

                $list = sentlist::whereHas("user", function ($query) {
                    return $query->where("id", auth()->user()->id);
                })->orderBy('created_at','desc')->paginate(8);
            } else
            {
                $list= sentlist::orderBy('created_at', 'desc')->paginate(8);
            }
            return view('statuslist')->with('lista', $list);
        }
    }


