<?php

namespace App\Http\Controllers;


use App\Models\sms;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sms  $sms
     * @return Response
     */
    public function show(sms $id)
    {
        return \response()->json([$id]);
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
