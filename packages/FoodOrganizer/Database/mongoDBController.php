<?php
/**
 * Created by PhpStorm.
 * User: Listener
 * Date: 07.01.2016
 * Time: 21:04
 */

namespace Package\FoodOrganizer\Database;

use MongoDB\Collection;
use MongoDB\Driver\Manager;

class mongoDBController
{
    public function __construct()
    {
        $manager = new Manager("mongodb://localhost:27017");
        $collection = new Collection($manager, "wasistdrin", "items");
        $document = $collection->findOne(["id" => '10245']);
        return $document;
    }
}