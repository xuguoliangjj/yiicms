<?php

namespace backend\modules\setting\controllers;

use backend\components\BaseController;
use common\models\Route;
use common\models\searchs\AuthItemSearch;
use Yii;

class RouteController extends BaseController
{
    public function actionIndex()
    {
        $model = new AuthItemSearch();
        $dataProvider = $model->search(Yii::$app->request->get());
        return $this->render('index',['model'=>$model,'dataProvider'=>$dataProvider]);
    }

    /**
     * 新增路由
     * @return string
     */
    public function actionCreate()
    {
        $model = new Route();
        if($model->load(Yii::$app->request->post()))
        {
            //按照逗号分隔数组
            $routes= preg_split('/\s*,\s*/', trim($model->route), -1, PREG_SPLIT_NO_EMPTY);
            $descriptions= preg_split('/\s*,\s*/', trim($model->description), -1, PREG_SPLIT_NO_EMPTY);
            $model->save($routes,$descriptions);
        }
        return $this->render('create',['model'=>$model]);
    }

}
