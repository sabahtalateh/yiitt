<?php

namespace app\modules\brackets\controllers;

use app\modules\brackets\models\DataString;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Brackets` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new DataString();

        $model->load(Yii::$app->request->post());
        $model->validate();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
