<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 09.05.2016
 * Time: 11:19
 */
$seUseOwnPageDisplayProcessing = true;


seEnableParameters(3);
if(!isset($sePageParameter[0])){
    $sePageParameter[0]='';
}
if(!isset($sePageParameter[1])){
    $sePageParameter[1]='';
}
if(!isset($sePageParameter[3])){
    $sePageParameter[3]='';
}


if (strtolower($sePageParameter[0]) == 'product') {
    $requestDatabase = 'produkt';
} elseif (strtolower($sePageParameter[0]) == 'recipe') {
    $requestDatabase = 'recipe';
} elseif (strtolower($sePageParameter[0]) == 'ingredient') {
    $requestDatabase = 'ingredient';

} else {
    $requestDatabase = false;
}


if (strtolower($sePageParameter[1]) == 'name') {
    $requestSeatchFor = 'name';
} elseif (strtolower($sePageParameter[1]) == 'id') {
    $requestSeatchFor = 'id';
} elseif (strtolower($sePageParameter[1]) == 'namelike') {
    $requestSeatchFor = 'namelike';
} elseif (strtolower($sePageParameter[1]) == 'user') {
    $requestSeatchFor = 'user';
} elseif (strtolower($sePageParameter[1]) == 'random') {
    $requestSeatchFor = 'random';
} else {
    $requestSeatchFor = false;
}

switch ($requestDatabase) {
    case 'produkt':
        $sePage->addContent('content', '<parse>'.htmlspecialchars(json_encode(getProduct($requestSeatchFor, $sePageParameter[3]))).'</parse>');
        ;
        break;
    case('recipe'):
        echo  htmlspecialchars_decode(json_encode(getRecipe($requestSeatchFor, $sePageParameter[3])));
        break;
    case('ingredient'):
        echo json_encode(getIngredient($requestSeatchFor, $sePageParameter[3]));
        break;
}

function getProduct($requestSeatchForm, $searchString)
{
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $rezepte = new \Package\FoodOrganizer\Controller\recipeController();
    $array = array();
    switch ($requestSeatchForm) {
        case 'name':
            $array[] = $rezepte->find(['rezept_name' => $searchString]);

            break;
        case 'namelike':
            $array[] = $rezepte->find(['rezept_name' => $searchString]);


            break;
        case 'id':
            $array[] = $rezepte->findByUserName($searchString);
            break;
        case 'user':
            $array[] =  $rezepte->findByUserName($searchString);
            break;
        case 'random':
            $array = $rezepte->findLimitSkip(1, rand(0, $rezepte->getCollectionCount()) );
            break;
    }
    $returnArray = array();

    foreach ($array as $arrayItem){
        /* @var \Package\FoodOrganizer\Models\Recipe\Recipe $arrayItem */

        $returnArray[] = $arrayItem->makeSaveable();
    }
    return $returnArray;
}

