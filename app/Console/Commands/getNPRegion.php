<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class getNPRegion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getnpregion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and Store NP region in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $_ENV['NP_CITIES_GET_URL'];
        $jsonReq = "
        {
            \"modelName\": \"Address\",
            \"calledMethod\": \"getAreas\",
            \"methodProperties\": {},
            \"apiKey\": \"".$_ENV['NP_APIKEY']."\"
        }";

        //$this->info("Url: " . $url . " jsonreq: " . $jsonReq);

        $ch = curl_init($url);
        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonReq);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($ch);
        //$this->info($result);
        //$this->info(print_r(json_decode($result), true));
        $resData = json_decode($result);
        curl_close($ch);

        $retData = array();
        foreach ($resData->data as $key => $val) {
            $this->info(" R:" . $val->Description. " Ref: " . $val->Ref);
        }
        $this->info(print_r($retData, true));
    }
}
