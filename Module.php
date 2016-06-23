<?php

/**
 * @author Moses Fender <mosesfender@gmail.com>
 */

namespace mosesfender\articles;

class Module extends \yii\base\Module implements \yii\base\BootstrapInterface {

    /**
     * @param yii\web\Application $app
     */
    public function bootstrap($app) {
        $app->getUrlManager()->addRules([
            ["class" => "yii\web\UrlRule", "pattern" => "{$this->id}/?", "route" => "{$this->id}/articles/index"],
            ["class" => "yii\web\UrlRule", "pattern" => "{$this->id}/<controller:[\w\-]+>/<action:[\w\-]+>", "route" => "{$this->id}/<controller>/<action>"],
            ["class" => "yii\web\UrlRule", "pattern" => "{$this->id}/categories/<id:\w+>", "route" => "{$this->id}/categories/view"],
            ["class" => "yii\web\UrlRule", "pattern" => "{$this->id}/articles/<id:\w+>", "route" => "{$this->id}/articles/view"],
        ]);
    }

    public function init() {
        parent::init();
    }

    public function beforeAction($action) {
        /* @var $action yii\base\InlineAction */
        return parent::beforeAction($action);
    }

}
