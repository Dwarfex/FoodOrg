<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 30.04.2016
 * Time: 13:35
 */
namespace Package\FoodOrganizer\Controller;

use MongoDB\BSON\ObjectID;
use MongoDB\Collection;
use MongoDB\Model\BSONDocument;

interface basicControllerInterface
{

    public function searchById($id ,Collection $collection,$idfield);
    public function search($array,Collection $collection);
    public function searchLimitSkip($limit, $skip, Collection $collection);
    public function getCollectionCount();
}