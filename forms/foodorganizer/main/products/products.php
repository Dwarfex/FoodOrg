<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 15:05
 */
seEnableParameters(1);
$showPerPage = 30;
if (!isset($sePageParameter[0])) {

    $currentSite = 1;
    $skip = $currentSite -1 ;
}else{
    $currentSite = (int) $sePageParameter[0];
    if($currentSite < 1)$currentSite = 1;
    $skip = ($currentSite -1) * $showPerPage ;


}

$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->setTitle('FO - Produktübersicht Seite: '.$currentSite);
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>Alle Produkte</h1></div></div>
            <div class="row">';
$sitehtml.='<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-condensed">';

$productController = new \Package\FoodOrganizer\Controller\productController();
$result = $productController->findLimitSkip($showPerPage,$skip);

$schleife ='';
foreach ($result as $product){
    /* @var \Package\FoodOrganizer\Models\Product $product */



    $schleife.='<tr>';

    $schleife.='<td><img class="img-responsive" src="'.$product->getImageUrl().'" alt=""></td>';
    $schleife.='<td><h4>'.$product->getTitle().'</h4>'.'Marke: '.$product->getBrand().br().'Hersteller: '.$product->getManufacturer().br()
    .$product->getEnergykcal().' kcal / '.$product->getEnergykj().' kj'.br().'EAN:'.$product->getEan().'
    </td>';
    $schleife.='<td>'.$product->getBrand().br().$product->getManufacturer().'</td>';
    $schleife.='<td><a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/products/details/'.$product->getId().'/'.$product->getTitle().'"><button type="button" value="details_'.$product->getId().'" class="btn btn-default btn-xs">Details</button></a></td>';

    $schleife.='</tr>';
}
$schleife.='</table>';


$sitehtml .=$schleife.'</div></div></div>';
$sitehtml.= \Package\FoodOrganizer\FOHelpers::generateSiteSkippers($currentSite);
$sitehtml .='</div></div></div>';
$sePage->addContent('sitehtml',$sitehtml);