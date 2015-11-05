<?php

namespace backend\modules\setting\controllers;

use \backend\components\BaseController;
use backend\modules\setting\models\AssignmentForm;
use backend\modules\setting\models\searchs\UserSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use Yii;


class UserController extends BaseController
{
    public function actionIndex()
    {
        $model = new UserSearch();
        $dataProvider = $model -> search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ]);
    }

    public function actionView($id)
    {
        $model = new AssignmentForm();
        $authManager = Yii::$app->authManager;
        $roles = $authManager->getRoles();
        $model->roles = ArrayHelper::map($roles,'name','description');
        foreach ($authManager->getPermissions() as $name => $role) {
            if (empty($term) or strpos($name, $term) !== false) {
                if(isset($role->name[0]) && $role->name[0] == '/')
                    $model->permissions[$name] = $role->description;
            }
        }
        return $this->render('view',[
            'model'=>$model,
            'roles'=>$roles
        ]);
    }

    /**
     * @param $pk
     */
    public function actionChangeName($pk)
    {
        $model = UserSearch::findOne($pk);
        if($model)
        {
            $model->load(Yii::$app->request->get());
            if($model->update())
            {
                echo Json::encode(array('status' => 'success'));
            }else{
                echo Json::encode(array('status' => 'error','msg'=>'修改名称失败'));
            }
        }else{
            echo Json::encode(array('status' => 'error','msg'=>'不存在此人'));
        }
        Yii::$app->end();
    }

    /**
     * @param $pk
     */
    public function actionChangeTime($pk)
    {
        $model = UserSearch::findOne($pk);
        if($model)
        {
            $model->load(Yii::$app->request->get());
            $model->created_at = strtotime($model->created_at);

            if($model->update())
            {
                echo Json::encode(array('status' => 'success'));
            }else{
                echo Json::encode(array('status' => 'error','msg'=>'修改时间失败'));
            }
        }else{
            echo Json::encode(array('status' => 'error','msg'=>'不存在此人'));
        }
        Yii::$app->end();
    }

}
