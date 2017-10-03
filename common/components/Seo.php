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
use yii\helpers\Html;

/**
 *
 * @property string $description
 * @property string $keywords
 * @property bool $top_text
 * @property bool $bottom_text
 * @property string $image
 * @property string $head
 * @property string $title
 */
class Seo extends Component {

    public $default_title;
    public $default_keywords;
    public $default_description;
    public $default_image;
    public $model_list;

    private $model;

    public function init(){

        if($this->model_list == null){
            $this->model_list = [
                'Index' => Yii::t('app', 'Index page'),
                'Cart' => Yii::t('app', 'Cart'),
                'Page' => Yii::t('app', 'Pages'),
                'News' => Yii::t('app', 'News'),
                'Category' => Yii::t('app', 'Categories'),
                'Product' => Yii::t('app', 'Products'),
            ];
        }

        parent::init();
    }

    public function __construct(array $config = []){
        $this->SetModel();
        parent::__construct($config);
    }


    public function getTitle(){
        if(!$this->model) return $this->default_title;
        return $this->model->title;
    }

    public function getKeywords(){
        if(!$this->model) return $this->default_keywords;
        return $this->model->keywords;
    }

    public function getDescription(){
        if(!$this->model) return $this->default_description;
        return $this->model->description;
    }

    public function getBottom_text(){
        if(!$this->model) return false;
        return $this->model->bottom_text;
    }

    public function getTop_text(){
        if(!$this->model) return false;
        return $this->model->top_text;
    }

    public function getImage(){
        if(!$this->model) return $this->default_description;
        return $this->model->path;
    }

    public function getHead(){

        $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $image = $image_mime = false;

        if(is_file($_SERVER['DOCUMENT_ROOT'].$this->image)){
            $image = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$this->image;
            $image_mime = mime_content_type($_SERVER['DOCUMENT_ROOT'].$this->image);
        }

        $ret = Html::tag('title', $this->title);
        $ret .= '<meta name="description" content="'.$this->description.'" />';
        $ret .= '<meta name="keywords" content="'.$this->keywords.'" />';

        $ret .= '<meta property="og:url" content="'.$url.'" />';
        $ret .= '<meta property="og:type" content="website" />';

        $ret .= '<meta property="og:title" content="'.$this->title.'" />';
        $ret .= '<meta property="og:description" content="'.$this->description.'" />';

        if($image){
            $ret .= '<meta property="og:image" content="'.$image.'" />';
            $ret .= '<meta property="og:image:type" content="'.$image_mime.'" />';
        }

        return $ret;
    }

    private function SetModel(){
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;


        $model_name = ucfirst($controller);


        if($controller == 'site' && $action == 'index'){
            $this->model = \common\models\Seo::find()
                ->where(['model_name' => array_search('Index', \common\models\Seo::$models)])->one();
        }
        elseif($controller == 'cart' && $action == 'index'){
            $this->model = \common\models\Seo::find()
                ->where(['model_name' => array_search('Cart', \common\models\Seo::$models)])->one();
        }
        elseif (isset($_GET['id']) && isset($_GET['seo'])){
            $this->model = \common\models\Seo::find()
                ->where(['model_name' => array_search($_GET['seo'], \common\models\Seo::$models), 'item_id' => $_GET['id']])->one();
        }
        elseif (isset($_GET['id'])){
            $this->model = \common\models\Seo::find()
                ->where(['model_name' => array_search($model_name, \common\models\Seo::$models), 'item_id' => $_GET['id']])->one();
        }
        elseif (isset($_GET['url'])){
            $item_model = $model_name::find()->where(['url' => $_GET['url']])->one();
            if($item_model){
                $this->model = \common\models\Seo::find()
                    ->where(['model_name' => array_search($model_name, \common\models\Seo::$models), 'item_id' => $item_model->id])->one();
            }
        }
        else{
            $this->model = \common\models\Seo::find()
                ->where(['url' => $_SERVER['REQUEST_URI']])->one();
        }
    }


}
