<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 15:05
 */
seEnableParameters(1);
$showPerPage = 32;
if (!isset($sePageParameter[0])) {

    $currentSite = 1;
    $skip = $currentSite -1 ;
}else{
    $currentSite = (int) $sePageParameter[0];
    if($currentSite < 1)$currentSite = 1;
    $skip = ($currentSite -1) * $showPerPage ;


}
$sePage->setTitle('FO - Menueübersicht Seite: '.$currentSite);
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeCss('bootstrap-3.3.4/css/bootstrapAdditional.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>Alle Rezepte</h1></div></div>
    <div class="row"><div class="row-height">
             ';



$recipeController = new \Package\FoodOrganizer\Controller\recipeController();

$result = $recipeController->findLimitSkip($showPerPage,$skip);
//print_r($result);



$count = $showPerPage;


$i=0;
foreach($result as $recipe){

    /* @var \Package\FoodOrganizer\Models\Recipe\Recipe $recipe */
    $recipeImageArray = $recipe->getRezeptBilder();
    /* @var \Package\FoodOrganizer\Models\Recipe\rezeptBild $recipeImage*/
    $recipeImage = $recipeImageArray[0];









    // foreach ($result as $recipe){





    $sitehtml.='<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="height: 320px; overflow: hidden">
<a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/'.$recipe->getRezeptId().'/'.$recipe->getRezeptDatum().'" >
<h4>'.$recipe->getRezeptName().'</h4>'.$recipe->getRezeptName2().'</a>
<a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/'.$recipe->getRezeptId().'/'.$recipe->getRezeptDatum().'" ><img class="img-responsive img-rounded rezeptVorschauBild" src="'.$recipeImage->getSmallImage().'" alt=""></a>';
    $sitehtml.='<br/>User:'.$recipe->getRezeptUserName().'<br/>Bewertung:';

//    $emtpyStars = 5 - $starsOutOfFive;
    $test = '';
    for ($b = 1; $b <=  round($recipe->getRezeptVotes()->getAverage()); $b++) {
        $test.='<span class="glyphicon glyphicon-star"></span>';
    }
    for ($b = 1; $b <= (5-round($recipe->getRezeptVotes()->getAverage())); $b++) {
        $test.='<span class="glyphicon glyphicon-star-empty"></span>';
    }
    $sitehtml.=$test.'<br/>';

//    $sitehtml.='<span class="glyphicon glyphicon-star"></span>
//    ';
//        $sitehtml.='<span class="glyphicon glyphicon-star-empty"></span>
//    ';



    $sitehtml.='';

    $sitehtml.='<a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/'.$recipe->getRezeptId().'/'.$recipe->getRezeptDatum().'"><button type="button" value="details_'.$recipe->getRezeptId().'" class="btn btn-default btn-xs">Details</button></a><br/><br/>';

    $sitehtml.='</div>';


}



$sitehtml .=' </div></div></div>';
$sitehtml.= \Package\FoodOrganizer\FOHelpers::generateSiteSkippers($currentSite, ''.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/all');
$sePage->addContent('sitehtml',$sitehtml);