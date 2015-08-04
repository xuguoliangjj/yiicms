<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/30
 * Time: 19:29
 */
namespace xuguoliangjj\editorgridview;

use yii\base\InvalidConfigException;
use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class EditorDataColumn extends DataColumn
{
    /*
     * 是否可编辑
     * ['editor',function(){
     *      return [];
     * }]
     */
    public $editable = [];

    /**
     * @inheritdoc
     * @param mixed $model
     * @param mixed $key
     * @param int $index
     * @return null|string
     * @throws InvalidConfigException
     */
    public function getDataCellValue($model, $key, $index)
    {
        if(count($this -> editable) == 2)
        {
            if(is_string($this->editable[0]) && $this->editable[0]=='editor')
            {
                $editorConfig = call_user_func($this->editable[1], $model, $key, $index, $this);
                $this->initEditableColumns($model,$editorConfig);
                if ($this->value !== null) {
                    if (is_string($this->value)) {
                        return Html::a(ArrayHelper::getValue($model, $this->value),'',$editorConfig);
                    } else {
                        return Html::a(call_user_func($this->value, $model, $key, $index, $this),'',$editorConfig);
                    }
                } elseif ($this->attribute !== null) {
                    return Html::a(ArrayHelper::getValue($model, $this->attribute),'',$editorConfig);
                }
            }else{
                throw new InvalidConfigException('配置错误');
            }
            return null;
        }else {
            return parent::getDataCellValue($model,$key,$index);
        }
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            return $this->grid->formatter->format($this->getDataCellValue($model, $key, $index), $this->format);
        } else {
            return parent::renderDataCellContent($model, $key, $index);
        }
    }

    /*
     *
     */
    protected function initEditableColumns($model,&$columns)
    {
       if(!isset($columns['class']))
       {
           $columns['class'] = $this->attribute;
       }
       if(!isset($columns['data-title']))
       {
           $columns['data-title'] = $model->getAttributeLabel($this->attribute);
       }
    }
}