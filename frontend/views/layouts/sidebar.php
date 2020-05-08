<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200504
 * 侧边导航
 */

use yii\rest\IndexAction;
?>

<aside class='shadow'>
    <?php
    $menuItems = [
        ['label' => 'Home', 'url' => ['/video/index']],
        ['label' => 'History', 'url' => ['/video/history']],

    ];
    if (Yii::$app->user->isGuest) {
    } else {
        $menuItems[] = [
            'label'=> 'Create',
            'url'=>['/video/create']
        ];
        $menuItems[]=['label'=>'My videos','url'=>['/video/myvideo']];
    }?>
<?php
echo \yii\bootstrap4\Nav::widget([
    'options'=>[
        'class'=>'d-flex flex-column nav-pills'
    ],
    'items' => $menuItems,
])
?>
</aside>
