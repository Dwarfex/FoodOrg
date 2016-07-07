<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 15:05
 */
seEnableParameters(2);
if (!isset($sePageParameter[0])) {
    navigate(''.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/products/');
}else{
    $requestedId = (string)$sePageParameter[0];
}

$productController = new \Package\FoodOrganizer\Controller\productController();

$result = $productController->findById($requestedId);

$sePage->setTitle('FO - Produktdetails: '.$result->getTitle());
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>'.$result->getTitle().'</h1></div></div>
            <div class="row">';
$sitehtml .='<div class="col-md-4"><img class="img-responsive" src="'.$result->getImageUrl(true).'" alt="'.$result->getTitle().'-Produktabbildung"></div><div class="col-md-8">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#naehrwertangaben">N&auml;hrwertangaben</a></li>
  <li><a data-toggle="tab" href="#allergie">Allergie</a></li>
  <li><a data-toggle="tab" href="#ernaehrung">Ern&auml;hrung</a></li>
  <li><a data-toggle="tab" href="#siegel">Test und Qualit&auml;tssiegel</a></li>
</ul>

<div class="tab-content">
  <div id="naehrwertangaben" class="tab-pane fade in active">
    <table class="table table-striped table-bordered table-hover table-condensed">
    <tr><th>N&auml;hrwert</th><th>pro 100 '.$result->getBasicUnit().'</th><th>Tagesbedarf: 2000 kcal</th></tr>
    <tr><td>Eiwei&szlig;:</td><td>'.$result->getEiweiss().' g</td><td>'.number_format($result->getEiweissDaily(), 1).'%</td></tr>
    <tr><td>Kohlenhydrate:</td><td>'.$result->getKohlenhydrate().' g</td><td>'.number_format($result->getKohlenhydrateDaily(), 1).'%</td></tr>
    <tr><td>- davon Zucker:</td><td>'.$result->getZucker().' g</td><td>'.number_format($result->getZuckerDaily(), 1).'%</td></tr>
    <tr><td>Fett:</td><td>'.$result->getFett().' g</td><td>'.number_format($result->getFettDaily(), 1).'%</td></tr>
    <tr><td>- davon gesättigt:</td><td>'.$result->getGesaettigteFettsaeuren().' g</td><td>'.number_format($result->getGesaettigteFettsaeurenDaily(), 1).'%</td></tr>
    <tr><td>Ballaststoffe:</td><td>'.$result->getBallaststoffe().' g</td><td>'.number_format($result->getBallaststoffeDaily(), 1).'%</td></tr>
    <tr><td>Natrium:</td><td>'.$result->getNatrium().' g</td><td>'.number_format($result->getNatriumDaily(), 1).'%</td></tr>
    <tr><td>Energie:</td><td>'.$result->getEnergykcal().' kcal / '.$result->getEnergykj().' kJ</td><td>'.number_format(round(($result->getEnergykcal()/$result->getDailyKcal())*100, 1), 1) .'%</td></tr>
  
    </table>
    
  </div>
  <div id="allergie" class="tab-pane fade">
   
   <div class="row"> ';
$allergieArray=array();
$allergieArray = [9,10,11,12,13,14,15,16,17,18];

foreach ($allergieArray as $allergieEintrag){

    $sitehtml.='<div class="col-md-4"><img class="img-responsive" src="/packages/FoodOrganizer/layout/images/produkte/allergie/ic_nutrition_'.$allergieEintrag.'_0.gif" alt="Abbildung"></div>';

}

$sitehtml .='
    </div>
  </div>
  <div id="ernaehrung" class="tab-pane fade">
    <div class="row"> ';
$ernaehrungArray=array();
$ernaehrungArray = [1,2,3,4,5,6,7,8];

foreach ($ernaehrungArray as $ernaehrungEintrag){

    $sitehtml.='<div class="col-md-4"><img class="img-responsive" src="/packages/FoodOrganizer/layout/images/produkte/ernaehrung/ic_nutrition_'.$ernaehrungEintrag.'_0.gif" alt="Abbildung"></div>';

}

$sitehtml .='
    </div>
  </div>
  <div id="siegel" class="tab-pane fade">
    <h5>Zu Zeit keine Test und Qualit&auml;tssiegel verfügbar</h5>
    
  </div>
</div></div></div>';


$sitehtml.='<div class="col-md-6"><h3>Hersteller:</h3><br>'.$result->getManufacturer().'</div>';
$sitehtml.='<div class="col-md-6"><h3>Kategorie:</h3><br>&nbsp;</div>';
$sitehtml.='<div class="col-md-6"><h3>Marke:</h3><br>'.$result->getBrand().'</div>';
$sitehtml.='<div class="col-md-6"><h3>Inhalt / Verpackungsgröße:</h3><br>'.$result->getContent().'</div>';
$sitehtml.='<div class="col-md-6"><h3>Produkt:</h3><br>'.$result->getProduct().'</div>';
$sitehtml.='<div class="col-md-6"><h3>Verpackungsmaterial:</h3><br>'.$result->getPackaging().'</div>';
$sitehtml.='<div class="col-md-6"><h3>Zusatz:</h3><br>'.$result->getAdditionalInfo().'</div>';
$sitehtml.='<div class="col-md-6"><h3>EAN-Code:</h3><br>'.$result->getEan().'</div>';
$sitehtml.='<div class="col-md-12"><h3>Alkoholgehalt (in Vol. %):</h3><br>'.$result->getAlcohol().'</div>';
$sitehtml.='<div class="col-md-12"><h3>Beschreibung:</h3><br>'.$result->getDescription().'</div>';
$sitehtml.='<div class="col-md-12"><h3>Zutaten / Inhaltsstoffe:</h3><br>'.$result->getIngredients().'</div>';
$sitehtml.='<div class="col-md-12"><h3>Vitamine / Mineralstoffe:</h3><br>'.$result->getVitamins().'</div>';
$enummern ='<ul>';
foreach ($result->getEnumbers() as $enumber){
    /* @var $enumber \Package\FoodOrganizer\Models\enumber */
    $enummern.= '<li>'. $enumber->getEnumber().' - '.$enumber->getName().'</li>';
}
$enummern.='</ul>';



$sitehtml.='<div class="col-md-12"><h3>E-Nummern</h3><br>'.$enummern.'</div>';
$sePage->addContent('sitehtml',$sitehtml);


/// debug
$sitehtml.='<div class="col-md-12"><div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-condensed">';




    $sitehtml.='<tr>';


    $sitehtml.='<td><img class="img-responsive" src="'.$result->getImageUrl().'" alt="'.$result->getTitle().'-Produktabbildung"></td>
</div></td>';
    $sitehtml.='<td>'.$result->getTitle().'</td>';
    $sitehtml.='<td>HierStehtDerHersteller GmbH</td>';

    $sitehtml.='</tr>';
    $sitehtml.='<tr><td>'.se::arrayToULList($result->makeSaveable()).'</td></tr>';
$sitehtml.='</table>';


$sitehtml .=' </div>';

