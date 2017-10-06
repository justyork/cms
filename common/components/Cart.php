<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 22:58
 */

namespace common\components;


use Yii;
use yii\base\Component;

/**
 *
 * @property mixed $count
 * @property array $list
 */
class Cart extends Component {

    private $_items = [];
    private $cookie_name = 'cart_items';


    public function init(){

        $cookies = Yii::$app->request->cookies;
        $this->_items = $cookies->getValue($this->cookie_name, []);
        if(!empty($this->_items)) $this->_items = unserialize($this->_items);

        parent::init();
    }

    /**
     * Добавить id в корзину
     *
     * @param $item string ID
     */
    public function Add($item){
        if(!isset($this->_items[$item]))
            $this->_items[$item] = 1;

        $this->Save();
    }

    /**
     * Получить список id
     *
     * @return array
     */
    public function getList(){
        return $this->_items;
    }

    /**
     * Удалить товар
     *
     * @param $item
     */
    public function Remove($item){
        unset($this->_items[$item]);

        $this->Save();
    }

    /**
     * Имеется ли товар в списке
     *
     * @param $item
     * @return bool
     */
    public function Has($item){
        return isset($this->_items[$item]);
    }

    /**
     * Получить кол-во товаров
     *
     * @return int
     */
    public function getCount(){
        return count($this->_items);
    }

    /**
     * Отчистить карзину
     */
    public function Clear(){
        $cookies = Yii::$app->response->cookies;
        $cookies->remove($this->cookie_name);
    }


    /**
     * Сохранить карзину
     */
    private function Save(){
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => $this->cookie_name,
            'value' => serialize($this->_items),
            'expire' => time() + 3600*24*30
        ]));
    }
}
