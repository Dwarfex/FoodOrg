<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 28.04.2016
 * Time: 18:26
 */

namespace Package\FoodOrganizer\Models;


use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;

class contentAlarm extends BasicObject implements BasicObjectInterface
{
    private $name;
    private $rating;
    private $amount;
    private $referenceAmount;
    private $contentUnit;

    public function __construct(BSONDocument $data = null)
    {
        if ($data != null) {
            $this->loadBSONintoObject($data);
        }
    }
    public function loadBSONintoObject(BSONDocument $data){
        if(isset($data->name))$this->setName($data->name);
        if(isset($data->rating))$this->setRating($data->rating);
        if(isset($data->amount))$this->setAmount($data->amount);
        if(isset($data->referenceAmount))$this->setReferenceAmount($data->referenceAmount);
        if(isset($data->contentUnit))$this->setContentUnit($data->contentUnit);
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

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getReferenceAmount()
    {
        return $this->referenceAmount;
    }

    /**
     * @param mixed $referenceAmount
     */
    public function setReferenceAmount($referenceAmount)
    {
        $this->referenceAmount = $referenceAmount;
    }

    /**
     * @return mixed
     */
    public function getContentUnit()
    {
        return $this->contentUnit;
    }

    /**
     * @param mixed $contentUnit
     */
    public function setContentUnit($contentUnit)
    {
        $this->contentUnit = $contentUnit;
    }


}