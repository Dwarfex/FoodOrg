<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 28.04.2016
 * Time: 15:06
 */

namespace Package\FoodOrganizer;


use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;

class DatabaseHelper
{
    static function convertBSONArrayToArray(BSONArray $BSONArray)
    {
        return $BSONArray->getArrayCopy();


    }

    static function convertBSONDocumentToArray(BSONDocument $BSONDocument)
    {
        return $BSONDocument->getArrayCopy();

    }

    static function convertBSONGeneralDataToArray($BSONData)
    {
        if (is_a($BSONData, 'MongoDB\Model\BSONArray')) {
            return self::convertBSONArrayToArray($BSONData);
        } elseif ((is_a($BSONData, 'MongoDB\Model\BSONDocument'))) {

            return self::convertBSONDocumentToArray($BSONData);

        }else{
            die;
        }
    }
    function object_to_array($obj) {

    }


    static function convertBSONDataRecursivelyToArray($obj)
    {

            if(is_object($obj)) $obj = self::convertBSONGeneralDataToArray($obj);
            if(is_array($obj)) {
                $new = array();
                foreach($obj as $key => $val) {
                    $new[$key] = self::convertBSONDataRecursivelyToArray($val);
                }
            }
            else $new = $obj;
            return $new;


    }
    
    static function convertObjectToJSON($item){
        if(!is_array($item) && !is_object($item)){
            return json_encode($item);
        }else{
            $pieces = array();
            foreach($item as $k=>$v){
                $pieces[] = "\"$k\":".json_encode_objs($v);
            }
            return '{'.implode(',',$pieces).'}';
        }
    }
}