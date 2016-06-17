<?php
/* @var $this yii\web\View */
/* @var $model mosesfender\articles\models\ArtCategories */

echo $this->renderFile(realpath(__DIR__ . "/../layout/topmenu.php"));
?>
<div>
    <div class="legend">
        <div><span>ID:</span><span><?= $model->id; ?></span></div>
        <div><span><?= Yii::t("articles", "ID"); ?>:</span><span><?= $model->id; ?></span></div>
        <div><span><?= Yii::t("articles", "Created At"); ?></span><span><?= $model->created_at; ?></span></div>
        <div><span><?= Yii::t("articles", "Update At"); ?></span><span><?= $model->update_at; ?></span></div>
    </div>
    <div class="cont">
        <h1><?= $model->cat_title; ?></h1>
        <div><?= $model->cat_description; ?></div>
    </div>

    <div class="form-group">
        <a class="btn btn-danger btn-xs" href="<?= yii\helpers\Url::toRoute(["categories/update", "id" => $model->id]); ?>"><?= yii::t("articles", "Edit category"); ?></a>
        <a class="btn btn-success btn-xs" href="<?= yii\helpers\Url::toRoute("categories/index"); ?>"><?= yii::t("articles", "To list categories"); ?></a>
    </div>
</div>