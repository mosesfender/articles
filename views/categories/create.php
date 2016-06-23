<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mosesfender\articles\models\ArtCategories */
/* @var $form ActiveForm */

echo $this->renderFile(realpath(__DIR__ . "/../layout/topmenu.php"));
?>
<div class="formArticle">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->hiddenInput() ?>
        <?= $form->field($model, 'cat_title')->textInput() ?>
        <?= $form->field($model, 'cat_description')->textarea() ?>
        <?= $form->field($model, 'status') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('articles', 'Submit'), ['class' => 'btn btn-danger btn-xs']) ?>
            <?= Html::a(Yii::t('articles', 'To list'), "index", ['class' => 'btn btn-success btn-xs']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- formArticle -->
