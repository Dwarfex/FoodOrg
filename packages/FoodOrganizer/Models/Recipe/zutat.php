<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 09:35
 */

namespace Package\FoodOrganizer\Models\Recipe;

use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;
use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;

class zutat extends BasicObject implements BasicObjectInterface
{
   private $mongoId;
    private $eigenschaft;
    private $einheit;
    private $id;
    private $ist_basic;
    private $menge;
    private $name;


    public function __construct(BSONDocument $data = null)
    {
        
        if ($data != null) {

            $this->loadBSONintoObject($data);

        }


    }


    public function loadBSONintoObject(BSONDocument $data)
    {


        if (isset($data->_id)) $this->setMongoId($data->name);
        if (isset($data->eigenschaft)) $this->setEigenschaft($data->eigenschaft);
        if (isset($data->einheit)) $this->setEinheit($data->einheit);
        if (isset($data->id)) $this->setId($data->id);
        if (isset($data->ist_basic)) $this->setIstBasic($data->ist_basic);
        if (isset($data->menge)) $this->setMenge($data->menge);
        if (isset($data->name)) $this->setName($data->name);




    }

    /**
     * @return mixed
     */
    public function getMongoId()
    {
        return $this->mongoId;
    }

    /**
     * @param mixed $mongoId
     */
    public function setMongoId($mongoId)
    {
        $this->mongoId = $mongoId;

    }

    /**
     * @return mixed
     */
    public function getEigenschaft()
    {
        return $this->eigenschaft;
    }

    /**
     * @param mixed $eigenschaft
     */
    public function setEigenschaft($eigenschaft)
    {
        $this->eigenschaft = $eigenschaft;
    }

    /**
     * @return mixed
     */
    public function getEinheit()
    {
        return $this->einheit;
    }

    /**
     * @param mixed $einheit
     */
    public function setEinheit($einheit)
    {
        $this->einheit = $einheit;
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
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIstBasic()
    {
        return $this->ist_basic;
    }

    /**
     * @param mixed $ist_basic
     */
    public function setIstBasic($ist_basic)
    {
        $this->ist_basic = $ist_basic;
    }

    /**
     * @return mixed
     */
    public function getMenge()
    {
        return $this->menge;
    }

    /**
     * @param mixed $menge
     */
    public function setMenge($menge)
    {
        $this->menge = $menge;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getKcal(){
       // todo: somehow get the kcal data for this zutat - depending on type of zutat and amount?!
        return rand(0, 200);
    }





}