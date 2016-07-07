<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 30.04.2016
 * Time: 13:50
 */

namespace Package\FoodOrganizer\Controller;


use MongoDB\Collection;
use Package\FoodOrganizer\Models\Recipe\Recipe;

class recipeController extends basicController implements basicControllerInterface
{
    private $collection;

    public function __construct()
    {
        parent::__construct();
        $this->collection = new Collection(parent::getManager(), "test", "rezepte");
        //todo test with empty database

    }

    /**
     * @return Collection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param Collection $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }


    public function findById($id):Recipe
    {

        return new Recipe(parent::searchById($id, $this->collection, 'rezept_id'));
    }

    public function findByUserId($userId, $options = array())
    {

        
        $result = $this->find(['rezept_user_id' => $userId], $options);

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }

    }

    public function findByUserName($userId, $options = array())
    {

        $result = $this->find(['rezept_user_name' => $userId], $options);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    /**
     * beispiele für $options Parameter:
     * ['sort' => ['rezept_datum' => 1]]
     * ['sort' => ['rezept_votes' => -1]]
     * @param $array
     * @param array $options
     * @description
     *
     * @return array
     */
    public function find($array, $options = array())
    {

        $cursor = parent::search($array, $this->collection, $options);
        /* @var \MongoDB\Driver\Cursor $cursor */


        $returnArray = array();
        foreach ($cursor as $document) {
            $returnArray[] = new Recipe($document);

        }
        return $returnArray;


    }

    public function getCollectionCount()
    {
        return $this->collection->count();
    }

    public function findLimitSkip($limit, $skip)
    {
        $count = $this->collection->count();
        if ((int)$skip > $count) {
            (int)$skip = (int)$skip - $limit;
        };
        $returnArray = array();
        foreach (parent::searchLimitSkip($limit, (int)$skip, $this->collection) as $dataset) {

            $returnArray[] = new Recipe($dataset);
        }
        return $returnArray;
    }

    public function findFreeID(){
        $id=false;

        while(!$id){
            $tempID = rand(1,1000000);
            if(count($this->find(['rezept_id'=>(string)$tempID])) == 0) {
                $id = $tempID;
            }

        }
        return $id;
    }
    public function save(Recipe $recipe){

        return $recipe->save($this->getCollection());

    }
    public function saveNew(Recipe $recipe){

        return $recipe->save($this->getCollection(), true);

    }

    public function getNewRecipe($currentUserIdString,$currentUserName ){
        $recipeID = $this->findFreeID();
        $recipe = new \Package\FoodOrganizer\Models\Recipe\Recipe();
        $recipe->setRezeptId($recipeID);
        $recipe->setRezeptDatum(time());
        $recipe->setRezeptFrontendUrl('');
        $recipe->setRezeptShowId($recipe->getRezeptId().$recipe->getRezeptDatum());
        $recipe->setRezeptUserId($currentUserIdString);
        $recipe->setRezeptUserName($currentUserName);
        $montlyStatistic = new \Package\FoodOrganizer\Models\Recipe\rezeptStatistik();
        $montlyStatistic->setMailed('0');
        $montlyStatistic->setPrinted('0');
        $montlyStatistic->setSaved('0');
        $montlyStatistic->setViewed('0');

        $totalStatistic = new \Package\FoodOrganizer\Models\Recipe\rezeptStatistik();
        $totalStatistic->setMailed('0');
        $totalStatistic->setPrinted('0');
        $totalStatistic->setSaved('0');
        $totalStatistic->setViewed('0');
        $recipe->setRezeptStatistik(['month'=>$montlyStatistic, 'total'=>$totalStatistic]);
        $votes = new \Package\FoodOrganizer\Models\Recipe\rezeptVotes();
        $votes->setAverage('2.5');
        $votes->setImg('2_5');
        $votes->setResult('0');
        $votes->setVotes('0');
        $recipe->setRezeptVotesFromObject($votes);
        $recipeStep = array();
        $recipeStep[] = new \Package\FoodOrganizer\Models\Recipe\rezeptZubereitungsStep();
        $recipe->setRezeptZubereitungsStep($recipeStep);
        return $recipe;
    }

}