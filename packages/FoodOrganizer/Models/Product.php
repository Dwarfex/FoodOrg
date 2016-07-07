<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 28.04.2016
 * Time: 13:36
 */

namespace Package\FoodOrganizer\Models;


use MongoDB\BSON\ObjectID;
use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;
use Package\FoodOrganizer\FONahrungsmittel;


class Product extends BasicObject implements BasicObjectInterface
{
//    /*
//{
//"_id" : ObjectId("56d762b29cc65460f1e89e89"),
    private $mongoId;


//"additionalInfo" : "",
    private $additionalInfo;
//"alcohol" : null,
    private $alcohol;
//"allergicHints" : [ ],
    private $allergicHints = array();
//"basic_unit" : "ml",
    private $basic_unit;
//"brand" : "A&P",
    private $brand;
//"content" : "500 ml",
    private $content;
//"contentAlarms" : [
    private $contentAlarms = array();
//{
//"name" : "Fett",
//"rating" : "0",
//"amount" : -1,
//"referenceAmount" : "100",
//"contentUnit" : "g"
//},
//    {
//        "name" : "ges�ttigte Fetts�uren",
//                        "rating" : "0",
//                        "amount" : -1,
//                        "referenceAmount" : "100",
//                        "contentUnit" : "g"
//                },
//    {
//        "name" : "Zucker",
//                        "rating" : "0",
//                        "amount" : -1,
//                        "referenceAmount" : "100",
//                        "contentUnit" : "g"
//                },
//    {
//        "name" : "Natrium",
//                        "rating" : "0",
//                        "amount" : -1,
//                        "referenceAmount" : "100",
//                        "contentUnit" : "g"
//                }
//],
//"description" : "",
    private $description;
//        "ean" : "",
    private $ean;
//        "eanType" : "",
    private $eanType;
//        "energyDailyDosis" : "",
    private $energyDailyDosis;
//        "energykcal" : "",
    private $energykcal;
//        "energykj" : "",
    private $energykj;
//        "enumbers" : [ ],
    private $enumbers = array();
//        "id" : "1",
    private $id;
//        "imageUrl" : "http://media.das-ist-drin.de/dynamic/1_sml.jpg",
    private $imageUrl;
//        "ingredients" : "",
    private $ingredients;
//        "isAllergicDataEditable" : true,
    private $isAllergicDataEditable;
//        "isBasicDataEditable" : true,
    private $isBasicDataEditable;
//        "isContentAlarmEditable" : true,
    private $isContentAlarmEditable;
//        "isEANEditable" : true,
    private $isEANEditable;
//        "isEditable" : true,
    private $isEditable;
//        "isIngredientsDataEditable" : true,
    private $isIngredientsDataEditable;
//        "manufacturer" : "",
    private $manufacturer;
//        "nutritionalValues" : [
    private $nutritionalValues;
//                {
//                    "name" : "Eiwei�",
//                        "amount" : -1,
//                        "dailyFraction" : -1
//                },
//                {
//                    "name" : "Kohlenhydrate",
//                        "amount" : -1,
//                        "dailyFraction" : -1
//                },
//                {
//                    "name" : "Fett",
//                        "amount" : -1,
//                        "dailyFraction" : -1
//                },
//                {
//                    "name" : "Ballaststoffe",
//                        "amount" : -1,
//                        "dailyFraction" : -1
//                }
//        ],
//        "packaging" : "Becher",
    private $packaging;
//        "product" : "Buttermilch",
    private $product;
//        "title" : "A&P Buttermilch 500 ml",
    private $title;
//        "vitamins" : ""
    private $vitamins;
//}
//
    public function __construct(BSONDocument $productData = null)
    {
        if ($productData != null) {
            try {
                $this->loadBSONintoObject($productData);
            } catch (\Exception $e) {

            }
        }
        // Get current time in milliseconds since the epoch

    }

//    function bsonSerialize()
//    {
//        return [
//            '_id' => $this->id,
//            'name' => $this->name,
//            'createdAt' => $this->createdAt,
//        ];
//    }

