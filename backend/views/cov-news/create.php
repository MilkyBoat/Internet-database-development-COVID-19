<?php
/**
 * Team:布里啾啾迪布利多,NKU
 * coding by 孙家宜 1810756,202005010
 * 由gii生成
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CovNews */

$this->title = 'Create Cov News';
$this->params['breadcrumbs'][] = ['label' => 'Cov News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cov-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
