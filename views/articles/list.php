<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model mosesfender\articles\models\Articles */
/* @var $searchModel mosesfender\articles\models\ArticlesSearch */

echo $this->renderFile(realpath(__DIR__ . "/../layout/topmenu.php"));
?>

<div>
    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => $searchModel->find(),
        'pagination' => [
            'pageSize' => 5,
        ],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], [
                'attribute' => 'id',
            ], [
                'attribute' => 'art_title',
                'content' => function($data) {
                    return yii\helpers\StringHelper::truncate($data->toArray()["art_title"], 60);
                }
            ], [
                'attribute' => 'cat_id',
                'label' => yii::t("articles", "Cat Title"),
                'content' => function($data) {
                    /* @var $data mosesfender\articles\models\ArticlesSearch */
                    return $data->category["cat_title"];
                }
            ], [
                'attribute' => 'status',
                'content' => function($data) {
                /* @var $data mosesfender\articles\models\ArticlesSearch */
                    return $data->enabled;
                }
            ], [
                'class' => 'yii\grid\ActionColumn',
            ], [
                'attribute' => 'created_at',
                'format' => ['datetime']
            ], [
                'attribute' => 'update_at',
                'format' => ['datetime']
            ]
        ],
    ]);
    ?>
</div>
<div class="form-group">
    <a class="btn btn-primary btn-xs" href="<?= yii\helpers\Url::toRoute("articles/create") ?>"><?= Yii::t("articles", "New Article") ?></a>
</div>