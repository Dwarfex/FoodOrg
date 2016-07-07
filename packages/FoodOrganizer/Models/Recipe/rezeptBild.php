<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 30.04.2016
 * Time: 14:54
 */

namespace Package\FoodOrganizer\Models\Recipe;


use MongoDB\Model\BSONDocument;
use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;

class rezeptBild extends BasicObject implements BasicObjectInterface
{
    private $id;
    private $num_votes;
    private $average_rating;
    private $bigImage;
    private $smallImage;
    private $user_id;
    private $owner;
    private $user_name;


    public function __construct(BSONDocument $data = null)
    {

        if($data != null){
            $this->loadBSONintoObject($data);
        }


    }

    public function loadBSONintoObject(BSONDocument $data){
        if (isset($data->id)) $this->setId($data->id);
        if (isset($data->num_votes)) $this->setNumVotes($data->num_votes);
        if (isset($data->average_rating)) $this->setAverageRating($data->average_rating);
        if (isset($data->user_id)) $this->setUserId($data->user_id);
        if (isset($data->owner)) $this->setOwner($data->owner);
        if (isset($data->user_name)) $this->setUserName($data->user_name);
        $bigImage = '960x720';
        $smallImage = '400';
        if (isset($data->bigImage)){
            $this->setBigImage($data->bigImage);
        } elseif (isset($data->$bigImage->file)){
            $this->setBigImage($data->$bigImage->file);
        }
        if (isset($data->smallImage)){
            $this->setSmallImage($data->smallImage);
        } elseif (isset($data->$smallImage->file)){
            $this->setSmallImage($data->$smallImage->file);
        }
        if (isset($data->$smallImage->owner)){
            $this->setOwner($data->$smallImage->owner);
        }
        if (isset($data->$smallImage->user_name)){
            $this->setUserName($data->$smallImage->user_name);
        }
        if (isset($data->$smallImage->user_id)){
            $this->setUserId($data->$smallImage->user_id);
        }





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
    public function getNumVotes()
    {
        return $this->num_votes;
    }

    /**
     * @param mixed $num_votes
     */
    public function setNumVotes($num_votes)
    {
        $this->num_votes = $num_votes;
    }

    /**
     * @return mixed
     */
    public function getAverageRating()
    {
        return $this->average_rating;
    }

    /**
     * @param mixed $average_rating
     */
    public function setAverageRating($average_rating)
    {
        $this->average_rating = $average_rating;
    }

    /**
     * @return mixed
     */
    public function getBigImage()
    {
        return  $this->getImageUrl($this->bigImage, 'big');
    }

    /**
     * @param mixed $bigImage
     */
    public function setBigImage($bigImage)
    {
        $this->bigImage = $bigImage;
    }

    /**
     * @return mixed
     */
    public function getSmallImage()
    {

        return $this->getImageUrl($this->smallImage, 'small');
    }

    /**
     * @param mixed $smallImage
     */
    public function setSmallImage($smallImage)
    {
        $this->smallImage = $smallImage;
    }
    private function getImageUrl($image, $size)
    {
        //Todo Implemet demo images
        if(!isset($image)){
            return '/packages/FoodOrganizer/layout/images/foodanddrink/foodanddrink ('.rand(1,28).').png';
        }

        $url = $image;
        $img = '/var/www/seframe/public/uploads/FOImageCache/'.$this->getId().'_'.$size.'.jpg';
        $url2 = '/public/uploads/FOImageCache/'.$this->getId().'_'.$size.'.jpg';
        $retrieveImage = false;
        if(file_exists($img)){
            return $url2;
        }
        try{
            $retrieveImage = file_get_contents($url);
        } catch (\Exception $e){

        }
        if(!file_exists($img) && $retrieveImage){
            file_put_contents($img, $retrieveImage);
        }

        return $url2;

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }



}