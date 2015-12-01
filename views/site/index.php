<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'ТПК';
?>

<div class="intro">
    ТПК — ВЕДУЩАЯ РОССИЙСКАЯ ПРОЦЕССИНГОВАЯ КОМПАНИЯ НА РЫНКЕ БЕЗНАЛИЧНОГО ОТПУСКА НЕФТЕПРОДУКТОВ
</div>

<!-- Begin Blog Grid -->
<div class="blog-wrap">
    <!-- Begin Blog -->
    <div class="blog-grid">

        <?php foreach ($list as $item) { ?>
            <?php $article = new \app\models\Article($item) ?>
            <?php if ($article->getField('video')) { ?>
                <div class="post format-video box">
                    <div class="video frame">
                        <iframe width="100%" height="281" src="<?= $article->getField('video') ?>"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <h2 class="title"><a href="<?= $article->getLink() ?>"><?= $item['header'] ?></a></h2>

                    <p><?= $item['description'] ?></p>

                    <div class="details">
                        <span class="icon-image"><a href="#"><?= Yii::$app->formatter->asDate($item['date']) ?></a></span>
                    </div>

                </div>
            <?php } else { ?>
                <div class="post format-image box">
                    <div class="frame">
                        <a href="<?= $article->getLink() ?>">
                            <img src="<?= $item['image'] ?>" alt=""/>
                        </a>
                    </div>
                    <h2 class="title"><a href="<?= $article->getLink() ?>"><?= $item['header'] ?></a></h2>

                    <p><?= $item['description'] ?></p>

                    <div class="details">
                        <span class="icon-image"><a href="#"><?= Yii::$app->formatter->asDate($item['date']) ?></a></span>
                    </div>
                </div>
            <?php } ?>


        <?php } ?>



    </div>
    <!-- End Blog -->

    <?php if ($pagesCount > 1) { ?>
        <div id="navigation">
            <?php if ($page > 1) { ?>
                <div class="nav-previous"><a href="<?= \yii\helpers\Url::current(['page'=> $page - 1])?>"><span class="meta-nav-prev">← Назад</span></a></div>
            <?php } ?>
            <?php if ($page < $pagesCount) { ?>
                <div class="nav-next"><a href="<?= \yii\helpers\Url::current(['page'=> $page + 1])?>" ><span class="meta-nav-next">Вперед &rarr;</span></a></div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<!-- End Blog Grid -->
