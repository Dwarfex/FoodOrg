<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 21:29
 */

namespace Package\FoodOrganizer\Models\Recipe;



use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;
use MongoDB\Model\BSONDocument;

    class rezepteSammlung extends BasicObject implements BasicObjectInterface
{
        private $sammlungs_id;
        private $sammlungs_name;
        private $sammlungs_link;


    public function __construct(BSONDocument $data = null)
    {
        if($data != null){
            $this->loadBSONintoObject($data);
        }
    }

    public function loadBSONintoObject(BSONDocument $data)
    {
        // TODO: Implement loadBSONintoObject() method.
    }

        /**
         * @return mixed
         */
        public function getSammlungsId()
        {
            return $this->sammlungs_id;
        }

        /**
         * @param mixed $sammlungs_id
         */
        public function setSammlungsId($sammlungs_id)
        {
            $this->sammlungs_id = $sammlungs_id;
        }

        /**
         * @return mixed
         */
        public function getSammlungsName()
        {
            return $this->sammlungs_name;
        }

        /**
         * @param mixed $sammlungs_name
         */
        public function setSammlungsName($sammlungs_name)
        {
            $this->sammlungs_name = $sammlungs_name;
        }

        /**
         * @return mixed
         */
        public function getSammlungsLink()
        {
            return $this->sammlungs_link;
        }

        /**
         * @param mixed $sammlungs_link
         */
        public function setSammlungsLink($sammlungs_link)
        {
            $this->sammlungs_link = $sammlungs_link;
        }


}