<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 袁嘉蔚 1810546,20200529
 * a view for PcounterSave
 */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PcounterSaveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Traffic Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
online: <?php echo Yii::$app->userCounter->getOnline(); ?><br />
today: <?php echo Yii::$app->userCounter->getToday(); ?><br />
yesterday: <?php echo Yii::$app->userCounter->getYesterday(); ?><br />
total: <?php echo Yii::$app->userCounter->getTotal(); ?><br />
maximum: <?php echo Yii::$app->userCounter->getMaximal(); ?><br />
date for maximum: <?php echo date('Y.m.d', Yii::$app->userCounter->getMaximalTime()); ?>
</div>
<div class="pcounter-save-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pcounter Save', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'save_name',
            'save_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
