<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 孙家宜 1810756,202005010
 * 由gii生成
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CovResearch */

$this->title = 'Create Cov Research';
$this->params['breadcrumbs'][] = ['label' => 'Cov Researches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cov-research-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
