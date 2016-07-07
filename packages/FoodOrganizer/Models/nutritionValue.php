<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 09:25
 */

namespace Package\FoodOrganizer\Models;


use MongoDB\Model\BSONDocument;

class nutritionValue extends BasicObject implements BasicObjectInterface
{
    private $name;
    private $amount;
    private $dailyFraction;

    public function __construct(BSONDocument $data = null)
    {
        if ($data != null) {

            $this->loadBSONintoObject($data);

        }

    }


    public function loadBSONintoObject(BSONDocument $data)
    {


        if (isset($data->name)) $this->setName($data->name);
        if (isset($data->amount)) $this->setAmount($data->amount);
        if (isset($data->dailyFraction)) $this->setDailyFraction($data->dailyFraction);


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
    public function getDailyFraction()
    {
        return $this->dailyFraction;
    }

    /**
     * @param mixed $dailyFraction
     */
    public function setDailyFraction($dailyFraction)
    {
        $this->dailyFraction = $dailyFraction;
    }

}
    