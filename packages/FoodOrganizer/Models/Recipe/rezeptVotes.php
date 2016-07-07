<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 30.04.2016
 * Time: 12:47
 */

namespace Package\FoodOrganizer\Models\Recipe;


use MongoDB\Model\BSONDocument;
use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;

class rezeptVotes extends BasicObject implements BasicObjectInterface
{
    private $average;
    private $img;
    private $votes;
    private $result;



    public function __construct(BSONDocument $data = null)
    {
        if ($data != null) {
            $this->loadBSONintoObject($data);
        }
    }

    public function loadBSONintoObject(BSONDocument $data)
    {

        if (isset($data->average)) $this->setAverage($data->average);
        if (isset($data->img)) $this->setImg($data->img);
        if (isset($data->votes)) $this->setVotes($data->votes);
        if (isset($data->result)) $this->setResult($data->result);
    }

    /**
     * @return mixed
     */
    public function getAverage()
    {
        
        return $this->average;
    }

    /**
     * @param mixed $average
     */
    public function setAverage($average)
    {
        $this->average = $average;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

}