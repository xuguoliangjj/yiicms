<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/2
 * Time: 12:48
 */
namespace common\models\search\UserSearch;
use \yii\db\ActiveRecord;
class UserSearch extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username','min'=>2,'max'=>'255'],
            ['email','email'],
            //['created_at,updated_at',''],
        ];
    }
}