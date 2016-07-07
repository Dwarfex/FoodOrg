<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 21:36
 */

namespace Package\FoodOrganizer\Models\Recipe;



use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;
use MongoDB\Model\BSONDocument;

class rezeptStatistik extends BasicObject implements BasicObjectInterface
{
    private $viewed;
    private $saved;
    private $printed;
    private $mailed;
    

    public function __construct(BSONDocument $data = null)
    {
        if($data != null){
            $this->loadBSONintoObject($data);
        }
    }

    public function loadBSONintoObject(BSONDocument $data){
        
        if (isset($data->viewed)) $this->setViewed($data->viewed);
        if (isset($data->saved)) $this->setSaved($data->saved);
        if (isset($data->printed)) $this->setPrinted($data->printed);
        if (isset($data->mailed)) $this->setMailed($data->mailed);
    }

    /**
     * @return mixed
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * @param mixed $viewed
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
    }

    /**
     * @return mixed
     */
    public function getSaved()
    {
        return $this->saved;
    }

    /**
     * @param mixed $saved
     */
    public function setSaved($saved)
    {
        $this->saved = $saved;
    }

    /**
     * @return mixed
     */
    public function getPrinted()
    {
        return $this->printed;
    }

    /**
     * @param mixed $printed
     */
    public function setPrinted($printed)
    {
        $this->printed = $printed;
    }

    /**
     * @return mixed
     */
    public function getMailed()
    {
        return $this->mailed;
    }

    /**
     * @param mixed $mailed
     */
    public function setMailed($mailed)
    {
        $this->mailed = $mailed;
    }



}