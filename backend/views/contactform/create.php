<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 袁嘉蔚 1810546,20200509
 * a view for contactform
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\contactform */

$this->title = 'Create Contactform';
$this->params['breadcrumbs'][] = ['label' => 'Contactforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
