<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/30
 * Time: 0:14
 */

namespace common\models;

use yii\base\Model;
use Yii;
use yii\rbac\Item;

class AuthItem extends Model{
    public $type;
    public $name;
    public $description;
    public $ruleName;
    public $data;

    private $_item;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ruleName'], 'in',
                'range' => array_keys(Yii::$app->authManager->getRules()),
                'message' => 'Rule not exists'],
            [['name', 'type','description'], 'required'],
            [['type'], 'integer'],
            [['description', 'data', 'ruleName'], 'default'],
            [['name', 'ruleName'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'type' => '类型',
            'description' => '描述',
            'ruleName' => '规则名称',
            'data' => '数据',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function save()
    {
        $manager = Yii::$app->authManager;
        if($this->type == Item::TYPE_ROLE){
            $this->_item = $manager->createRole($this->name);
        }else{
            $this->_item = $manager->createPermission($this->name);
        }
        $this->_item->name = $this->name;
        $this->_item->description = $this->description;
        $this->_item->ruleName = $this->ruleName;
        $this->_item->data = $this->data;

        $manager->add($this->_item);
        return true;
    }
}