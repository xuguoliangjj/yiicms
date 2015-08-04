<?php

namespace backend\modules\setting\controllers;

use \backend\components\BaseController;
use common\models\User;
use yii\helpers\Json;
use Yii;


class UserController extends BaseController
{
    public function actionIndex()
    {
        $model = new User();
        $dataProvider = $model -> search();
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ]);
    }

    /**
     * @param $pk
     */
    public function actionChangeName($pk)
    {
        $model = User::findOne($pk);
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
        $model = User::findOne($pk);
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
