<?php

$this->title = 'Официальный Реестр Бого-людей'
?>

<div class="container">

    <h1 class="page-header text-center"><?= $this->title ?></h1>

    <p>Этот список подтверждает что все нижеперечисленные приняли Волю Творца, то есть принял(а) ответственность за строительство <a target="_blank" href="/newEarth" target="_blank">Новой Земли</a> и принял(а) решение следовать <a target="_blank" href="https://www.galaxysss.com/newEarth/order">Божественному Порядку</a> добровольно. Это означает что он(она):</p>
    <p>1. Является полноправным хозяином планеты Земля по принципу совладения.</p>
    <p>2. Находится под защитой <a href="https://www.galaxysss.com/newEarth/service/vozdayanie" target="_blank">Братства Кольца Света Легиона Архангелов Голубого Пламени и Розы Мира</a>.</p>
    <p>3. Подпадает под юрисдикцию Божественного Союза Справедливости Творца, что означает, что любой, кто взаимодействует с ним отвечает за каждый поступок, слово и мысль по меркам Вечности.</p>
    <p>4. Становится экспертом <a href="https://www.galaxysss.com/newEarth/service/sert" target="_blank">Агентства Сертификации Золотой Век Творца</a> и имеетполномочия проводить экспертизы на предмет соответствия <a target="_blank" href="https://www.galaxysss.com/newEarth/order">Стандарту Золотого Века Творца</a>.</p>

    <?php \yii\widgets\Pjax::begin() ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => \app\models\God::find(),
            'sort' => new \yii\data\Sort([
                'attributes' => [
                    'id',
                    'name_first',
                    'name_last',
                    'name_middle',
                    'date',
                ]
            ])
        ]),
        'tableOptions' => [
            'class' => 'table',
        ],
        'columns' => [
            'id',
            'name_first',
            'name_last',
            'name_middle',
            'date:date:Дата',
        ]
    ]) ?>
    <?php \yii\widgets\Pjax::end() ?>

    <div style="margin: 50px 0px 0px 0px;">
    <?= $this->render('../blocks/share', [
    'url' => \yii\helpers\Url::current([], true),
    'image' => \yii\helpers\Url::to('/images/controller/site/voznesenie2016/afisha.jpg', true),
    'title' => $this->title,
    'description' => 'На семинаре мы проведем Лабораторную работу по запуску Реактора Вознесения, который будет выполнять подъем частоты вибрации коллективного сознания Планеты Земля на частоту Любви и Света путем генерации Адамантовых частиц Света и активации Многомерного Сознания Аватара Свободы. Для запуска Ректора мы проведем поиск Магнитного Центра Города Москвы для установки в него печати Самоосозания Аватара Свободы &ndash; светокристаллической матрицы ДНК сверхсознания Бого-Людей и подключим Реактор к этому Магнитному Кристаллу, чтобы насыщение коллективного сверхсознания (безсознательного) города Москва Адамантовыми частицами Света было постоянным и устойчивым, а канал был широким и выдерживал высокие нагрузки.',
]) ?>
</div>