<?php

/** @var $url */
/** @var $image */
/** @var $title */
/** @var $summary */
/** @var $description */

use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use cs\services\Url as csUrl;

$this->registerMetaTag(['name' => 'og:image', 'content' => $image]);
$this->registerMetaTag(['name' => 'og:url', 'content' => $url]);
$this->registerMetaTag(['name' => 'og:title', 'content' => $title]);
$this->registerMetaTag(['name' => 'og:description', 'content' => $description]);

?>

<a target="_blank" class="btn btn-primary" href="<?= (new csUrl('http://www.facebook.com/sharer.php', [
    'u' => $url,
]))->__toString() ?>"> Поделиться в FaceBook</a>
