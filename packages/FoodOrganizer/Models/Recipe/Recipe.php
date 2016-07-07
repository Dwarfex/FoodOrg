<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 28.04.2016
 * Time: 12:56
 */

namespace Package\FoodOrganizer\Models\Recipe;

use MongoDB\Collection;
use MongoDB\Model\BSONArray;
use Package\FoodOrganizer\FOHelpers;
use Package\FoodOrganizer\Models\BasicObject;
use Package\FoodOrganizer\Models\BasicObjectInterface;
use MongoDB\Model\BSONDocument;

class Recipe extends BasicObject implements BasicObjectInterface
{
    private $mongoId;
    private $rezept_bilder = array();


    private $rezept_cooking_time;
    private $rezept_datum;
    private $rezept_frontend_url;
    private $rezept_id;
    private $rezept_in_rezeptesammlung;
    private $rezept_kcal;
    private $rezept_name;
    private $rezept_name2;
    private $rezept_portionen;
    private $rezept_preparation;
    private $rezept_resting_time;
    private $rezept_schwierigkeit;
    private $rezept_show_id;
    private $rezept_statistik = array();
    private $rezept_tags = array();
    private $rezept_user_id;
    private $rezept_user_name;
    private $rezept_user_portionen;
    private $rezept_votes;
    private $rezept_zubereitungs_step = array();
    private $rezeptsammlungen_link;


    public function __construct(BSONDocument $data = null)
    {

        if ($data != null) {
            $this->loadBSONintoObject($data);
        }


    }

    public function loadBSONintoObject(BSONDocument $data)
    {

        if (isset($data->_id)) $this->setMongoId($data->_id);
        if (isset($data->rezept_bilder)) $this->setRezeptBilder($data->rezept_bilder);

        if (isset($data->rezept_cooking_time)) $this->setRezeptCookingTime($data->rezept_cooking_time);
        if (isset($data->rezept_datum)) $this->setRezeptDatum($data->rezept_datum);
        if (isset($data->rezept_frontend_url)) $this->setRezeptFrontendUrl($data->rezept_frontend_url);
        if (isset($data->rezept_id)) $this->setRezeptId($data->rezept_id);
        if (isset($data->rezept_in_rezeptesammlung)) $this->setRezeptInRezeptesammlung($data->rezept_in_rezeptesammlung);
        if (isset($data->rezept_kcal)) $this->setRezeptKcal($data->rezept_kcal);
        if (isset($data->rezept_name)) $this->setRezeptName($data->rezept_name);
        if (isset($data->rezept_name2)) $this->setRezeptName2($data->rezept_name2);
        if (isset($data->rezept_portionen)) $this->setRezeptPortionen($data->rezept_portionen);
        if (isset($data->rezept_preparation)) $this->setRezeptPreparation($data->rezept_preparation);
        if (isset($data->rezept_resting_time)) $this->setRezeptRestingTime($data->rezept_resting_time);
        if (isset($data->rezept_schwierigkeit)) $this->setRezeptSchwierigkeit($data->rezept_schwierigkeit);
        if (isset($data->rezept_show_id)) $this->setRezeptShowId($data->rezept_show_id);
        if (isset($data->rezept_statistik)) $this->setRezeptStatistik($data->rezept_statistik);
        if (isset($data->rezept_tags)) $this->setRezeptTags($data->rezept_tags);
        if (isset($data->rezept_user_id)) $this->setRezeptUserId($data->rezept_user_id);
        if (isset($data->rezept_user_name)) $this->setRezeptUserName($data->rezept_user_name);
        if (isset($data->rezept_user_portionen)) $this->setRezeptUserPortionen($data->rezept_user_portionen);
        if (isset($data->rezept_votes)) $this->setRezeptVotes($data->rezept_votes);

        if (isset($data->rezept_zubereitung)
            && isset($data->rezept_zutaten)
            && isset($data->rezept_preparation_time)
            && isset($data->rezept_resting_time)
            && !isset($data->rezept_zubereitungs_step)
        ) {


            $zubereitungsData = new rezeptZubereitungsStep();
            $zubereitungsData->setZubereitung($data->rezept_zubereitung);
            $zubereitungsData->setZutaten($data->rezept_zutaten);
            $zubereitungsData->setZubereitungsZeit($data->rezept_preparation_time);
            $zubereitungsData->setWarteZeit($data->rezept_resting_time);
            $this->setRezeptZubereitungsStep(array($zubereitungsData));


        } elseif (isset($data->rezept_zubereitungs_step)) $this->setRezeptZubereitungsStep($data->rezept_zubereitungs_step);
        if (isset($data->rezeptsammlungen_link)) $this->setRezeptsammlungenLink($data->rezeptsammlungen_link);


    }

