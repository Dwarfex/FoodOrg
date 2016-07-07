<?php
/**
 * Created by PhpStorm.
 * User: Listener
 * Date: 07.01.2016
 * Time: 18:58
 */
$sePage->setPageTitle('DEV');


$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>DEV AREA</h1></div></div>';
use Package\FoodOrganizer\Models\Product;


//$client = new MongoDB\Client;
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$collection = new MongoDB\Collection($manager, "test", "items");
//$initialCollectionCount = $collection->count();
//$collectionCount =  $initialCollectionCount;

if(extension_loaded('mongodb')){
    $sitehtml .= "Mongo loaded".br();
}else $sitehtml .=  "mongo not found".br();
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$rezepte = new \Package\FoodOrganizer\Controller\recipeController();
$zutaten = new MongoDB\Collection($manager, "test", "zutaten");

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$produkte = new MongoDB\Collection($manager, "test", "items");
$productData = $produkte->findOne();
echo $productData->id.$productData->title.$productData->brand.PHP_EOL;



/* @var MongoDB\Model\BSONDocument $document */
error_reporting(E_ALL);
$rezeptData = $rezepte->findLimitSkip(1,545);
$productData = $produkte->findOne();
$rezept = $rezeptData[0];
/* @var \Package\FoodOrganizer\Models\Recipe\Recipe $rezept/ */

// se::arrayToULList($rezept->makeSaveable());
echo json_encode($rezept->makeSaveable());




die;
$product= new \Package\FoodOrganizer\Models\Product($productData);
print_r (\se::arrayToULList($product->getArrayCopy()));
//print_r($product->makeSaveable());






$sitehtml .=$product->getId().br();
$sitehtml .=$product->getTitle().br();
$sitehtml .=$product->getBrand().br();
$sitehtml .=$product->getIngredients().br();
$sitehtml .='<img src ='.$product->getImageUrl().'></img>'.br();


print_r( $product->getArrayCopy());

$sePage->addContent('content', $sitehtml);


