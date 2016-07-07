<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 13:57
 */

namespace Package\FoodOrganizer\Controller;

use MongoDB\Driver\Manager;
use MongoDB\Collection;
use Package\FoodOrganizer\Models\Product;
use MongoDB\BSON\Regex;

class productController extends basicController implements basicControllerInterface
{
    private $collection;

    public function __construct()
    {
        parent::__construct();
        $this->collection = new Collection(parent::getManager(), "test", "items");
        //todo test with empty database
    }

    public function findByEAN($ean)
    {

        $filter = array();


        $regex = new Regex($ean, 0);


        $filter['ean'] = $regex;

        $result = parent::search($filter, $this->collection);

        $returnArray = array();
        foreach ($result as $dataset) {
            $returnArray[] = new Product($dataset);
        }
        return $returnArray;


    }
    
    public function findById($id):Product
    {
        
        return new Product(parent::searchById($id, $this->collection, 'id'));
    }

    public function find($array)
    {
        $cursor = parent::search($array, $this->collection);
        $returnArray = array();
        foreach ($cursor as $document) {
            $returnArray[] = new Product($document);

        }
        return $returnArray;


    }

    public function findLimitSkip($limit, $skip)
    {
        $returnArray = array();
        foreach (parent::searchLimitSkip($limit, $skip, $this->collection) as $dataset) {
            $returnArray[] = new Product($dataset);
        }
        return $returnArray;
    }

    public function getCollectionCount()
    {
        return $this->collection->count();
    }
}