    /**
     * @return mixed
     */
    public function getMongoId()
    {
        return $this->mongoId;
    }

    /**
     * @param mixed $mongoId
     */
    public function setMongoId($mongoId)
    {
        $this->mongoId = (string)$mongoId;
    }

    /**
     * @return array
     */
    public function getRezeptBilder()
    {

        if (count($this->rezept_bilder) != 0) {
            return $this->rezept_bilder;
        } else {
            $noAvailableImage = array(new rezeptBild());

            return $noAvailableImage;
        }

    }

    /**
     * @param array $rezept_bilder
     */
    public function setRezeptBilder($rezept_bilder)
    {
        $bilderArray = array();
        foreach ($rezept_bilder as $rezept_bild) {
            $rezept_bild_object = new rezeptBild($rezept_bild);

            $bilderArray[] = ($rezept_bild_object);


        }

        $this->rezept_bilder = $bilderArray;
    }

    /**
     * @return int
     */
    public function getRezeptCookingTime()
    {

        return $this->rezept_cooking_time;
    }

    /**
     * @param mixed $rezept_cooking_time
     */
    public function setRezeptCookingTime($rezept_cooking_time)
    {
        $this->rezept_cooking_time = $rezept_cooking_time;
    }

    /**
     * @return mixed
     */
    public function getRezeptDatum()
    {
        return $this->rezept_datum;
    }

    /**
     * @param mixed $rezept_datum
     */
    public function setRezeptDatum($rezept_datum)
    {
        $this->rezept_datum = $rezept_datum;
    }

    /**
     * @return mixed
     */
    public function getRezeptFrontendUrl()
    {
        return $this->rezept_frontend_url;
    }

    /**
     * @param mixed $rezept_frontend_url
     */
    public function setRezeptFrontendUrl($rezept_frontend_url)
    {
        $this->rezept_frontend_url = $rezept_frontend_url;
    }

    /**
     * @return mixed
     */
    public function getRezeptId()
    {
        return $this->rezept_id;
    }

    /**
     * @param mixed $rezept_id
     */
    public function setRezeptId($rezept_id)
    {
        $this->rezept_id = $rezept_id;
    }

    /**
     * @return array
     */
    public function getRezeptInRezeptesammlung()
    {
        return $this->rezept_in_rezeptesammlung;
    }

    /**
     * @param array $rezept_in_rezeptesammlung
     */
    public function setRezeptInRezeptesammlung($rezept_in_rezeptesammlung)
    {   //todo: add Rezeptsammlungen
        /*
         * [rezept_in_rezeptsammlung] => MongoDB\Model\BSONArray Object
                (
                    [storage:ArrayObject:private] => Array
                        (
                            [0] => MongoDB\Model\BSONDocument Object
                                (
                                    [storage:ArrayObject:private] => Array
                                        (
                                            [sammlungs_id] => 2506142
                                            [sammlungs_name] => backen mein hobby (4)
                                            [sammlungs_link] => /rezeptsammlung/2506142/backen-mein-hobby-4.html
                                        )

                                )
         */
        $this->rezept_in_rezeptesammlung = $rezept_in_rezeptesammlung;
    }

