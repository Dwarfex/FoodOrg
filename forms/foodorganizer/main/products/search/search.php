<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 29.04.2016
 * Time: 16:45
 */





seEnableParameters(2);
$showPerPage = 30;
if (!isset($sePageParameter[0])||!(isset($sePageParameter[1]))) {

    $searchField = 'ean';

    $searchString = '';


}else{
    $searchField='ean';
    $searchString =(string) $sePageParameter[1];
    //todo: validate $searchstring for valid $searchfield (e.g.: eantype)


}
$productController = new \Package\FoodOrganizer\Controller\productController();
$result = $productController->findByEAN($searchString);


$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>Alle Produkte</h1></div></div>
            <div class="row">';
$sitehtml.='<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-condensed">';



//print_r($result);

foreach ($result as $product){
    /* @var \Package\FoodOrganizer\Models\Product $product */



    $sitehtml.='<tr>';


    $sitehtml.='<td><img class="img-responsive" src="'.$product->getImageUrl().'" alt=""></td>
</div></td>';
    $sitehtml.='<td>'.$product->getTitle().'</td>';
    $sitehtml.='<td>'.$product->getBrand().'/'.$product->getManufacturer().'</td>';
    $sitehtml.='<td><a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/products/details/'.$product->getId().'/'.$product->getTitle().''.'"><button type="button" value="details_'.$product->getId().'" class="btn btn-default btn-xs">Details</button></a></td>';

    $sitehtml.='</tr>';
}
$sitehtml.='</table>';


$sitehtml .=' </div>';
//$sitehtml.= \Package\FoodOrganizer\FOHelpers::generateSiteSkippers($currentSite);
$sePage->addContent('sitehtml',$sitehtml);