    function loadBSONintoObject(BSONDocument $data)
    {

        $this->setMongoId($data->_id);

        $this->setAdditionalInfo($data->additionalInfo);

        $this->setAlcohol($data->alcohol);

        $this->setAllergicHints($data->allergicHints);

        $this->setBasicUnit($data->basic_unit);

        $this->setBrand($data->brand);

        $this->setContent($data->content);

        $this->setContentAlarms($data->contentAlarms);

        $this->setDescription($data->description);

        $this->setEan($data->ean);

        $this->setEanType($data->eanType);

        $this->setEnergyDailyDosis($data->energyDailyDosis);

        $this->setEnergykcal($data->energykcal);

        $this->setEnergykj($data->energykj);

        $this->setEnumbers($data->enumbers);

        $this->setId($data->id);

        $this->setImageUrl($data->imageUrl);

        $this->setIngredients($data->ingredients);

        $this->setIsAllergicDataEditable($data->isAllergicDataEditable);

        $this->setIsBasicDataEditable($data->isBasicDataEditable);

        $this->setIsContentAlarmEditable($data->isContentAlarmEditable);

        $this->setIsEANEditable($data->isEANEditable);

        $this->setIsEditable($data->isEditable);

        $this->setIsIngredientsDataEditable($data->isIngredientsDataEditable);

        $this->setManufacturer($data->manufacturer);

        $this->setNutritionalValues($data->nutritionalValues);

        $this->setPackaging($data->packaging);

        $this->setProduct($data->product);

        $this->setTitle($data->title);

        $this->setVitamins($data->vitamins);
    }

    /**
     * @return mixed
     */
    public function getMongoId()
    {
        return $this->mongoId;
    }

    public function getMongoIdObject($mongoIdString = null):ObjectID
    {

        return parent::getMongoIdObject($this->getMongoId());
    }

    /**
     * @param mixed $mongoId
     */
    public function setMongoId($mongoId)
    {


        $this->mongoId = $mongoId->__toString();
    }

    /**
     * @return mixed
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param mixed $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return mixed
     */
    public function getAlcohol()
    {
        return $this->alcohol;
    }

