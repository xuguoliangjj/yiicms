<?php

namespace common\models\search;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use Yii;
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/9
 * Time: 16:23
 */
class RolesSearch extends Model
{
    public $type;
    public $name;
    public $description;
    public $ruleName;
    public $data;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'safe'],
            [['type'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '用户名',
        ];
    }

    public function search($params)
    {
        $auth = Yii::$app->authManager;
        $roles = $auth->getRoles();
        if($this->load($params)) {
            $name = strtolower(trim($this->name));
            $roles = array_filter($roles, function ($role) use ($name){
                return (empty($name) || strpos((strtolower($role->name)),$name) != false);
            });
        }
        return new ArrayDataProvider([
            'allModels'=>$roles
        ]);
    }
}