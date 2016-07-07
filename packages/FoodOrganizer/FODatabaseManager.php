<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 23.12.2015
 * Time: 17:30
 */

namespace Package\FoodOrganizer;




class FODatabaseManager
{
    private $mongoDB;
    private $mySQLDB;

    /**
     * FODatabaseManager constructor.
     */
    public function __construct()
    {
//        $this->mongoDB = new FODBMongoDB();
//        $this->mySQLDB = new FODBMySQL();
        if (1 == 1) return true;
        return false;
    }

    /**
     * @return \Package\FoodOrganizer\FODBMongoDB
     */
    public function getMongoDB()
    {
        return $this->mongoDB;
    }

    /**
     * @param \Package\FoodOrganizer\FODBMongoDB $mongoDB
     */
    public function setMongoDB($mongoDB)
    {
        $this->mongoDB = $mongoDB;
    }

    

}