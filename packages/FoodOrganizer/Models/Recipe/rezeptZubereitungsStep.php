<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 21:45
 */

namespace Package\FoodOrganizer\Models\Recipe;




use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;
use MongoDB\Model\BSONDocument;
use Package\FoodOrganizer\Models\Recipe\zutat;

class rezeptZubereitungsStep extends BasicObject implements BasicObjectInterface
{

/*
 * "rezept_zubereitungssteps": [
    {
      "id": "1",
      "abhaenigVon":[],
      "zubereitung": "Mehl, Zucker und Salz und Hefe mischen, Butter darunter kneten und den geriebenen Apfel dazu geben.",
      "zubereitungsZeit": 5,
      "warten":"5 Minuten im Kühlschrank abkühlen lassen",
      "warteZeit": 5
    },
 */
    private $id;
    private $abhaeningVon;
    private $zubereitung;
    private $zubereitungsZeit;
    private $zutaten = array();
    private $warten;
    private $warteZeit;


    public function __construct(BSONDocument $data = null)
    {

        if ($data != null) {

            $this->loadBSONintoObject($data);

        }


    }


    public function loadBSONintoObject(BSONDocument $data)
    {


        if (isset($data->id)) $this->setId($data->id);
        if (isset($data->abhaeningVon)) $this->setAbhaeningVon($data->abhaeningVon);
        if (isset($data->zubereitung)) $this->setZubereitung($data->zubereitung);
        if (isset($data->zubereitungsZeit)) $this->setZubereitungsZeit($data->zubereitungsZeit);
        if (isset($data->zutaten)) $this->setZutaten($data->zutaten);
        if (isset($data->warten)) $this->setWarten($data->warten);
        if (isset($data->warteZeit)) $this->setWarteZeit($data->warteZeit);

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
     * @return array
     */
    public function getAbhaeningVon()
    {
        return $this->abhaeningVon;
    }

    /**
     * @param array $abhaeningVon
     */
    public function setAbhaeningVon($abhaeningVon)
    {
        $this->abhaeningVon = $abhaeningVon;
    }

    /**
     * @return mixed
     */
    public function getZubereitung()
    {
        return $this->zubereitung;
    }

    /**
     * @param mixed $zubereitung
     */
    public function setZubereitung($zubereitung)
    {
        $this->zubereitung = $zubereitung;
    }

    /**
     * @return mixed
     */
    public function getZubereitungsZeit()
    {
        return $this->zubereitungsZeit;
    }

    /**
     * @param mixed $zubereitungsZeit
     */
    public function setZubereitungsZeit($zubereitungsZeit)
    {
        $this->zubereitungsZeit = $zubereitungsZeit;
    }

    /**
     * @return array
     */
    public function getZutaten()
    {

        return $this->zutaten;
    }

    /**
     * @param array $zutaten
     */
    public function setZutaten($zutaten)
    {


        $zutatenArray = array();
        foreach ($zutaten as $zutat){
            if(is_object($zutat)){
                $zutatenArray[] = new zutat($zutat);
            }else{

            $zutatenArray[] = $zutat;
            }
        }
        $this->zutaten= $zutatenArray;


    }

    public function setZutatenDirectly($arrayOfZutatenObjects){
        $this->zutaten = $arrayOfZutatenObjects;
    }

    /**
     * @return mixed
     */
    public function getWarten()
    {
        return $this->warten;
    }

    /**
     * @param mixed $warten
     */
    public function setWarten($warten)
    {
        $this->warten = $warten;
    }

    /**
     * @return mixed
     */
    public function getWarteZeit()
    {
        return $this->warteZeit;
    }

    /**
     * @param mixed $warteZeit
     */
    public function setWarteZeit($warteZeit)
    {
        $this->warteZeit = $warteZeit;
    }



}