<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 15:05
 */
seEnableParameters(2);
//  userid/username/
if (!isset($sePageParameter[0])) {
    $requestedUserID =null;
}else{
    $requestedUserID = (string)$sePageParameter[0];

}
if (!isset($sePageParameter[1])) {
    $requestedUserName =null;
}else{
    $requestedUserName = (string)$sePageParameter[1];

}
$recipeController = new \Package\FoodOrganizer\Controller\recipeController();
$userRecipies = $recipeController->findByUserId($requestedUserID, ['sort' => ['rezept_votes' => -1]]);
foreach ($userRecipies as $userRecipe){
    /* @var \Package\FoodOrganizer\Models\Recipe\Recipe $userRecipe */
    $requestedUserName= $userRecipe->getRezeptUserName();
}
if($requestedUserName==null)navigate(\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/404');



$sePage->setTitle('FO User: '.$requestedUserName);
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>User: '.$requestedUserName.'</h1></div></div>
            <div class="row">';
$sitehtml.='<h4>Rezepte:</h4>';
$sitehtml.='<ul>';
foreach ($userRecipies as $userRecipy){
    /* @var \Package\FoodOrganizer\Models\Recipe\Recipe $userRecipy */

   $sitehtml.= '<li><a href ="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/'.$userRecipy->getRezeptId().'/'.$userRecipy->getRezeptDatum().'">'.$userRecipy->getRezeptName().'</a><br/>';
   $sitehtml.= \Package\FoodOrganizer\FOHelpers::generateStarsFromRating($userRecipy->getRezeptVotes()->getAverage()).'</li>';

}
$sitehtml.='</ul>';


$sitehtml .=' </div>';

$sePage->addContent('sitehtml',$sitehtml);