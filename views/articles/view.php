<?php
/* @var $this yii\web\View */
/* @var $model mosesfender\articles\models\Articles */

echo $this->renderFile(realpath(__DIR__ . "/../layout/topmenu.php"));
?>
<div>
    <div class="legend">
        <div><span>ID:</span><span><?= $model->id; ?></span></div>
        <div><span><?= Yii::t("articles", "Cat Title"); ?>:</span><span><?= $model->category->cat_title ?></span></div>
        <div><span><?= Yii::t("articles", "Created At"); ?>:</span><span><?= $model->created_at; ?></span></div>
        <div><span><?= Yii::t("articles", "Update At"); ?>:</span><span><?= $model->update_at; ?></span></div>
    </div>
    <div class="cont">
        <h1><?= $model->art_title; ?></h1>
        <h2><?= $model->art_subtitle; ?></h2>
        <div><?= $model->art_text; ?></div>
    </div>

    <div class="form-group">
        <a class="btn btn-danger" href="<?= yii\helpers\Url::toRoute(["articles/update", "id" => $model->id]); ?>"><?= yii::t("articles", "Edit article"); ?></a>
        <a class="btn btn-success" href="<?= yii\helpers\Url::toRoute("articles/index"); ?>"><?= yii::t("articles", "To list"); ?></a>
    </div>
</div>