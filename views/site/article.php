<?php

/* @var $this yii\web\View */
/* @var $item app\models\Article */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = $item->getField('header');
?>

<div class="intro">
    <?= $this->title ?>
</div>

<div class="main-image">
    <div class="outer">
        <span class="inset"><img src="<?= \cs\Widget\FileUpload2\FileUpload::getOriginal($item->getImage()) ?>" alt=""
                                 width="1010"></span>
    </div>
</div>

<div class="content">

    <!-- Begin Post -->
    <div class="post format-image box">

        <div class="details">
            <span class="icon-image"><?= Yii::$app->formatter->asDate($item->getField('date')) ?></span>
        </div>

        <?= $item->getField('content') ?>

    </div>
    <!-- End Post -->


</div>

<div class="sidebar box">
    <div class="sidebox widget">
        <h3 class="widget-title">Поиск</h3>
        <form class="searchform" method="get" action="/search">
            <input type="text" name="term" value="Введите слово ..." onFocus="this.value=''"
                   onBlur="this.value='Введите слово ...'"/>
        </form>
    </div>
</div>

<div class="clear"></div>

<div class="intro">
</div>

<?= $this->render('../blocks/share', [
    'url'         => \yii\helpers\Url::current([], true),
    'image'       => \cs\Widget\FileUpload2\FileUpload::getOriginal($item->getImage()),
    'title'       => $this->title,
    'description' => \app\services\GsssHtml::getMiniText($item->getField('content')),
]) ?>
