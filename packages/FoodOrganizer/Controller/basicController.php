<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 30.04.2016
 * Time: 13:34
 */

namespace Package\FoodOrganizer\Controller;


use MongoDB\Collection;
use MongoDB\Driver\Cursor;
use MongoDB\Driver\Manager;
use Package\FoodOrganizer\FoodOrganizerException;

class basicController
{
    private $manager;


    public function __construct()
    {
        try {
            $this->manager = new Manager("mongodb://localhost:27017");
        } catch (\Exception $e) {
            echo 'Oh oh ... that shouldn\'t happen.';
            die;
        }
    }

    protected function getManager()
    {
        return $this->manager;
    }

    public function searchById($id, Collection $collection, $idfield)
    {


        $searchArrayString = array($idfield => $id);
        $searchArrayInt = array($idfield => (int)$id);

        try {
            $documentString = $collection->findOne($searchArrayString);
            $documentInt = $collection->findOne($searchArrayInt);
        } catch (\Exception $e) {
            echo 'Oh oh ... that shouldn\'t happen.';
            die;
        }
        if($documentInt != null){
            return $documentInt;
        }else{
            return $documentString;
        }


    }

    public function search($array, Collection $collection, $options = array())
    {
        try {
            $cursor = $collection->find($array, $options);
        } catch (\Exception $e) {
            echo 'Oh oh ... that shouldn\'t happen.';
            die;
        }

        return $cursor;


    }

    protected function countCollection(Collection $collection)
    {
        try {
            return $collection->count();
        } catch (\Exception $e) {
            echo 'Oh oh ... that shouldn\'t happen.';
            die;
        }
    }


    public function searchLimitSkip($limit, $skip, Collection $collection)
    {
        if ($limit < 1) $limit = 1;
        $filter = array();
        $filter['limit'] = $limit;
        $filter['skip'] = $skip;
        try {
            $result = $collection->find(array(), $filter);
        } catch (\Exception $e) {
            echo 'Oh oh ... that shouldn\'t happen.';
            die;
        }
        return $result;

    }
    /*
     SELECT *
FROM users
WHERE status = "A"
OR age = 50



db.users.find(
    { $or: [ { status: "A" } ,
             { age: 50 } ] }
)

SELECT *
FROM users
WHERE age > 25



db.users.find(
    { age: { $gt: 25 } }
)

SELECT *
FROM users
WHERE age < 25



db.users.find(
   { age: { $lt: 25 } }
)

SELECT * FROM rezepte WHERE kcalgesamt > 2500 AND   kcalgesamt <= 5000

db.rezepte.find({ kcalgesamt: { $gt: 2500, $lte: 5000 } })



SELECT * FROM rezepte WHERE rezeptName like "%Sauce%"

db.rezepte.find( { rezeptName: /Sauce/ } )


SELECT * FROM rezepte WHERE username = "Testuser" ORDER BY date DESC

db.rezepte.find( { username: "Testuser" } ).sort( { date: -1 } )


SELECT *
FROM users
WHERE status = "A"
ORDER BY user_id DESC



db.users.find( { status: "A" } ).sort( { user_id: -1 } )

SELECT *
FROM users
LIMIT 1



db.users.findOne()

or

db.users.find().limit(1)

SELECT * FROM rezepte LIMIT 5 SKIP 10

db.rezepte.find().limit(5).skip(10)


     */


}