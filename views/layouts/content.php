
<?php

/** @var $this \yii\web\View */
/** @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
\app\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?= Html::encode($this->title) ?> :: Школа Богов</title>
    <?= Html::csrfMetaTags() ?>
    <meta name="og:image" content="http://www.i-am-avatar.com/share.jpg">
    <meta name="og:url" content="http://www.i-am-avatar.com/">
    <meta name="og:title" content="Школа Богов">
    <meta name="og:description" content="Миссия: Трансформировать всех желающих людей в Богов-Аватаров наделенных божественными способностями. Установление на Планете Земля мира Богов Со-Творцов. Обучить всех дарить Любовь ближнему теми дарами и талантами, которые были даны Творцом от рождения. Обучение таким наукам как: ...">
    <link rel="shortcut icon" href="/images/ico.png">
    <?php $this->head() ?>
    <style type="text/css">
        a {
            color: white;
            text-decoration: underline;
        }
        a:hover {
            color: white;
            text-decoration: none;
        }
        a:visited {
            color: white;
            text-decoration: underline;
        }
        a:active {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>

<body style="margin: 0px 0px 0px 0px;">
<?php $this->beginBody() ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="background-image: url(/images/controller/site/index/bg.png); background-repeat: x;">

            <a href="/">
                <img
                src="/images/controller/site/index/Tesla-Gen-logo1-copy-5.jpg" width="800" height="800" alt="Школа Богов"
                />
        </a>
        </td>
    </tr>
    <tr>
        <td align="center" style="
    background-color: #1c69b7;
    color:white;
    font-family: Verdana;
    padding: 20px 0px 40px 0px;
    ">
            <?= $content ?>
        </td>
    </tr>


    <tr>
        <td align="center" style="
    background-color:#1c69b7;
    color:white;
    padding: 20px 0px 20px 0px;
    ">
            <a href="http://www.galaxysss.ru/" target="_blank">Галактический Союз Сил Света</a> ♥ <a
                href="http://www.galaxysss.ru/vasudev/login" target="_blank">Элитный Клуб Фрактального Бизнеса «Vasudev
                Bagavan»</a>
    </tr>
</table>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33748969 = new Ya.Metrika({
                    id:33748969,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33748969" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
