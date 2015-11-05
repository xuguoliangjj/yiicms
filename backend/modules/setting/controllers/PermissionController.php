<?php

namespace backend\modules\setting\controllers;

use \backend\components\BaseController;
use backend\modules\setting\models\AuthPermissionForm;
use backend\modules\setting\models\AuthItem;
use backend\modules\setting\models\searchs\AuthItemSearch;
use yii\helpers\Json;
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
        $model = new AuthPermissionForm();
        $result = [
            'Permissions' => [],
            'Routes' => [],
        ];
        $authManager = Yii::$app->authManager;
        $children = array_keys($authManager->getChildren($id));
        $children[] = $id;
        foreach ($authManager->getPermissions() as $name => $role) {
            if (empty($term) or strpos($name, $term) !== false) {
                $result[$name[0] === '/' ? 'Routes' : 'Permissions'][$name] = $role->description;
            }
        }

        return $this->render('view',['model'=>$model,'result'=>$result]);
    }
}
