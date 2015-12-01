<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;

$this->title = 'Статьи';

$this->registerJs(<<<JS
$('.buttonDelete').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите удаление')) {
            var b = $(this);
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/articleList/' + id + '/delete',
                success: function (ret) {
                    showInfo('Успешно', function() {
                        b.parent().parent().remove();
                    });
                }
            });
        }
    });
JS
);
?>

<div class="container">
    <div class="page-header">
        <h1>Статьи</h1>
    </div>


    <?= \yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => \app\models\Article::query()->orderBy(['date_insert' => SORT_DESC]),
                    'pagination' => [
                      'pageSize' => 20,
                    ],
            ]),
    'columns' => [
        'id',
        [
            'header' => 'Картинка',
            'content' => function($item) {
                if ($item['image']) {
                    return Html::a(Html::img($item['image'],[
                        'class'=>'thumbnail',
                        'width'=>80,
                        'style'=>'margin-bottom: 0px;',

                    ]), ['admin_article/edit', 'id' => $item['id'] ])
                        ;
                } else if ($item['video']) {
                    $video = $item['video'];
                    $video = new \cs\services\Url($video);
                    $video = explode('/', $video);
                    $video = $video[count($video)-1];
                    return Html::a($video, ['admin_article/edit', 'id' => $item['id'] ])
                        ;
                }
            },
        ],
        [
            'header' => 'Название',
            'content' => function($item) {
                return Html::a($item['header'], ['admin_article/edit', 'id' => $item['id'] ]);
            },
        ],
        'date_insert:datetime:Дата добавления',
        [
            'header' => 'Удалить',
            'content' => function($item) {
                return Html::button('Удалить',[
                    'class'=>'btn btn-danger btn-xs buttonDelete',
                    'data-id'=>$item['id'],
                ]);
            },
        ]
      ],
    ])?>
    <a href="<?= Url::to(['admin_article/add'])?>" class="btn btn-default">Добавить</a>


</div>