    /**
     * @param mixed $alcohol
     */
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;
    }

    /**
     * @return mixed
     */
    public function getAllergicHints()
    {
        return $this->allergicHints;
    }

    /**
     * @param mixed $allergicHints
     */
    public function setAllergicHints(BSONArray $allergicHints)
    {

        $allergicHintsArray = array();

        foreach ($allergicHints as $allergicHint) {

            $allergicHintObject = new allergicHint($allergicHint);
            $allergicHintsArray[] = $allergicHintObject;
        }


        $this->allergicHints = $allergicHintsArray;
    }

    /**
     * @return mixed
     */
    public function getBasicUnit()
    {
        return $this->basic_unit;
    }

    /**
     * @param mixed $basic_unit
     */
    public function setBasicUnit($basic_unit)
    {
        $this->basic_unit = $basic_unit;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContentAlarms()
    {
        return $this->contentAlarms;
    }

    private function analyseContentAlarms($name)
    {
        $contentAlarmsArray = $this->getContentAlarms();


        foreach ($contentAlarmsArray as $contentAlarm) {
            /* @var $contentAlarm contentAlarm */

            if ($contentAlarm->getName() == $name) return $contentAlarm;
        }
        return false;

    }

    private function analyseNutritionvalues($name)
    {
        $nutritionValuesArray = $this->getNutritionalValues();


        foreach ($nutritionValuesArray as $nutritionValue) {
            /* @var $nutritionValue nutritionValue */

            if ($nutritionValue->getName() == $name) return $nutritionValue;
        }
        return false;

    }

    public function getFett()
    {
        $return= $this->analyseContentAlarms('Fett')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getFettDaily()
    {
        return ($this->getFett() / FONahrungsmittel::getReferenzmengeFett()) * 100;

    }

    public function getGesaettigteFettsaeuren()
    {
        $return= $this->analyseContentAlarms('gesÃ¤ttigte FettsÃ¤uren')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getGesaettigteFettsaeurenDaily()
    {
        return ($this->getGesaettigteFettsaeuren() / FONahrungsmittel::getReferenzmengeGesaettigteFettsaeuren()) * 100;
    }

    public function getZucker()
    {
        $return= $this->analyseContentAlarms('Zucker')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getZuckerDaily()
    {
        return ($this->getZucker() / FONahrungsmittel::getReferenzmengeZucker()) * 100;
    }

    public function getNatrium()
    {
        $return =$this->analyseContentAlarms('Natrium')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getNatriumDaily()
    {
        return ($this->getNatrium() / FONahrungsmittel::getReferenzmengeNatrium()) * 100;
    }

    public function getEiweiss()
    {
        $return= $this->analyseNutritionvalues('EiweiÃ')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getEiweissDaily()
    {
        return ($this->getEiweiss() / FONahrungsmittel::getReferenzmengeEiweiß()) * 100;
    }

    public function getKohlenhydrate()
    {
        $return= $this->analyseNutritionvalues('Kohlenhydrate')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getKohlenhydrateDaily()
    {
        return ($this->getKohlenhydrate() / FONahrungsmittel::getReferenzmengeKohlenhydrate()) * 100;
    }

    public function getBallaststoffe()
    {
        $return= $this->analyseNutritionvalues('Ballaststoffe')->getAmount();
        if($return >0 ) return $return; else return 0;
    }

    public function getBallaststoffeDaily()
    {
        return ($this->getBallaststoffe() / FONahrungsmittel::getReferenzmengeBallaststoffe()) * 100;

    }

    public function getDailyKcal()
    {
        return FONahrungsmittel::getReferenzmengeKcal();
    }

    /**
     * @param mixed $contentAlarms
     */
    public function setContentAlarms(BSONArray $contentAlarms)
    {

        $contentAlarmArray = array();

        foreach ($contentAlarms as $contentAlarm) {
            $contentAlarmObject = new contentAlarm($contentAlarm);
            $contentAlarmArray[] = $contentAlarmObject;
        }


        $this->contentAlarms = $contentAlarmArray;
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

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getEanType()
    {
        return $this->eanType;
    }

    /**
     * @param mixed $eanType
     */
    public function setEanType($eanType)
    {
        $this->eanType = $eanType;
    }

    /**
     * @return mixed
     */
    public function getEnergyDailyDosis()
    {
        return $this->energyDailyDosis;
    }

    /**
     * @param mixed $energyDailyDosis
     */
    public function setEnergyDailyDosis($energyDailyDosis)
    {
        $this->energyDailyDosis = $energyDailyDosis;
    }

    /**
     * @return mixed
     */
    public function getEnergykcal()
    {
        return $this->energykcal;
    }

    /**
     * @param mixed $energykcal
     */
    public function setEnergykcal($energykcal)
    {
        $this->energykcal = $energykcal;
    }

    /**
     * @return mixed
     */
    public function getEnergykj()
    {
        return $this->energykj;
    }

    /**
     * @param mixed $energykj
     */
    public function setEnergykj($energykj)
    {
        $this->energykj = $energykj;
    }

    /**
     * @return mixed
     */
    public function getEnumbers()
    {
        return $this->enumbers;
    }

    /**
     * @param mixed $enumbers
     */
    public function setEnumbers(BSONArray $enumbers)
    {


        $enumberArray = array();

        foreach ($enumbers as $enumber) {
            $enumberObject = new enumber($enumber);
            $enumberArray[] = $enumberObject;
        }


        $this->enumbers = $enumberArray;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImageUrl($big = false)
    {
        if ($big) {
            $size = 'big';
        } else {
            $size = 'sml';
        }
        //Todo Implemet demo images

        $url = 'http://media.das-ist-drin.de/dynamic/' . $this->getId() . '_' . $size . '.jpg';
        $img = '/var/www/seframe/public/uploads/FOImageCache/' . $this->getId() . '_' . $size . '.jpg';
        $url2 = '/public/uploads/FOImageCache/' . $this->getId() . '_' . $size . '.jpg';
        $retrieveImage = false;
        if (file_exists($img)) {
            return $url2;
        }

        try {
            $retrieveImage = file_get_contents($url);
        } catch (\Exception $e) {
            if ($big) {

                return 'http://placehold.it/450x550/cdcdcd/777/?text=N/A';
            } else {
                return 'http://placehold.it/120x160/cdcdcd/777/?text=N/A';
            }
        }


        if (!file_exists($img) && $retrieveImage) {
            file_put_contents($img, $retrieveImage);
        }

        return $url2;

    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getIsAllergicDataEditable()
    {
        return $this->isAllergicDataEditable;
    }

    /**
     * @param mixed $isAllergicDataEditable
     */
    public function setIsAllergicDataEditable($isAllergicDataEditable)
    {
        $this->isAllergicDataEditable = $isAllergicDataEditable;
    }

    /**
     * @return mixed
     */
    public function getIsBasicDataEditable()
    {
        return $this->isBasicDataEditable;
    }

    /**
     * @param mixed $isBasicDataEditable
     */
    public function setIsBasicDataEditable($isBasicDataEditable)
    {
        $this->isBasicDataEditable = $isBasicDataEditable;
    }

    /**
     * @return mixed
     */
    public function getIsContentAlarmEditable()
    {
        return $this->isContentAlarmEditable;
    }

    /**
     * @param mixed $isContentAlarmEditable
     */
    public function setIsContentAlarmEditable($isContentAlarmEditable)
    {
        $this->isContentAlarmEditable = $isContentAlarmEditable;
    }

    /**
     * @return mixed
     */
    public function getIsEANEditable()
    {
        return $this->isEANEditable;
    }

    /**
     * @param mixed $isEANEditable
     */
    public function setIsEANEditable($isEANEditable)
    {
        $this->isEANEditable = $isEANEditable;
    }

    /**
     * @return mixed
     */
    public function getIsEditable()
    {
        return $this->isEditable;
    }

    /**
     * @param mixed $isEditable
     */
    public function setIsEditable($isEditable)
    {
        $this->isEditable = $isEditable;
    }

    /**
     * @return mixed
     */
    public function getIsIngredientsDataEditable()
    {
        return $this->isIngredientsDataEditable;
    }

    /**
     * @param mixed $isIngredientsDataEditable
     */
    public function setIsIngredientsDataEditable($isIngredientsDataEditable)
    {
        $this->isIngredientsDataEditable = $isIngredientsDataEditable;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getNutritionalValues()
    {
        return $this->nutritionalValues;
    }

    /**
     * @param mixed $nutritionalValues
     */
    public function setNutritionalValues($nutritionalValues)
    {
        $nutritionalValueArray = array();

        foreach ($nutritionalValues as $nutritionalValue) {
            $nutritionalValueObject = new nutritionValue($nutritionalValue);
            $nutritionalValueArray[] = $nutritionalValueObject;
        }


        $this->nutritionalValues = $nutritionalValueArray;
    }

    /**
     * @return mixed
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * @param mixed $packaging
     */
    public function setPackaging($packaging)
    {
        $this->packaging = $packaging;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getVitamins()
    {
        return $this->vitamins;
    }

    /**
     * @param mixed $vitamins
     */
    public function setVitamins($vitamins)
    {
        $this->vitamins = $vitamins;
    }


}