    /**
     * @return mixed
     */
    public function getRezeptKcal()
    {
        return $this->rezept_kcal;
    }

    /**
     * @param mixed $rezept_kcal
     */
    public function setRezeptKcal($rezept_kcal)
    {
        $this->rezept_kcal = $rezept_kcal;
    }

    /**
     * @return mixed
     */
    public function getRezeptName()
    {
        return $this->rezept_name;
    }

    /**
     * @param mixed $rezept_name
     */
    public function setRezeptName($rezept_name)
    {
        $this->rezept_name = $rezept_name;
    }

    /**
     * @return mixed
     */
    public function getRezeptName2()
    {
        return $this->rezept_name2;
    }

    /**
     * @param mixed $rezept_name2
     */
    public function setRezeptName2($rezept_name2)
    {
        $this->rezept_name2 = $rezept_name2;
    }

    /**
     * @return mixed
     */
    public function getRezeptPortionen()
    {
        return $this->rezept_portionen;
    }

    /**
     * @param mixed $rezept_portionen
     */
    public function setRezeptPortionen($rezept_portionen)
    {
        $this->rezept_portionen = $rezept_portionen;
    }

    /**
     * @return mixed
     */
    public function getRezeptPreparation()
    {
        return $this->rezept_preparation;
    }

    /**
     * @param mixed $rezept_preparation
     */
    public function setRezeptPreparation($rezept_preparation)
    {
        $this->rezept_preparation = $rezept_preparation;
    }

    /**
     * @return int
     */
    public function getRezeptRestingTime()
    {
        return $this->rezept_resting_time;
    }

    /**
     * @param mixed $rezept_resting_rime
     */
    public function setRezeptRestingTime($rezept_resting_time)
    {
        $this->rezept_resting_time = $rezept_resting_time;
    }

    /**
     * @return mixed
     */
    public function getRezeptSchwierigkeit()
    {
        return $this->rezept_schwierigkeit;
    }

    /**
     * @param mixed $rezept_schwierigkeit
     */
    public function setRezeptSchwierigkeit($rezept_schwierigkeit)
    {
        $this->rezept_schwierigkeit = $rezept_schwierigkeit;
    }

    /**
     * @return mixed
     */
    public function getRezeptShowId()
    {
        count($this->getRezeptDatum());
        return $this->rezept_show_id;
    }

    /**
     * @param mixed $rezept_show_id
     */
    public function setRezeptShowId($rezept_show_id)
    {
        $this->rezept_show_id = $rezept_show_id;
    }

    /**
     * @return array
     */
    public function getRezeptStatistik()
    {
        return $this->rezept_statistik;
    }

    /**
     * @return rezeptStatistik
     */
    public function getRezeptStatistikTotal()
    {
        return $this->getRezeptStatistik()['total'];
    }

    /**
     * @return rezeptStatistik
     */
    public function getRezeptStatistikMonth()
    {
        return $this->getRezeptStatistik()['month'];
    }

    /**
     * @param array $rezept_statistik
     */
    public function setRezeptStatistik($rezept_statistik)
    {
        if (isset($rezept_statistik['total']) &&isset($rezept_statistik['month'])){
            $this->rezept_statistik['total'] =$rezept_statistik['total'];
            $this->rezept_statistik['month'] =$rezept_statistik['month'];
        } else{

        $month = new rezeptStatistik();
        $total = new rezeptStatistik();
        if (isset($rezept_statistik->total)) $total = new rezeptStatistik($rezept_statistik->total);
        if (isset($rezept_statistik->month)) $month = new rezeptStatistik($rezept_statistik->month);
        $this->rezept_statistik = array();
        $this->rezept_statistik['total'] = $total;
        $this->rezept_statistik['month'] = $month;
        }
    }

