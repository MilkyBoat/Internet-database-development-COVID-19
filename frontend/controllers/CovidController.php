<?php

/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 徐云凯 1713667
 * This is the main control unit of plague-map
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\response;
use common\models\CovidMap;

class CovidController extends Controller
{
    public function actionCovidInfo($type)
    {
        $geojson_t = file_get_contents('../web/storage/geojson/countries_data.json');
        $json_data = json_decode($geojson_t,true);
        
        if ($type == "latest"){
            $latestDate = CovidMap::find()->max('date');
            $r = array("latestDate" => $latestDate);
            $results = CovidMap::find()->where(['date' => $latestDate])->all();
            foreach ($r as $result){
                if ($r != NULL && isset($result["pid"])){
                    $rpid = $result["pid"];
                    $r[$rpid] = $result;
                }
            }

            foreach ($json_data["features"] as $c){
                $json_data["features"][$c["id"] - 1]["properties"]["date"] = $latestDate;
                $rec = isset($r[$c["id"]]) ? $r[$c["id"]] : NULL;
                $json_data["features"][$c["id"] - 1]["properties"]["num"] = 
                    $rec == NULL ? 0 : $rec["confirm"];
            }
        }

        Yii::$app->response->format=Response::FORMAT_JSON;
        return $json_data;
    }

    public function actionCountryDetail($pid)
    {
        $json_data = '{"test":"success"}';

        Yii::$app->response->format=Response::FORMAT_JSON;
        return $json_data;
    }
}
