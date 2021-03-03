<?php

namespace App\Http\Controllers;


use App\Models\listas;
use App\Models\ournumbers;
use App\Models\sendedsms;
use App\Models\sentlist;
use App\Models\sms;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Break_;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }
    public function status(Request $request){
        Log::debug(var_export($request->input(),true));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function recive(Request $request)
    {
        Log::debug(var_export($request->input(), true));

        $data=$request->validate([
            /*
              twilio

            'To' => 'required',
            'From' => 'required',
            'Body' => 'required',
            'SmsMessageSid' => 'required',
             */

            /*
                    Vonage
            */
            'to' => 'required',
            'msisdn' => 'required',
            'text' => 'required',
            'messageId' => 'required'
        ]);
        /*

        Vonage

        */
        $save["To"] = "+" .$data ["to"];
        $save["From"] = "+" .$data ["msisdn"];
        $save["Body"] = $data ["text"];
        $save["smsid"] = $data["messageId"];
//        dd($save);
        /*
         Twilio
        $save["To"] = $data ["To"];
        $save["From"] = $data ["From"];
        $save["Body"] = $data ["Body"];
        $save["smsid"] = $data["SmsMessageSid"];
         */

        $check =  ournumbers::where('phone_number', $save['To'])->first();
//        dd($check);

        if ($check) {
            $sms = sendedsms::where([
                ['phone_id', '=', $check->id],
                ['To', '=',  $save['From']],
            ])->first();

//            dd($sms);
            $rand = $sms->Rand;
//            dd("$rand");
            $regex='/\s'.$rand.'$/';

            $no = preg_match_all($regex,$data['text']);

            if ($no) {
                $save["Contrato"]=1;
//                dd("1");
                $save["sent_id"]=$sms->id;
            } else {
                $save["Contrato"]=0;
//                dd("0");
                $save["sent_id"]='no';
            }
//            dd($check->id);

            sms::create($save);
        }else
//            dd("omfg");
            sms::create($save);
    }
    public function showrecived(Request $request)
    {
        $all_sms = sms::paginate(5);
        return view('ffssms')->with('teste', $all_sms );
    }



    public function showsended(Request $request)
    {

        if (!Auth::user()->Admin) {

            $all_sms = sendedsms::whereHas("user", function ($query) {
                return $query->where("id", auth()->user()->id);
            })->paginate(5);
        } else
        {
            $all_sms = sendedsms::paginate(5);
    }
        return view('allsended')->with('teste', $all_sms );
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sms  $sms
     * @return Response
     */
    public function show(sms $id)
    {

//    dd($id["sent_id"]);
    $info  = sendedsms::where('id', $id["sent_id"])->first();
    $id->info = $info;
//    dd($id->info->id);
    return view('contrato')->with('dados', $id);

    }

    public function Send(Request $request){

//        dd($request['To']);
        $data=$request->validate([
           'phone'   =>'required',
           'message'=>'required'
        ]);
        $regex='/^9[12356]\d{6}[0-9]$/';
        $teste = preg_match_all($regex,$data['phone']);
        if ($teste){
        $data['phone']="+351".$data['phone'];

//        dd($data['To']);

              $check = ournumbers::first();
            if ($check){
                $fs="".ournumbers::first()->id;
                $ls="".ournumbers::latest()->first()->id;
            }else{
                $derp[0] = 'Não têm nenhum telefone adicionado';

                return view('SendSms')->with('erros',$derp);
            }

        $ls= (int)$ls;
        $fs= (int)$fs;
        $um=random_int($fs,$ls);
//        dd($um);
        $tt=ournumbers::where('id',$um)->firstorfail();
        $number=$tt->phone_number;
        $ti= rand(1000,9999);
        $smsinsert['Body']=$data["message"];
        $data['message'] = $data['message'] ."\r\n". 'SIM ' . $ti;

//        dd("done");
        $data['sender_name']= $number;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.dexatel.com/v1/send/sms/quick',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$data,
            CURLOPT_HTTPHEADER => array(
                'token: 15f59fac65d805dddb4d4b9d95285d2f',
            ),
        ));

        $o = curl_exec($curl);

        curl_close($curl);
            $resultado=json_decode($o);
//            dd($resultado);
        if($resultado->statusName !== "OK"){
            $derp["0"]=$resultado->statusName;
            $derp["1"]=$resultado->message;
            return view('SendSms')->with('erros',$derp);
           }

            $smsinsert['phone_id']=$tt->id;
            $smsinsert['user_id']=Auth::user()->id;
            $smsinsert['To']=$data['phone'];
            $smsinsert['Rand'] = $ti;
            sendedsms::create($smsinsert);

        return redirect('/sendSMS')->with('suc','Done');

        }
        return redirect('/sendSMS')->with('err','Número de telefone Errado');
    }


}