    /**
     * @return array
     */
    public function getRezeptTags()
    {
        return $this->rezept_tags;
    }

    public function getRezeptTagsAsString():String
    {
        $count = count($this->getRezeptTags());
        $string = '';
        if ($count == 0) {
            return $string;
        } else {
            foreach ($this->getRezeptTags() as $key => $value) {
                if ($key == ($count - 1)) {
                    $string .= $value;
                } else {
                    $string .= $value . ', ';
                }


            }

        }
        return $string;
    }

    /**
     * @param BSONArray $rezept_tags
     */
    public function setRezeptTags(BSONArray $rezept_tags)
    {
        $this->rezept_tags = array();
        foreach ($rezept_tags as $tag) {
            $this->rezept_tags[] = $tag;
        }


    }

    public function setRezeptTagsFromPOST($rezept_tags)
    {


        $returnArray = array();
        $explodedArray = explode(',', $rezept_tags);
        foreach ($explodedArray as $value) {
            $returnArray[] = str_replace(' ', '', $value);
        }

        $this->rezept_tags = $returnArray;


    }

    /**
     * @return mixed
     */
    public function getRezeptUserId()
    {
        return $this->rezept_user_id;
    }

    /**
     * @param mixed $rezept_user_id
     */
    public function setRezeptUserId($rezept_user_id)
    {
        $this->rezept_user_id = $rezept_user_id;
    }

    /**
     * @return mixed
     */
    public function getRezeptUserName()
    {
        return $this->rezept_user_name;
    }

    public function getRezeptUserNameLink()
    {
        return FOHelpers::getFOBaseDirectory() . '/user/' . $this->getRezeptUserId() . '/' . $this->getRezeptUserName();
    }

    /**
     * @param mixed $rezept_user_name
     */
    public function setRezeptUserName($rezept_user_name)
    {
        $this->rezept_user_name = $rezept_user_name;
    }

    /**
     * @return mixed
     */
    public function getRezeptUserPortionen()
    {
        return $this->rezept_user_portionen;
    }

    /**
     * @param mixed $rezept_user_portionen
     */
    public function setRezeptUserPortionen($rezept_user_portionen)
    {
        $this->rezept_user_portionen = $rezept_user_portionen;
    }

    /**
     * @return rezeptVotes
     */
    public function getRezeptVotes()
    {
        return $this->rezept_votes;
    }

    /**
     * @param BSONDocument $rezept_votes
     */
    public function setRezeptVotes(BSONDocument $rezept_votes)
    {
        $this->rezept_votes = new rezeptVotes($rezept_votes);

    }

    public function setRezeptVotesFromObject(rezeptVotes $rezept_votes)
    {
        $this->rezept_votes = $rezept_votes;

    }

    /**
     * @return array
     */
    public function getRezeptZubereitungsStep()
    {

        return (array)$this->rezept_zubereitungs_step;
    }

    /**
     * @param array $rezept_zubereitungs_step
     */
    public function setRezeptZubereitungsStep($rezept_zubereitungs_step)
    {
        //todo converter : wenn keine steps vorhanden suche nach rezept_zubereitung und rezept_zutaten und in einen rezeptZubereitungsStep konvertieren


        if (is_object($rezept_zubereitungs_step)) {

            foreach ($rezept_zubereitungs_step as $stepData) {

                $step = new rezeptZubereitungsStep();
                if(isset($stepData['id']))$step->setId($stepData['id']);
                if(isset($stepData['abhaeningVon']))$step->setAbhaeningVon($stepData['abhaeningVon']);
                if(isset($stepData['zubereitung']))$step->setZubereitung($stepData['zubereitung']);
                if(isset($stepData['zubereitungsZeit']))$step->setZubereitungsZeit($stepData['zubereitungsZeit']);
                if(isset($stepData['warteZeit']))$step->setWarteZeit($stepData['warteZeit']);
                if(isset($stepData['warten']))$step->setWarten($stepData['warten']);
                    if(isset($stepData['zutaten'])){
                        $zutatenArray = array();
                        foreach ($stepData['zutaten'] as $zutat){
                           if(get_class($zutat) =='MongoDB\Model\BSONDocumentMongoDB\Model\BSONDocument'){
                               echo 'BSON';
                               $zutatenArray[] = new zutat($zutat);
                           }else{
                               $zutatenArray[] = $zutat;
                           }




                        }
                        $step->setZutaten($zutatenArray);
                    }



                //$step = new rezeptZubereitungsStep();

            $steps[] = $step;

        }
            $this->rezept_zubereitungs_step = $steps;
        } else {
            $this->rezept_zubereitungs_step = $rezept_zubereitungs_step;
        }


    }

