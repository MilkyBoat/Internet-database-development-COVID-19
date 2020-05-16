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
use frontend\models\CovidMap;

class CovidController extends Controller
{
    public function actionCovidInfo($type)
    {
        $geojson_t = file_get_contents('../web/storage/geojson/countries_data.json');
        $json_data = json_decode($geojson_t,true);
        
        if ($type == "latest"){
            $latestDate = CovidMap::find()->max('date');

            foreach ($json_data["features"]["id"] as $c){
                $json_data["features"][$c["id"]]["properties"]["date"] = $latestDate;
                $rec = CovidMap::find()->where(['pid' => $c["id"], 'date' => $latestDate])->one();
                $json_data["features"][$c["id"]]["properties"]["num"] = $rec["confirm"];
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
