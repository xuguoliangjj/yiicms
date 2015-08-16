<?php

namespace backend\modules\setting\controllers;
use \backend\components\BaseController;
use common\models\search\RolesSearch;
use Yii;

class RolesController extends BaseController
{
    public function actionIndex()
    {

        $model = new RolesSearch();
        $dataProvider = $model->search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionView($id)
    {
        return $this->render('view');
    }

}
