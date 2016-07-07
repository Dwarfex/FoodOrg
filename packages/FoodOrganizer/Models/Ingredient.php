<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 18.05.2015
 * Time: 23:28
 */

namespace Package\FoodOrganizer\Models;



class Ingredient extends BasicObject{
    private $table;
    private $tableName = 'ingredientTable';
    private $id;
    private $ingredientName;
    private $ingredientDetail;
    private $modified;
    private $created;

    function __construct()
    {
        $this->table = new \seMySQLTable($this->tableName, 'foodOrganizer/tables/');
    }


    public function save(){
        $this->table->freeAll();

//        $this->table->postData['id'] = $this->getId();
        $this->table->postData['ingredientName'] = $this->getIngredientName();
        $this->table->postData['ingredientDetail'] = $this->getIngredientDetail();


        if (!$this->table->find()) {
            $this->setCreated(date('Y-m-d H:i:s'));
            $this->setModified(date('Y-m-d H:i:s'));

            $this->table->postData['created'] = $this->getCreated();
            $this->table->postData['modified'] = $this->getModified();


            $this->setId($this->table->insert());
            echo $this->getIngredientName().br();
            return true;
        }
        return false;

    }

    public function findByName($name){
        $this->clear();
        $this->setIngredientName($name);
        $this->table->postData['name']=$this->getIngredientName();
        if($this->table->find()){
            $this->setId($this->table->getData[0]['id']);
            $this->setIngredientDetail($this->table->getData[0]['ingredientDetail']);
            $this->setCreated($this->table->getData[0]['created']);
            $this->setModified($this->table->getData[0]['modified']);
            return $this->getId();
        }
        return false;

    }
    private function clear(){
        $this->setIngredientName('');
        $this->setId('');
        $this->setModified('');
        $this->setCreated('');
        $this->setIngredientDetail('');

    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = htmlentities($id, ENT_QUOTES, "UTF-8");
    }

    /**
     * @return mixed
     */
    public function getIngredientName()
    {
        return $this->ingredientName;
    }

    /**
     * @param mixed $ingredientName
     */
    public function setIngredientName($ingredientName)
    {
        $this->ingredientName = htmlentities($ingredientName, ENT_QUOTES, "UTF-8");
    }

    /**
     * @return mixed
     */
    public function getIngredientDetail()
    {
        return $this->ingredientDetail;
    }

    /**
     * @param mixed $ingredientDetail
     */
    public function setIngredientDetail($ingredientDetail)
    {
        $this->ingredientDetail =htmlentities($ingredientDetail, ENT_QUOTES, "UTF-8");
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }


}