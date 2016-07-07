<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 19.05.2015
 * Time: 00:15
 */

namespace Package\FoodOrganizer\Models;

use MongoDB\BSON\ObjectID;
use MongoDB\Collection;
use MongoDB\Model\BSONDocument;

interface BasicObjectInterface
{


    public function __construct(BSONDocument $data = null);


    public function loadBSONintoObject(BSONDocument $data);

    public function getArrayCopy($data);

    public function makeSaveable();
    
    public function save(Collection $collection);
    
    public function getMongoIdObject($mongoIdString = null):ObjectID;

    public function getMongoId();


}
