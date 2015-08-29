<?php

namespace backend\modules\setting\controllers;
use \backend\components\BaseController;
use common\models\searchs\AuthItemSearch;
use common\models\AuthItem;
use Yii;
use yii\rbac\Item;

class RolesController extends BaseController
{
    public function actionIndex()
    {
        $model = new AuthItemSearch();
        $dataProvider = $model->search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ]);
    }

    public function actionCreate()
    {
        $model = new AuthItem();
        $model->type=Item::TYPE_ROLE;             //角色
        if($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['view','id'=>$model->name]);
        }else{
            return $this->render('create',[
                'model'=>$model
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view');
    }

}
