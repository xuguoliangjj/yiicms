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
    public $topMenu;    //顶部菜单
    public $leftMenu;   //左侧二级菜单
    public function beforeAction($action)
    {
        $menus = Yii::$app->params['menu'];
        $activeTag = '';
        $menus = $this -> normalizeMenu($menus,$activeTag);
        if(isset($menus[$activeTag]['items']))
        {
            $this -> leftMenu = $menus[$activeTag]['items'];
        }else{
            $this -> leftMenu  = [];
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
            $firstUrl = '';
            foreach($items['items'] as $k => $item)
            {
                if(!empty($item['items'])) {
                    foreach ($item['items'] as $l => $menu) {
                        if($firstUrl == '')
                        {
                            $firstUrl = $menu['url'][0];                      //获取第一个url
                        }
                        if (stripos($this->route, $menu['url'][0]) === 0) {   //找出当前路由在哪个菜单下
                            $activeTag = $i;
                        }
                    }
                }else{
                    unset($menus[$i]['items'][$k]);  //删除没有子菜单的菜单
                    continue;
                }
            }
            $menus[$i]['url'] = [$firstUrl];
        }
        return $menus;
    }
}