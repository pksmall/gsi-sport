<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class getNpWarehouses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getnpwarehouses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and store NP warehouses in DB.';

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
        $jsonReq = "
        {
            \"modelName\": \"AddressGeneral\",
	        \"calledMethod\": \"getWarehouses\",
	        \"methodProperties\": {
	            \"Language\": \"ru\",
	            \"CityRef\": \"%s\"
	        },
            \"apiKey\": \"" . $_ENV['NP_APIKEY'] . "\"
        }";

        //$this->info("Url: " . $url . " jsonreq: " . $jsonReq);

        $excities = \App\NpCities::all();
        foreach ($excities as $city) {
            $this->info("City: " . $city->nameru . " IsBranch:" . $city->isbranch);
            $json = sprintf($jsonReq, $city->ref);
            //$this->info($json);

            $resData = $this->getDataJson($json);
            foreach ($resData->data as $key => $val) {
                $warehouses = \App\NpWarehouses::where('sitekey', '=', $val->SiteKey);
                if ($warehouses->count() == 0) {
                    $this->info(" N: " . $val->DescriptionRu . " City:" . $val->CityDescriptionRu . " is save");
                    $warehouse = new \App\NpWarehouses();
                    $warehouse->sitekey = $val->SiteKey;
                    $warehouse->description = $val->Description;
                    $warehouse->descriptionru = $val->DescriptionRu;
                    $warehouse->shortaddress = $val->ShortAddress;
                    $warehouse->shortaddressru = $val->ShortAddressRu;
                    $warehouse->typeofwarehouse = $val->TypeOfWarehouse;
                    $warehouse->ref = $val->Ref;
                    $warehouse->number = $val->Number;
                    $warehouse->cityref = $val->CityRef;
                    $warehouse->citydescription = $val->CityDescription;
                    $warehouse->citydescriptionru = $val->CityDescriptionRu;
                    $warehouse->warehousestatus = $val->WarehouseStatus;
                    $warehouse->save();
                }
            }
        }
    }

    private function getDataJson($json) {
        $url = $_ENV['NP_CITIES_GET_URL'];

        $ch = curl_init($url);
        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($ch);
        //$this->info($result);
        //$this->info(print_r(json_decode($result), true));
        $resData = json_decode($result);
        curl_close($ch);

        return $resData;
    }
}
