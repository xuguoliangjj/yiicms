<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/11
 * Time: 23:48
 */
namespace backend\components;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;
class BaseController extends Controller
{
    public $topMenu;    //顶部菜单
    public $leftMenu;   //左侧二级菜单

    //默认的菜单图标
    public $defaultIcon = 'glyphicon glyphicon-star';

    //默认显示菜单图标
    public $activeIcon = true;
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest && $this->route != 'site/login')
        {
            $this ->redirect(['/site/login']);
        }
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

    //判断是否当前url
    private function isItemActive($item){
        if(stripos($this->route,trim($item['url'][0],'/')) === 0)
        {
            return true;
        }
        return false;
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
                        if (stripos($this->route,trim($menu['url'][0],'/')) === 0) {   //找出当前路由在哪个菜单下
                            $activeTag = $i;
                            $menus[$i]['active']=true;
                        }
                        if(!isset($menus[$i]['items'][$k]['active']))
                        {
                            if($this->isItemActive($menu))
                            {
                                $menus[$i]['items'][$k]['active']=true;
                                $menus[$i]['items'][$k]['items'][$l]['active']=true;
                            }
                        }
                        $iconClass = isset($menu['icon']) ? $menu['icon'] : $this->defaultIcon;
                        $menus[$i]['items'][$k]['items'][$l]['label'] = $this->buildMenusLabel($menu['label'], $iconClass);
                        unset($menus[$i]['items'][$k]['items'][$l]['icon']);
                    }
                }else{
                    unset($menus[$i]['items'][$k]);  //删除没有子菜单的菜单
                    continue;
                }
                $menus[$i]['items'][$k]['url'] = ['#'];
                $iconClass = isset($item['icon']) ? $item['icon'] : $this->defaultIcon;
                $menus[$i]['items'][$k]['label'] = $this -> buildItemsLabel($item['label'],$iconClass);
                unset($menus[$i]['items'][$k]['icon']);
            }
            $menus[$i]['url'] = [$firstUrl];
        }

        return $menus;
    }

    /**
     * @param $label
     * @param $iconClass
     * @return string 返回母菜单标签
     */
    private function buildItemsLabel($label,$iconClass)
    {
        $label = $this -> buildMenusLabel($label,$iconClass)
        .Html::tag('span','',['class'=>'glyphicon arrow']);
        return $label;
    }

    /**
     * @param $label
     * @param $iconClass
     * @return string 返回菜单标签
     */
    private function buildMenusLabel($label,$iconClass)
    {
        if($this -> activeIcon) {
            $label = Html::tag('span',"&nbsp;",['class' => $iconClass])
                . $label;
        }
        return $label;
    }
}