<?php

namespace App\Http\Controllers;


use App\Models\ournumbers;
use App\Models\sendedsms;
use App\Models\sms;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        /*
         Twilio
        $save["To"] = $data ["To"];
        $save["From"] = $data ["From"];
        $save["Body"] = $data ["Body"];
        $save["smsid"] = $data["SmsMessageSid"];
         */

        sms::create($save);

    }
    public function showrecived(Request $request)
    {
        $all_sms= sms::paginate(5);


        return view('ffssms')->with('teste', $all_sms );
    }
    public function showsended(Request $request)
    {
        $all_sms= sendedsms::paginate(5);
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
        $fs="".ournumbers::first()->id;
        $ls="".ournumbers::latest()->first()->id;


        $ls= (int)$ls;
        $fs= (int)$fs;
        $um=random_int($fs,$ls);
//        dd($um);
        $tt=ournumbers::where('id',$um)->firstorfail();
        $number=$tt->phone_number;


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
            $smsinsert['Body']=$data["message"];
            $smsinsert['To']=$data['phone'];

            sendedsms::create($smsinsert);

        return redirect('/sendSMS')->with('suc','Done');
        }
        return redirect('/sendSMS')->with('err','Número de telefone Errado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sms  $sms
     * @return Response
     */
    public function edit(sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sms  $sms
     * @return Response
     */
    public function update(Request $request, sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sms  $sms
     * @return Response
     */
    public function destroy(sms $sms)
    {
        //
    }
}
