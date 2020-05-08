<?php

/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200505
 */
use yii\rest\IndexAction;
?>

<aside class='shadow'>
<?php
echo \yii\bootstrap4\Nav::widget([
    'options'=>[
        'class'=>'d-flex flex-column nav-pills'
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => ['/site/index']
        ],
        [
            'label' => 'Videos',
            'url' => ['/video/index']
        ]
    ]
])
?>
</aside>

