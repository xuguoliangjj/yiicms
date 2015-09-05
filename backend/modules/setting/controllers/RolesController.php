<?php

namespace backend\modules\setting\controllers;
use \backend\components\BaseController;
use common\models\searchs\AuthItemSearch;
use common\models\AuthItem;
use Yii;
use yii\rbac\Item;
use yii\web\NotFoundHttpException;

class RolesController extends BaseController
{
    public function actionIndex()
    {
        $model = new AuthItemSearch(['type'=>Item::TYPE_ROLE]);
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
        if($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            return $this->redirect(['view','id'=>$model->name]);
        }else{
            return $this->render('create',[
                'model'=>$model
            ]);
        }
    }

    //删除角色，id是角色名
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Yii::$app->authManager->remove($model->item);         //删除角色
        $this->redirect(['index']);
    }

    //修改角色名、简述。。
    public function actionUpdate($id)
    {
        $model =  $this->findModel($id);
        if($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        }
        return $this->render('update',[
            'model'=>$model
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view');
    }

    protected function findModel($id)
    {
        $item = Yii::$app->getAuthManager()->getRole($id);
        if ($item) {
            return new AuthItem($item);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
