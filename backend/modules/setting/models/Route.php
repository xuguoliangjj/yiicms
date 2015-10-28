<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/9/5
 * Time: 20:49
 */
namespace backend\modules\setting\models;

use yii\base\Model;
use Yii;

class Route extends Model{
    /**
     * @var 路由url
     */
    public $route;

    public $description;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return[
            [['route','description'],'required'],
            [['route','description'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'route' => '路由',
            'description' => '描述'
        ];
    }


    public function save($routes,$descriptions)
    {
        if($this->validate()){
            $auth = Yii::$app->authManager;
            foreach($routes as $key => $route){
                $item = $auth->createPermission('/' . trim($route,'/'));
                $item->description = $descriptions[$key];
                $auth->add($item);
            }
            return true;
        }else{
            return false;
        }
    }

    public function search()
    {
        $auth = Yii::$app->authManager;
        $items = $auth->getPermissions();
        $result = [];
        foreach($items as $item){
            $result[]=[
                'name'=>$item->name,
                'description'=>$item->description
            ];
        }
    }
}