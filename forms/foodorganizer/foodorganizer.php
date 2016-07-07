<?php
/**
 * Created by PhpStorm.
 * User: Listener
 * Date: 07.01.2016
 * Time: 19:09
 */
$se02Metainformation['foodorganizer']['version'] = '0.0.1';
$se02Metainformation['foodorganizer']['author'] = 'Dwarfex';
$se02Metainformation['foodorganizer']['status'] = 'experimental';
$se02Metainformation['foodorganizer']['documentation']['information'] = 'adding content';
$title = 'Foodorganizer';
$sePage->setTitle($title);
//$sePage->includeCss('vts/style/css/elements.css');
//$sePage->includeCss('vts/style/css/fonts.css');
//$sePage->includeCss('vts/style/css/reset.css');
//$sePage->includeCss('vts/style/css/style.css');

$sePage->loadJSHeader('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css');
//$seMeta['id'] = 1;
//$sePage->addContent('content', beginFormular('test') . inputButton('Test', $seMeta) . endFormular('test'));


$dataSet = array();
$dataSet[] = array(
    'snippetContent'=>"A",
    'dependsOn'=>null,
    'productionTime'=>25,
    'waitTime'=>30,
    'waitTimeDescription'=>'Kuehlschrank');
$dataSet[] = array('snippetContent'=>"B",'dependsOn'=>array(0),'productionTime'=>5, 'waitTime'=>0, 'waitTimeDescription'=>null);
$dataSet[] = array('snippetContent'=>"C ",'dependsOn'=>null,'productionTime'=>15, 'waitTime'=>0, 'waitTimeDescription'=>null);
$dataSet[] = array('snippetContent'=>"D",'dependsOn'=>array(1,2),'productionTime'=>2, 'waitTime'=>5, 'waitTimeDescription'=>'abkuehlen lassen');


$productionTime = 0;
$waittime = 0;
echo se::arrayToULList($dataSet);
$topSort = new Package\FoodOrganizer\FOHelpers();
echo se::arrayToULList($topSort->topological_sort(array('A','B','C','D','E'), array(array('A','B'),array('B','D'),array('C','D'))));

$seStandardWebPart->loadFromFile('FoodOrganizer/webparts/index.html');




$sePage->addContent('contentConatiner', 'KARL');
$sePage->addContent('content', $seStandardWebPart->publish());