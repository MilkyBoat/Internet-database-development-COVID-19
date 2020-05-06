<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200504
 * This is the view of video
 */

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $model Video */
/** @var $similarVideos Video[] */

?>
<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>"
                   controls></video>
        </div>
        <h6 class="mt-2"><?php echo $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php echo $model->getViews()->count() ?> views •
                <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                <?php echo $this->render('buttons', [
                    'model' => $model
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
        <div>
            <p><?php echo Html::a($model->createdBy->username,[
                    '/channel/view','username'=>$model->createdBy->username
                ])?></p>
             <?php echo Html::encode($model->description)?>
        </div>

    </div>

</div>