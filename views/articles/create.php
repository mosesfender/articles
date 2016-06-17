<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mosesfender\articles\models\Articles */
/* @var $form ActiveForm */
$cats = mosesfender\articles\models\ArtCategories::find();

echo $this->renderFile(realpath(__DIR__ . "/../layout/topmenu.php"));
?>
<div class="formArticle">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->hiddenInput() ?>
        <?= $form->field($model, 'cat_id')->dropDownList(\yii\helpers\ArrayHelper::map($cats->asArray()->all(), "id", "cat_title")) ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'art_title')->textInput() ?>
        <?= $form->field($model, 'art_subtitle')->textInput() ?>
        <?= $form->field($model, 'art_text')->textarea() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('articles', 'Submit'), ['class' => 'btn btn-danger']) ?>
            <?= Html::a(Yii::t('articles', 'To list'), "index", ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- formArticle -->
