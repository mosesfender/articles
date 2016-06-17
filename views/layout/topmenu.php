<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container">
    <?= Html::a(Yii::t("articles", "Categories"), "/articles/categories/", ["class" => "btn btn-warning btn-sm"]); ?>
    <?= Html::a(Yii::t("articles", "Articles"), "/articles/articles/", ["class" => "btn btn-warning btn-sm"]); ?>
</div>