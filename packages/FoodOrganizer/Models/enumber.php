<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 28.04.2016
 * Time: 19:37
 */

namespace Package\FoodOrganizer\Models;


use MongoDB\Exception\InvalidArgumentException;
use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;

class enumber extends BasicObject implements BasicObjectInterface
{
    private $id;
    private $enumber;
    private $name;
    private $description;

    public function __construct(BSONDocument $data = null)
    {

        if ($data != null) {

            $this->loadBSONintoObject($data);
        }


    }

    public function loadBSONintoObject(BSONDocument $data)
    {


        if (isset($data->id)) $this->setId($data->id);
        if (isset($data->enumber)) $this->setEnumber($data->enumber);
        if (isset($data->name)) $this->setName($data->name);
        if (isset($data->description)) $this->setDescription($data->description);


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
    public function getEnumber()
    {
        return $this->enumber;
    }

    /**
     * @param mixed $enumber
     */
    public function setEnumber($enumber)
    {
        $this->enumber = $enumber;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {

        $this->description = $description;

    }

}