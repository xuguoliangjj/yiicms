<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/27
 * Time: 11:51
 */
namespace xuguoliangjj\editorgridview;

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\Model;

class EditorGridView extends GridView
{
    public $dataColumnClass;
    public $tableOptions = ["class"=>"table table-striped table-bordered table-condensed","cellspacing"=>"0", "width"=>"100%"];

    public $options = ['class'=>'table-responsive grid-view'];
    public function run()
    {
        $id = $this->options['id'];
        $options = Json::htmlEncode($this->getClientOptions());
        $view = $this->getView();
        EditorGridViewAsset::register($view);
        $view->registerJs("jQuery('#$id').yiiGridView($options);");
        if ($this->showOnEmpty || $this->dataProvider->getCount() > 0) {
            $content = preg_replace_callback("/{\\w+}/", function ($matches) {
                $content = $this->renderSection($matches[0]);

                return $content === false ? $matches[0] : $content;
            }, $this->layout);
        } else {
            $content = $this->renderEmpty();
        }

        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::tag($tag, $content, $options);
        foreach ($this->columns as $column) {
            if(isset($column->attribute) && $column->editable)
            {
                $models = $this->dataProvider->getModels();
                if(($model = reset($models)) instanceof Model)
                {
                    $name = Html::getInputName($model, $column->attribute);
                    //$pkId = Html::getInputName($model, 'id');
                }

                $attributeName = $column->attribute;
                $view->registerJs("$('.$attributeName').editable({
                    placement:'top',
                    ajaxOptions: {
                        type: 'GET',
                        dataType: 'json'
                    },
                    success: function(response, newValue) {
                        if(response.status=='success')
                        {
                            return jQuery('#{$this->options['id']}').yiiGridView('applyFilter');
                        }
                        else
                        {
                            return response.msg;
                        }
                    },
                    params: function(rawParams) {
                        var params = {};
                        params['$name']=rawParams.value;
                        params['pk']=rawParams.pk;
                        return params;
                    }
                });");
            }
        }
    }

    public function init()
    {
        $this -> dataColumnClass = EditorDataColumn::className();
        parent::init();
    }
}