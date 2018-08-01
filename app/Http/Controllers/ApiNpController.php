<?php

namespace App\Http\Controllers;

use App\NpCities;
use App\NpRegions;
use App\NpWarehouses;
use App\Repositories\NpCitiesModel;
use App\Repositories\NpWarehousesModel;
use App\Repositories\NpCitiesRepositoryInterface;
use App\Repositories\NpWarehousesRepositoryInterface;
use Illuminate\Http\Request;

class ApiNpController extends Controller
{
    public function __construct(
        NpCitiesRepositoryInterface         $citiesRepository,
        NpWarehousesRepositoryInterface     $warehousesRepository
    )
    {
        $this->cities = $citiesRepository;
        $this->warehouses = $warehousesRepository;
    }

    public function get_np_cities(Request $request)
    {
        app('debugbar')->disable();
        try {
            $regionref = $request->input('region');

            //get cities with branch
            $cities = $this->cities->findWithParams(['regionref' => $regionref])->get();
            $retData = array();
            $retData[] = array("name" => "Выберите город", "cityref" => "");
            foreach ($cities as $city) {
                //echo $city->nameru." ".$city->ref."\n";
                $retData[] = array("name" => $city->nameru, "cityref" => $city->ref);
            }
            return response()->json(
                [
                    'response' => 'success',
                    'data' => json_encode($retData)
                ], 200);
        } catch (\Exception $e) {
            return response()->json(
              [
                  'response' => 'error',
                  'data' => [],
                  'message' => sprintf('Error getting cities %s', $e->getMessage())
              ], 400);
        }
    }

    public function get_np_warehouses(Request $request)
    {
        app('debugbar')->disable();
        try {
            $cityref = $request->input('city');

            // get warehouse in city
            $warehouses = $this->warehouses->findWithParams(['cityref' => $cityref])->get();
            $retData = array();
            //$retData[] = array("name" => "Выберите отделение", "sitekey" => "");
            foreach ($warehouses as $warehouse) {
                //echo $warehouse->descriptionru."\n";
                $aShort = explode(",", $warehouse->shortaddressru);
                $shortStart  = "";
                foreach ($aShort as $tkey => $tval) {
                    if ($tkey == 0) {continue;}
                    //Log::info("k");
                    $shortStart = $shortStart ." ".$tval;
                }
                if (strlen($shortStart) != 0) {
                    $strToArr = "Отделение №" . $warehouse->number .", ". $shortStart . " ". strlen($shortStart);
                } else {
                    $strToArr = $warehouse->descriptionru;
                }
                if (strlen($strToArr) == 0) {
                    $strToArr = $warehouse->description;
                }
                //echo $strToArr."\n";
                $retData[] = array("name" => $strToArr, "sitekey" => $warehouse->sitekey);
            }
            return response()->json(
                [
                    'response' => 'success',
                    'raw' => $retData,
                    'data' => json_encode($retData)
                ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'response' => 'error',
                    'data' => [],
                    'message' => sprintf('Error getting warehouses %s', $e->getMessage())
                ], 400);
        }
    }
}
