<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 09:35
 */

namespace Package\FoodOrganizer\Models;

use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;

class allergicHint extends BasicObject implements BasicObjectInterface
{
    private $name;
    private $rating;


    public function __construct(BSONDocument $data = null)
    {

        if ($data != null) {

            $this->loadBSONintoObject($data);

        }


    }


    public function loadBSONintoObject(BSONDocument $data)
    {


        if (isset($data->name)) $this->setName($data->name);
        if (isset($data->rating)) $this->setRating($data->rating);


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
    


}