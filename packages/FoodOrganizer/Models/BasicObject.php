<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 10:47
 */

namespace Package\FoodOrganizer\Models;


use MongoDB\BSON\ObjectID;
use MongoDB\Collection;

class BasicObject
{

    public function getArrayCopy($arrayData)

    {
        $className = '';
        if (is_object($arrayData)) {
            $className = get_class($arrayData);
        }

        if (is_object($arrayData)) {
            $arrayData = (array)$arrayData;

            foreach ($arrayData as $key => $value) {
                if (strpos($key, $className)) {
                    $newKey = substr($key, 1);
                    $newKey = str_replace($className, '', $newKey);
                    $newKey = substr($newKey, 1);


                    $shortendedArrayData[$newKey] = $value;
                } else {
                    $shortendedArrayData[$key] = $value;
                }
            }
            $arrayData = $shortendedArrayData;


        }
        if (is_array($arrayData)) {
            $new = array();
            foreach ($arrayData as $key => $val) {
                $new[$key] = $this->getArrayCopy($val);
            }
        } else $new = $arrayData;
        return $new;

    }

    public
    function makeSaveable()
    {

        $arrayToMakeSavable = $this->getArrayCopy($this);
        $arrayToMakeSavable['mongoId'] = 'deleteMe';
        if (isset($arrayToMakeSavable['mongoId'])) {
            unset($arrayToMakeSavable['mongoId']);
        }


        return $arrayToMakeSavable;
    }


    public
    function getMongoIdObject($mongoIdString = null):ObjectID
    {

        if ($mongoIdString == null) {
            return new ObjectID();
        } else {
            return new ObjectID($mongoIdString);
        }
    }

    public
    function save(Collection $collection)
    {
        //todo make sure, that there are no empty arrays in database "query"


        $result = $collection->updateOne(

            ["_id" => $this->getMongoIdObject()],
            ['$set' => $this->makeSaveable()],

            ['upsert' => true]
        );
        return $result;
    }


    public
    function getMongoId()
    {
        if (isset($this->mongoId)) {
            return $this->mongoId;
        } else return null;

    }

    protected function sanitize($array)
    {
        //todo sanitzie array!!!!!!! IMPORTANT

        return $array;
    }


}