<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/11
 * Time: 23:48
 */
namespace backend\components;
use Yii;
use yii\web\Controller;
class BaseController extends Controller
{
    public $topMenu;
    public $leftMenu;
    public function beforeAction($action)
    {
        $menus = Yii::$app->params['menu'];
        $activeTag = '';
        $menus = $this -> normalizeMenu($menus,$activeTag);
        if(isset($menus[$activeTag]['items']))
        {
            $this -> leftMenu = $menus[$activeTag]['items'];
        }
        foreach($menus as $key => $items)
        {
            unset($menus[$key]['items']);
        }
        $this -> topMenu = $menus;
        return true;
    }

    /**
     * @param $menus
     * @param $activeTag
     * @return mixed
     */
    private function normalizeMenu($menus,&$activeTag)
    {
        foreach($menus as $i => $items)
        {
            foreach($items['items'] as $k => $item)
            {
                foreach($item['items'] as $l => $menu)
                {
                    if(stripos($this -> route,$menu['url'][0]) === 0)
                    {
                        $activeTag = $i;
                    }
                }
            }
        }
        return $menus;
    }
}