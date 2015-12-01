<?php

/** @var $this \yii\web\View */
/** @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" type="text/css" media="all" href="/style/style.css"/>
    <link rel="stylesheet" type="text/css" href="/style/css/media-queries.css"/>
    <link rel="stylesheet" type="text/css" href="/style/js/player/mediaelementplayer.css"/>
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700'
        rel="stylesheet" type='text/css'>
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="/style/css/ie8.css" media="all"/>
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="/style/css/ie9.css" media="all"/>
    <![endif]-->
    <script type="text/javascript" src="/style/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/style/js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="/style/js/retina.js"></script>
    <script type="text/javascript" src="/style/js/selectnav.js"></script>
    <script type="text/javascript" src="/style/js/jquery.masonry.min.js"></script>
    <script type="text/javascript" src="/style/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="/style/js/jquery.backstretch.min.js"></script>
    <script type="text/javascript" src="/style/js/mediaelement.min.js"></script>
    <script type="text/javascript" src="/style/js/mediaelementplayer.min.js"></script>
    <script type="text/javascript" src="/style/js/jquery.dcflickr.1.0.js"></script>
    <script type="text/javascript" src="/style/js/twitter.min.js"></script>
    <link rel="shortcut icon" href="/images/ico.png">
    <script type="text/javascript">
        $.backstretch("/style/images/bg/1.jpg");
    </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="scanlines"></div>

<!-- Begin Header -->
<div class="header-wrapper opacity">
    <div class="header" style="padding: 5px 5px 0px 5px;">
        <!-- Begin Logo -->
        <div class="logo" style="padding: 0px;">
            <a href="/">
                <img src="/images/LogoTPK_site_blog-01.png" alt="" height="68"/>
            </a>
        </div>
        <!-- End Logo -->
        <!-- Begin Menu -->
        <div id="menu-wrapper">
            <div id="menu" class="menu">
                <ul id="tiny">
                    <li><a href="/about">О компании</a></li>
                    <li><a href="/contact">Контакты</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <!-- End Menu -->
    </div>
</div>
<!-- End Header -->

<!-- Begin Wrapper -->
<div class="wrapper"><!-- Begin Intro -->

    <?= $content ?>

</div>
<!-- End Wrapper -->

<!-- Begin Footer -->
<div class="footer-wrapper">
    <div id="footer" class="four">
        <div id="first" class="widget-area">
            <div class="widget widget_search">
                <h3 class="widget-title">Поиск</h3>

                <form class="searchform" method="get" action="/search">
                    <input type="text" name="term" value="Введите слово ..." onFocus="this.value=''"
                           onBlur="this.value='Введите слово ...'"/>
                </form>
            </div>

        </div>
        <!-- #first .widget-area -->

        <div id="second" class="widget-area">
            <div class="widget widget_archive">
                <h3 class="widget-title">Архивы</h3>
                <?php
                $min = \app\models\Article::query()->select('min(date_insert)')->scalar();
                $dateMin = new DateTime($min);
                $dateNow = new DateTime();
                $rows = \app\models\Article::query()->select([
                    'count(*) as c1',
                    'YEAR(date) as year',
                    'MONTH(date) as month',
                ])
                ->groupBy([
                    'YEAR(date)',
                    'MONTH(date)',
                ])
                ->orderBy([
                    'YEAR(date)' => SORT_DESC,
                    'MONTH(date)' => SORT_DESC,
                ])
                ->all();
                /** @var int $max максиальный месяц с годом  0-11 */
                $max = $rows[0]['year']*12+$rows[0]['month'];
                $min = $rows[count($rows)-1]['year']*12+$rows[count($rows)-1]['month'];

                ?>
                <ul>
                    <?php for($i = $max; $i >= $min; $i--) { ?>
                        <?php
                        $month = $i%12;
                        $monthZero = $month;
                        if ($monthZero < 10) $monthZero = '0'.$monthZero;
                        $monthArray = [
                            'Январь',
                            'Февраль',
                            'Март',
                            'Апрель',
                            'Май',
                            'Июнь',
                            'Июль',
                            'Август',
                            'Сентябрь',
                            'Октябрь',
                            'Ноябрь',
                            'Декабрь',
                        ];
                        $year = floor($i/12);
                        $count = 0;
                        foreach($rows as $item) {
                            if ($item['year'] == $year && $item['month'] == $month) {
                                $count = $item['c1'];
                            }
                        }
                        ?>
                        <li><a href="<?= \yii\helpers\Url::to(['site/articles_month', 'year' => $year, 'month' => $monthZero]) ?>"><?= $monthArray[$month-1] ?> <?= $year ?></a> (<?= $count ?>)</li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- #second .widget-area -->



        <div id="fourth" class="widget-area">
        </div>
        <!-- #fourth .widget-area -->
    </div>
</div>
<div class="site-generator-wrapper">
    <div class="site-generator">ТПК 2015. Все права защищены.
    </div>
</div>
<!-- End Footer -->
<script type="text/javascript" src="/style/js/scripts.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
