<?php

namespace backend\modules\setting\controllers;

use \backend\components\BaseController;
use common\models\AuthItem;
use common\models\searchs\AuthItemSearch;
use yii\rbac\Item;
use Yii;

class PermissionController extends BaseController
{
    /*
     * 权限列表
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch(['type'=>Item::TYPE_PERMISSION]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new AuthItem();
        $model->type=Item::TYPE_PERMISSION;
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['view','id'=>$model->name]);
        }else {
            return $this->render('create',['model'=>$model]);
        }
    }

    public function actionView($id)
    {
        $model = AuthItem::find($id);
        return $this->render('view',['model'=>$model]);
    }
}
