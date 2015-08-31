<?php  
namespace common\library;
use Yii;
use yii\web\NotFoundHttpException;
use backend\models\Field;
use common\library\FieldAddForm;
use yii\caching\FileCache;


class FieldCache {
    
    function __construct() {
        $this->field =  new Field();
        $this->FieldAddForm =  new FieldAddForm();
        $this->filecache =  new \yii\caching\FileCache();
        $this->filecache->directoryLevel  = \Yii::$app->params['directoryLevel'];
        $this->filecache->cachePath = \Yii::$app->params['cachePath'];
    }
    
    /**
     * @param $modelid 模型表主键id
     * @param $location 属于哪个位置，1为基本信息，2为通用信息，3为详细信息，4为其它信息
     * @param $cachename 缓存名称，留空为'model'.$modelid.$location
     * @return boolean whether the value is successfully stored into cache
     */   
    public function set($modelid, $location, $cachename = ''){
        $field_array = $this->getField($modelid, $location);
        foreach($field_array as $key => $value){
            $this->FieldAddFormHtml   .=   $this->FieldAddForm->$value['field_type']($value['field'], '', $value);
        }
        $cachename = empty($cachename) ? 'model'.$modelid.$location : $cachename;
        if($this->filecache ->get($cachename)){
            $this->filecache->delete($cachename);
        }
        return $this->filecache ->set($cachename, $this->FieldAddFormHtml);
    }
    
    /**
     * 删除缓存的值与指定键
     * @param $modelid 模型表主键id
     * @param $location 属于哪个位置，1为基本信息，2为通用信息，3为详细信息，4为其它信息
     * @param $cachename 缓存名称，留空为'model'.$modelid.$location
     * @return boolean if no error happens during deletion
     */    
    public function delete($modelid, $location, $cachename = ''){
        $cachename = empty($cachename) ? 'model'.$modelid.$location : $cachename;
        return $this->filecache->delete($cachename);
    }
    
    public function get($modelid, $location, $cachename = ''){
        $cachename = empty($cachename) ? 'model'.$modelid.$location : $cachename;
        return $this->filecache->get($cachename);
    }

    private function getField ($modelid, $location){
        if (($model = $this->field->findBySql('SELECT * FROM '.Yii::$app->components['db']['tablePrefix'].'field where modelid =  '.$modelid ." and location =".$location." order by listorder desc,fieldid asc")->asArray()->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    function __get($key){
        if(isset($this->$key)){
            return($this->$key);
        }else{
            return(NULL);
        }
    }
    
    function __set($key, $value){
        $this->$key = $value;
    }

}