    /**
     * @return mixed
     */
    public
    function getRezeptsammlungenLink()
    {
        return $this->rezeptsammlungen_link;
    }

    /**
     * @param mixed $rezeptsammlungen_link
     */
    public
    function setRezeptsammlungenLink($rezeptsammlungen_link)
    {
        $this->rezeptsammlungen_link = $rezeptsammlungen_link;
    }

    public
    function isValidRecipe()
    {
        if (!isset($this->rezept_name)) {
            return false;
        }
        return true;
    }


    public function updateFromPOSTData($postDataArray)
    {

       

        $sanitizedData = parent::sanitize($postDataArray);
        if (isset($sanitizedData['neueZutat'])) print_r($sanitizedData['neueZutat']);


        if (isset($sanitizedData['rezept_name'])) $this->setRezeptName($sanitizedData['rezept_name']);
        if (isset($sanitizedData['rezept_name2'])) $this->setRezeptName2($sanitizedData['rezept_name2']);
        if (isset($sanitizedData['rezept_portionen'])) $this->setRezeptPortionen($sanitizedData['rezept_portionen']);
        if (isset($sanitizedData['rezept_tags'])) $this->setRezeptTagsFromPOST($sanitizedData['rezept_tags']);
        if (isset($sanitizedData['rezept_step'])) {

            $rezept_zubereitungs_stepArray = array();

            foreach ($sanitizedData['rezept_step'] as $key => $step) {
                if(isset($sanitizedData['delStep'])){

                if ($sanitizedData['delStep']==$key) {
                    continue;

                }
                }


                $stepObject = new rezeptZubereitungsStep();
                if (isset($step['dependsOn'])) $stepObject->setAbhaeningVon($step['dependsOn']);
                if (isset($step['zubereitung'])) $stepObject->setZubereitung($step['zubereitung']);
                if (isset($step['zubereitungsZeit'])) $stepObject->setZubereitungsZeit($step['zubereitungsZeit']);
                if (isset($step['warten'])) $stepObject->setWarten($step['warten']);
                if (isset($step['warteZeit'])) $stepObject->setWarteZeit($step['warteZeit']);
                $zutaten = array();
                if (isset($step['zutaten'])) {
                    foreach ($step['zutaten'] as $zutatKey => $stepZutat) {
                        //delete zutat here
                        if (@isset($sanitizedData['del'][$key][$zutatKey])) {
                            continue;

                        }
                        $zutat = new zutat();
                        if (isset($stepZutat['zutat_name'])) $zutat->setName($stepZutat['zutat_name']);
                        //skip emty zutaten
                        if ($zutat->getName() == '') continue;
                        if (isset($stepZutat['zutat_menge'])) $zutat->setMenge($stepZutat['zutat_menge']);
                        if (isset($stepZutat['zutat_einheit'])) $zutat->setEinheit($stepZutat['zutat_einheit']);
                        if (isset($stepZutat['zutat_eigenschaft'])) $zutat->setEigenschaft($stepZutat['zutat_eigenschaft']);
                        if (isset($stepZutat['zutat_istBasic'])) $zutat->setIstBasic($stepZutat['zutat_istBasic']);
                        if (isset($stepZutat['zutat_ID'])) $zutat->setId($stepZutat['zutat_ID']);
                        $zutaten[] = $zutat;
                    }
                }


                if (isset($sanitizedData['neueZutat'])) {

                    if ($sanitizedData['neueZutat'] == $key) {
                        echo PHP_EOL . PHP_EOL . PHP_EOL . "KEY" . $key . PHP_EOL;
                        $zutaten[] = new zutat();
                    }
                }
                $stepObject->setZutatenDirectly($zutaten);


                //todo: zusätzliche eigenschaften
                $rezept_zubereitungs_stepArray[] = $stepObject;


            }

            if (isset($sanitizedData['neuerStep'])) {
                $rezept_zubereitungs_stepArray[] = new rezeptZubereitungsStep();


            }
            $this->setRezeptZubereitungsStep($rezept_zubereitungs_stepArray);

            $this->setRezeptCookingTime($this->calculateRezeptCookingTimeFromSteps());
            // date stayse same -> creationdate  ---- $this->setRezeptDatum()
            //stays samae -> update $this->setRezeptFrontendUrl();
            //stays samae -> update $this->setRezeptId();
            if (isset($sanitizedData['inRezepteSammlung'])) $this->setRezeptInRezeptesammlung($sanitizedData['inRezepteSammlung']);
            $this->setRezeptKcal($this->calculateRezeptKcalFromZutaten());

            if (isset($sanitizedData['preparation'])) $this->setRezeptPreparation($sanitizedData['preparation']);
            $this->setRezeptRestingTime($this->calculateRezeptRestingTimeFromSteps());
            if (isset($sanitizedData['rezept_schwierigkeit'])) $this->setRezeptSchwierigkeit($sanitizedData['rezept_schwierigkeit']);
            //stays samae -> update $this->setRezeptShowId();
            //update in show $this->setRezeptStatistik();
            //stays samae -> update $this->setRezeptUserId();
            //stays samae -> update $this->setRezeptUserName();
            //if(isset($sanitizedData[]))$this->setRezeptUserPortionen();
            //update in show$this->setRezeptVotes();
            //stays samae -> update $this->setRezeptsammlungenLink();

        }


        return $this;

    }


