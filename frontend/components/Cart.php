<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 22:58
 */

namespace frontend\components;


use Yii;
use yii\base\Component;

class Cart extends Component {

    private $_items = [];
    private $cookie_name = 'cart_items';



    public function __construct(array $config = []){

        $cookies = Yii::$app->request->cookies;

        $this->_items = $cookies->getValue($this->cookie_name, []);
        if(!empty($this->_items)) $this->_items = unserialize($this->_items);
        parent::__construct($config);
    }


    public function Add($item){
        if(!isset($this->_items[$item]))
            $this->_items[$item] = 1;

        $this->Save();
    }

    public function Remove($item){
        unset($this->_items[$item]);

        $this->Save();
    }

    public function Has($item){
        return isset($this->_items[$item]);
    }

    public function GetItems(){

    }

    public function Clear(){
        $cookies = Yii::$app->response->cookies;
        $cookies->remove($this->cookie_name);
    }


    private function Save(){

        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => $this->cookie_name,
            'value' => serialize($this->_items),
            'expire' => 3600*24*30
        ]));
    }
}
