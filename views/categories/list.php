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
            'pageSize' => 2,
        ],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], [
                'attribute' => 'id',
            ], [
                'attribute' => 'cat_title',
            ], [
                'attribute' => 'cat_description',
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
    <a class="btn btn-primary btn-xs" href="<?= yii\helpers\Url::toRoute("categories/create") ?>"><?= Yii::t("articles", "New category") ?></a>
</div>