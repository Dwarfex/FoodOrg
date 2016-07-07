<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 13:37
 */

$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));

$supermaerkte = array('Penney', 'Real Estat', 'Rewo', 'Lodl', 'Oldi', 'Brutto');
$produkte = array('Nudeln', 'Speck', 'Sahne','Banane','Gurke','Tomate','Toilettenpapier','Wasser','Eier');
$amount = array('1 x ','2 x ', '3 x ','4 x ', '5 x ');
$rows='';
$table='<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-condensed">';

for($i = 0; $i< 20; $i++){
    $checked='';
    if($i>20)$checked = 'checked';


    $table.='<tr style="height: 50px;">';


    $table.='<td valign="middle"><div class="checkbox">
  <label><input type="checkbox" value="checked_'.$i.'"'.$checked.'></label>
</div></td>';
    $table.='<td valign="middle">'.$supermaerkte[array_rand($supermaerkte,1)].'</td>';
    $table.='<td valign="middle">'.$amount[array_rand($amount,1)].$produkte[array_rand($produkte,1)].'</td>';
    $table.='<td valign="middle"><div><button type="button" value="loeschen_'.$i.'" class="btn btn-danger btn-xs">L&ouml;schen</button></div></td>';

    $table.='</tr>';
}
$table.='</table>
</div>';
$sitehtml='
<div class="row">
<div class="col-md-12"><h2>Einkaufszettel - Demo</h2></div>
<div class="col-md-12"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalNewEntry">Neuer Eintrag</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default btn-sm">Einträge aus Wochenplan generieren</button><br/><br/></div>
</div>

';
$sitehtml.=$table;

$sePage->addContent('sitehtml',$sitehtml);

$sePage->addContent('sitehtml',$rows);


$supermarktOptions='';
foreach($supermaerkte as $markt){
    $supermarktOptions.='<option>'.$markt.'</option>';
}
$modalNewEntry='
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalNewEntry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Neuer Eintrag</h4>
      </div>
      <div class="modal-body">
         <div class="form-group">
          <label for="supermarkt">Supermarkt:</label>
          <select class="form-control" id="supermarkt">
            '.$supermarktOptions.'
          </select>
           <label for="product">Produkt:</label>
            <input type="text" class="form-control" value="Hier wird autovervollständigt..." id="product">
            <label for="count">Anzahl:</label>
          <select class="form-control" id="count">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>15</option>
            <option>20</option>

          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Speichern</button>
      </div>
    </div>
  </div>
</div>
';
$sePage->addContent('sitehtml', $modalNewEntry);
