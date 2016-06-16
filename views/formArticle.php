<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mosesfender\articles\models\Articles */
/* @var $form ActiveForm */
?>
<div class="formArticle">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cat_id') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'art_text') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('articles', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- formArticle -->
