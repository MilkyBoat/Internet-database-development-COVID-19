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
                $json_data["features"][$c["id"]]["properties"]["num"] = array(
                    "con" => $rec["confirm"],
                    "sus" => $rec["suspect"],
                    "cur" => $rec["cured"],
                    "dea" => $rec["death"]
                );
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


// User::find()->all(); 此方法返回所有数据返回所有数据所有数据
// ::findOne($id);   此方法返回1 的一条数据
// ::find()->where(['name' => '小伙儿'])->one();   此方法返回'name' => '小伙儿'] 的一条数据
// ::find()->where(['name' => '小伙儿'])->all();   此方法返回'name' => '小伙儿'] 的所有数据
// ::find()->orderBy('id DESC')->all();   此方法是排序查询
// ::findBySql('SELECT * FROM user')->all();  此方法是用
// ::findBySql('SELECT * FROM user')->one();  此方法是用
// ::find()->andWhere(['sex' => '男', 'age' => '24'])->count('id');   统计符合条件的总条数
// ::find()->andFilterWhere(['like', 'name', '小伙儿']); 此方法是用
// ::find()->one();    此方法返回一条数据返回一条数据一条数据
// ::find()->all();    此方法返回所有数据返回所有数据所有数据
// ::find()->count();    此方法返回记录的数量
// ::find()->average();    此方法返回指定列的平均值回指定列的平均值
// ::find()->min();    此方法返回指定列的最小值回指定列的最小值
// ::find()->max();    此方法返回指定列的最大值回指定列的最大值
// ::find()->scalar();    此方法返回值的第一行第一列的查询结果的第一行第一列的查询结果第一列的查询结果
// ::find()->column();    此方法返回查询结果中的第一列的值
// ::find()->exists();    此方法返回一个值指示是否包含查询结果的数据行
// ::find()->batch(10);  每次取次取10 条数据数据
// ::find()->each(10);  每次取次取10 条数据数据



}
