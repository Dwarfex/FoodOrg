<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 20:54
 */
seEnableParameters(2);
if (!isset($sePageParameter[0])) {

    navigate(''.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/');
} else {
    $requestedId = (string)$sePageParameter[0];
}
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('', false));
$sitehtml = '';

//go find the recipe by id
$recipeController = new \Package\FoodOrganizer\Controller\recipeController();
$recipe = $recipeController->findById($requestedId);

//Navigate to recipe overview if is not a valid recipe
if(!$recipe->isValidRecipe()) navigate(''.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/');

$sePage->setTitle('FO Rezept: '.$recipe->getRezeptName());

//if($seUser->isCurrentUserAdmin() || ($recipe->getRezeptUserId()==$seUser->isAuthCurrentUser())){
if($seUser->isCurrentUserAdmin() || ($recipe->getRezeptUserId()===$seUser->isAuthCurrentUser())){
    $editInterface  ='<a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/edit/'.$recipe->getRezeptId().'/'.$recipe->getRezeptDatum().'" ><h5>Rezept bearbeiten</h5></a>';
}else{
    $editInterface ='';
}
$zutaten = '';
$rezeptSchritte = '';
$recipeImageArray = $recipe->getRezeptBilder();
/* @var \Package\FoodOrganizer\Models\Recipe\rezeptBild $recipeImage */
$imageMaxIndex = count($recipeImageArray);
$imageIndex = 0;
$imageIndex = rand(0, (count($recipeImageArray) - 1));
$recipeImage = $recipeImageArray[$imageIndex];
$stepCounter = 0;
foreach ($recipe->getRezeptZubereitungsStep() as $step) {
    $stepCounter++;
    /* @var \Package\FoodOrganizer\Models\Recipe\rezeptZubereitungsStep $step */


    foreach ($step->getZutaten() as $zutat) {
        /* @var \Package\FoodOrganizer\Models\Recipe\zutat $zutat */
        if ($zutat->getMenge() != 0) {
            $zutatMenge = $zutat->getMenge() . ' ';
        } else {
            $zutatMenge = '';
        }

        $zutaten .= $zutatMenge . $zutat->getEinheit() . ' ' . $zutat->getName() . '<br/>';


    }

    if ($step->getWarteZeit() > 0) {
        $stunden = round($step->getWarteZeit() / 60);
        $minuten = $step->getWarteZeit() % 60;
        if ($stunden > 0) {
            if($stunden ==1){
                $stunden = $stunden . ' Stunde';
            }else{
                $stunden = $stunden . ' Stunden';
            }

            if ($stunden > 4) $stunden = 'etwa ' . $stunden;

        } else {
            $stunden = '';
        }
        if ($minuten > 0) {

            $minuten = $minuten . ' Minuten';
        } else {
            $minuten = '';
        }
        if (($stunden != '') && ($minuten != '')) {
            $und = ' und ';
        } else {
            $und = '';
        }

        $hinweisWarteZeit = '<h4>
        Dieser Schritt enthält eine Unterbrechung von ' . $stunden . $und . $minuten . '
        <br>
      </h4>';
    } else {
        $hinweisWarteZeit = '';
    }

    $rezeptSchritte .= '
    <h3>
    ' . $stepCounter . '. Schritt - '.$step->getZubereitungsZeit().' Minuten
    <br>
      </h3>
      ' . $hinweisWarteZeit . '
      <div>' . nl2br($step->getZubereitung()) . '
    <hr>
    ' . nl2br($step->getWarten()) . '
    
        
      </div>
      
      <hr>';

}


$sitehtml = '<div class="page-header">
        <h2>
          ' . $recipe->getRezeptName() . '
          </h2><h4>
          ' . $recipe->getRezeptName2() . '
        </h4>
        '.$editInterface.'
      </div>
      <table class="table">
        <tbody>
          <tr>
            <td>
              <h4>
                Dauer: ' . ($recipe->getRezeptCookingTime() + $recipe->getRezeptRestingTime()) . ' Minuten
                <br>
              </h4>
              <h4>
                davon Zubereitung: ' . $recipe->getRezeptCookingTime() . ' Minuten
                <br>
              </h4>
              <h4>
                davon Restingtime:' . $recipe->getRezeptRestingTime() . ' Minuten
                <br>
              </h4>
              
              Zutaten:
              <br>
              <br>
              <br>
              ' . $zutaten . '
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
            </td>
            <td>
              <a href="'.$recipe->getRezeptUserNameLink().'">' . $recipe->getRezeptUserName() . '</a>
            </td>
            <td>
              <img class="rezeptBigBild" src="' . $recipeImage->getBigImage() . '">
              <br>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <tbody>
          <tr>
          </tr>
        </tbody>
      </table>' .
    $rezeptSchritte;


$sitehtml .= br() . br() . br() . br() . br() . br() . br() . br();

//todo check array Copy

$sePage->addContent('sitehtml', $sitehtml);

$sePage->addContent('sitehtml',se::arrayToULList($recipe->makeSaveable()));
