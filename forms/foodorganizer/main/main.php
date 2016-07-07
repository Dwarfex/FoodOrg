<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 11:29
 */

$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('', true));

$sePage->setTitle('FO - Startseite');
$codeInfo = '';
try {
    $fileTime = date('d M Y H:i:s',filemtime('/var/www/seframe/public/uploads/FOImageCache/code.txt'));
    $codeInfo = nl2br(file_get_contents('/var/www/seframe/public/uploads/FOImageCache/code.txt'));
    $codeInfo = str_replace('', '&nbsp;', $codeInfo);
    //$codeInfo = str_replace('<br />', '<br /><br />', $codeInfo);
} catch (Exception $e) {
    $codeInfo = $e;
}
if ($seUser->isAuthCurrentUser()) {
    $sitehtml = '
<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-8"><div class="col-md-4">Hallo ' . $seUser->getUserLogin($seUser->isAuthCurrentUser()) . '<br/><img src="/packages/FoodOrganizer/layout/images/users/users (' . rand(1, 16) . ').png"></div></div>
<div class="col-md-2"></div>

</div>
';


    $sePage->addContent('sitehtml', $sitehtml);

}


$codeInfo ='
    
<div><pre>'.$fileTime.'<br />'.$codeInfo.'

</pre></div>
    ';
$sePage->addContent('sitehtml', $codeInfo );