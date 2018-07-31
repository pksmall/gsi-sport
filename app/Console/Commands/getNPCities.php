<?php

namespace App\Console\Commands;

use App\NpCities;
use Illuminate\Console\Command;

class getNPCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getnpcities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and Store NP cities in DB';

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
            \"calledMethod\": \"getCities\",
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

        foreach ($resData->data as $key => $val) {
            $excities = \App\NpCities::where('cityid', '=', $val->CityID)->get();
            if ($excities->count() == 0) {
                $this->info(" R:" . $val->Description. " N: ". $val->DescriptionRu . " Ref: " . $val->Ref . " ID:" . $val->CityID . " is save");
                $cities = new \App\NpCities();
                $cities->name = $val->Description;
                $cities->nameru = $val->Description;
                $cities->ref = $val->Ref;
                $cities->regionref = $val->Area;
                $cities->settlementtype = $val->SettlementType;
                $cities->isbranch = $val->IsBranch;
                $cities->cityid = $val->CityID;
                $cities->settlementtypedesc = $val->SettlementTypeDescription;
                $cities->settlementtypedescru = $val->SettlementTypeDescriptionRu;
                $cities->save();
            } else {
                // check if exists branch (NpWarehouses) in city
                if ($excities[0]->isbranch != $val->IsBranch) {
                    $this->info(" City: " . $excities[0]->isbranch ." change isbranch to " . $val->IsBranch);
                    $excities[0]->isbranch = $val->IsBranch;
                    $excities->save();
                }
            }
        }
    }
}
