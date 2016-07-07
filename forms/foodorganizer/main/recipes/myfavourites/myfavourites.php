<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 15:05
 */

$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sitehtml='<div class="row"><div class="col-md-12"><h1>Meine Favouriten</h1></div></div>
            <div class="row">';

$count = 5;
$starArray = array();
for($i = 0; $i< $count; $i++) {
    $starArray[$i] = rand(1,5);
}
for($i = 0; $i< $count; $i++){






    $sitehtml.='<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"><a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/" ><h4>Random Rezept ABC</h4></a><a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/" ><img class="img-responsive img-rounded" src="http://placehold.it/350x150" alt=""></a>';
    $sitehtml.='<br/>User xyZ</a> <br/>Bewertung:';

//    $emtpyStars = 5 - $starsOutOfFive;
    $test = '';
    for ($b = 1; $b <= $starArray[$i]; $b++) {
        $test.='<span class="glyphicon glyphicon-star"></span>';
    }
    for ($b = 1; $b <= (5-$starArray[$i]); $b++) {
        $test.='<span class="glyphicon glyphicon-star-empty"></span>';
    }
    $sitehtml.=$test.'<br/>';

//    $sitehtml.='<span class="glyphicon glyphicon-star"></span>
//    ';
//        $sitehtml.='<span class="glyphicon glyphicon-star-empty"></span>
//    ';



    $sitehtml.='';
    $sitehtml.='<a href="'.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/recipes/details/"><button type="button" value="details_'.$i.'" class="btn btn-default btn-xs">Details</button></a><br/><br/>';

    $sitehtml.='</div>';
}



$sitehtml .=' </div>';
$sitehtml.=' <div class="row">
 <div class="col-md-12 text-center"><ul class="pagination">
  <li><a href="#">Zurück</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">Weiter</a></li>
</ul>
</div></div>';
$sePage->addContent('sitehtml',$sitehtml);