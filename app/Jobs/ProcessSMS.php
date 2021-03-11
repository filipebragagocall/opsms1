<?php

namespace App\Jobs;

use App\Http\Controllers\SentlistController;
use App\Models\sentlist;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSMS implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    /**
     * @var sentlist
     */
    private $sentlist;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(sentlist $sentlist)
    {
        $this->sentlist = $sentlist;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $SMS_success = 'NO';
        //Conta gateway
        $SMS_gateway_account = 'teste';
        //password do gateway
        $SMS_gateway_password = '13786103';
        //menssagem
        $SMS_message = $this->sentlist->Body;
        // Numero de portas do gateway
       // $SMS_channels = array(1,2,3,4,5);
        // Porta 2 - optmode
        // Porta 1 - Iberdrola

        // Site / ip do gateway
        $SMS_gateway = 'probetter.pt';
        //  Numero de destino

        //retira os 351 por dar erro.
        $t = str_replace("351", "", $this->sentlist->To);

        //$channel = $SMS_channels[$SMS_channel_count];
        $ch = curl_init();
        $SMS_gateway_password_encoded = curl_escape($ch, $SMS_gateway_password);
        $SMS_message_encoded = curl_escape($ch, $SMS_message);
        $transmission = "http://" . $SMS_gateway . ":2082" .  "/cgi/WebCGI?1500101=account=" . $SMS_gateway_account . "&password=" . $SMS_gateway_password_encoded . "&port=" . $this->sentlist->Port . "&destination=" . $t . "&content=" . $SMS_message_encoded;
        curl_setopt($ch, CURLOPT_URL, $transmission);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $SMS_result = curl_exec($ch);

        if ((strpos($SMS_result, 'Response: Success') !== false) && ((strpos($SMS_result, 'Message: Commit successfully!') !== false)))
        {
            $this->sentlist->State = "Success";
        }
        elseif($SMS_result !=="")
        {
            $this->sentlist->State = "Error";
        }

        curl_close($ch);

        $this->sentlist->save();

        sleep(1);
    }
}