    private
    function calculateRezeptCookingTimeFromSteps():int
    {
        $time = 0;
        foreach ($this->getRezeptZubereitungsStep() as $step) {
            /* @var $step \Package\FoodOrganizer\Models\Recipe\rezeptZubereitungsStep */
            $time += $step->getZubereitungsZeit();
        }
        return $time;

    }

    private
    function calculateRezeptRestingTimeFromSteps():int
    {
        $time = 0;
        foreach ($this->getRezeptZubereitungsStep() as $step) {
            /* @var $step \Package\FoodOrganizer\Models\Recipe\rezeptZubereitungsStep */
            $time += $step->getWarteZeit();
        }
        return $time;
    }

    public
    function getAllZutaten()
    {
        $alleZutaten = array();
        foreach ($this->getRezeptZubereitungsStep() as $step) {
            /* @var $step \Package\FoodOrganizer\Models\Recipe\rezeptZubereitungsStep */
            $alleZutaten = array_merge($step->getZutaten(), $alleZutaten);
        }
        return $alleZutaten;

    }

    private
    function calculateRezeptKcalFromZutaten()
    {
        $kcal = 0;
        foreach ($this->getAllZutaten() as $zutat) {
            /* @var $zutat zutat */
            $kcal += $zutat->getKcal();
        }
        return $kcal;
    }

    function save(Collection $collection, $upsert = false)
    {
        //todo make sure, that there are no empty arrays in database "query"


        $result = $collection->updateOne(

            ["rezept_id" => $this->getRezeptId()],
            ['$set' => $this->makeSaveable()],

            ['upsert' => $upsert]
        );
        return $result;
    }


}