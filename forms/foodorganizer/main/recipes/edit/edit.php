<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 20:54
 */
seEnableParameters(2);
$sitehtml = '';
if (!isset($sePageParameter[0])) {
    //wrong or none recipe id >>>goto overview
    navigate('' . \Package\FoodOrganizer\FOHelpers::getFOBaseDirectory() . '/recipes/');
} else {
    //parse data from domain to string to compare with ID from database
    $requestedId = (string)$sePageParameter[0];
}


$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('', false));
$sePage->includeJavascript('FoodOrganizer/layout/js/denyEnterForForm.js ');
$sePage->setTitle('FO - Rezept bearbeiten');

$recipeController = new \Package\FoodOrganizer\Controller\recipeController();
//get recipe from database
$recipe = $recipeController->findById($requestedId);

/* @var $recipe \Package\FoodOrganizer\Models\Recipe\Recipe */

//check if user is allowed to edit - if not >>> goto view details page of recipe
if ($seUser->isCurrentUserAdmin() || ($recipe->getRezeptUserId() == $seUser->isAuthCurrentUser())) {
    $allowEdit = true;
} else {
    $allowEdit = false;
}
if (!$allowEdit) navigate(\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory() . 'recipes/details/' . $recipe->getRezeptId() . '/' . $recipe->getRezeptDatum());
$post = '';
if ((count($_POST) > 0) && $allowEdit) {

    $recipe->updateFromPOSTData($_POST);
    if (se::isClicked('save')) {

        //todo : save here
        var_dump($recipeController->save($recipe));


        navigate(\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory() . '/recipes/details/' . $recipe->getRezeptId() . '/' . $recipe->getRezeptDatum());


    } elseif (se::isClicked('abort')) {
        navigate(\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory() . '/recipes/details/' . $recipe->getRezeptId() . '/' . $recipe->getRezeptDatum());

    } elseif (se::isClicked('delete')) {
        //todo :delete here

        navigate(\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory() . '/recipes/all/');

    }


    //user edited something in the recipe >>> do work here
}

//Page Layout beginning

$sitehtmlForm = '

<div class="panel panel-default">
    <div class="panel-heading"><h2>Rezept Bearbeiten</h2></div>
    
    <div class="panel-body">
    <div class="row">
   <!--BeginForm Here-->
  
   ' . beginFormular('editRecipe', \Package\FoodOrganizer\FOHelpers::getFOBaseDirectory() . '/recipes/edit/' . $recipe->getRezeptId() . '/' . $recipe->getRezeptDatum(), '" class="form-horizontal" role="form" data-toggle="validator') . '
   
  <div class="form-group">
    <label class="control-label col-sm-2" for="rezept_name"  >Rezepttitel:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="rezept_name" id="rezept_name" placeholder="Gib einen Namen / Titel für dein Rezept ein" value="' . $recipe->getRezeptName() . '" required><br/>
      <!--<span class="help-block">This is some help text...</span>-->
    </div>
    <div class="col-sm-1"></div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="rezept_name2">Untertitel:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"  name="rezept_name2" id="rezept_name2" placeholder="Gibt einen Untertitel für dein Rezept ein" value="' . $recipe->getRezeptName2() . '">
      <span class="help-block">(Eine zweite, beschreibende Überschrift für dein Rezept)</span>
    </div>
    <div class="col-sm-1"></div>
  </div>
  
  
   <div class="form-group">
   <label class="control-label col-sm-2" for="rezept_portionen">Portionen:</label>
   <div class="col-sm-9">
      
          <select name="rezept_portionen" class="form-control" id="rezept_portionen">';
for ($i = 1; $i < 20; $i++) {
    if ($i == $recipe->getRezeptPortionen()) {
        $sitehtmlForm .= '<option selected value ="' . $i . '">' . $i . ' Portion</option>';
    } else {
        $sitehtmlForm .= '<option value ="' . $i . '">' . $i . ' Portion</option>';
    }

}
$sitehtmlForm .= '
            
      </select><br/>
      <div class="col-sm-1"></div>
      </div>
  </div>';

$sitehtmlForm .= '
<div class="form-group">
   <label class="control-label col-sm-2" name="rezept_schwierigkeit" for="rezept_schwierigkeit">Schwierigkeit:</label>
   <div class="col-sm-9">
            <select class="form-control" id="rezept_schwierigkeit">';
foreach (\Package\FoodOrganizer\FOHelpers::getRecipeDifficulties() as $i) {
    if ($i == $recipe->getRezeptSchwierigkeit()) {
        $sitehtmlForm .= '<option selected value ="' . $i . '">' . $i . '</option>';
    } else {
        $sitehtmlForm .= '<option value ="' . $i . '">' . $i . '</option>';
    }

}
$sitehtmlForm .= '
            
      </select><br/>
      <div class="col-sm-1"></div>
      </div>
  </div>';


$sitehtmlForm .= '

 <div class="form-group">
    <label class="control-label col-sm-2" for="rezept_tags">Tags:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="rezept_tags" id="rezept_tags" placeholder="Gib Tags für dein Rezept ein" value="' . $recipe->getRezeptTagsAsString() . '">
      <span class="help-block">Trenne die Tags mit einem Komma Beispiel: Hauptspeise, Vegan, Gesund</span>
    </div>
    <div class="col-sm-1"></div>
  </div>';
// hier beginnt das step layout
foreach ($recipe->getRezeptZubereitungsStep() as $key => $step) {
    /* @var \Package\FoodOrganizer\Models\Recipe\rezeptZubereitungsStep $step */
    $sitehtmlForm .= '
<div class="clearfix"></div>
<hr>
 <div class="form-group">
    <label class="control-label col-sm-2" for="rezept_step[' . $key . '][zubereitung]">Schritt: ' . ($key + 1) . '</label>
    ';
    if ($key > 0) {
        $sitehtmlForm .= '<div class="col-sm-8">
      <textarea class="form-control" rows="' . intval(substr_count($step->getZubereitung(), "\n") * 2.2) . '" name="rezept_step[' . $key . '][zubereitung]" id="rezept_step[' . $key . '][zubereitung]">' . $step->getZubereitung() . '</textarea>
      <br/>
    </div><div class="col-sm-1">
    <button onclick="submit()" name="delStep" value="' . $key . '" class="btn btn-danger btn-block col-sm-1"><span class="glyphicon glyphicon-remove-sign"></span>
      </button>
    </div>';
    } else {
        $sitehtmlForm .= '<div class="col-sm-9">
      <textarea class="form-control" rows="' . intval(substr_count($step->getZubereitung(), "\n") * 2.2) . '" name="rezept_step[' . $key . '][zubereitung]" id="rezept_step[' . $key . '][zubereitung]">' . $step->getZubereitung() . '</textarea>
      <br/>
    </div>';
    }

    $sitehtmlForm .= '<div class="col-sm-1"></div>
  </div>';

    ///////////////////////////////
    $sitehtmlForm .= '<div class="form-group">
<label class="control-label col-sm-2" for="rezept_step[' . $key . '][zubereitungsZeit]">Schrittdauer:</label>
<div class="col-sm-4">
        <input type="number" class="form-control"  name="rezept_step[' . $key . '][zubereitungsZeit]" id="rezept_step[' . $key . '][zubereitungsZeit]" placeholder="30" value ="' . $step->getZubereitungsZeit() . '" >
       </div>
              <label class="control-label col-sm-2" for="rezept_step[' . $key . '][zubereitungsZeit]">in Minuten</label>
    <div class="col-sm-4"></div>
    </div><br /><br /><br />';
    ////////////////////////////////////////////////////////////////+
    $sitehtmlForm .= '

 <div class="form-group">
    <label class="control-label col-sm-2" for="rezept_step[' . $key . '][warten]">Pause: ' . ($key + 1) . '</label>';
    if ($key > 0) {
        $sitehtmlForm .= '<div class="col-sm-8">
      <textarea class="form-control" rows="' . intval(substr_count($step->getZubereitung(), "\n") * 2.2) . '" name="rezept_step[' . $key . '][warten]" id="rezept_step[' . $key . '][warten]" placeholder="z.B.: Stelle den Kuchen nun für 30 Min in den Kühlschrank">' . $step->getWarten() . '</textarea>
      <br/>
    </div><div class="col-sm-1">
    <button onclick="submit()" name="delStep" value="' . $key . '" class="btn btn-danger btn-block col-sm-1"><span class="glyphicon glyphicon-remove-sign"></span>
      </button>
    </div>';
    } else {
        $sitehtmlForm .= '<div class="col-sm-9">
      <textarea class="form-control" rows="' . intval(substr_count($step->getZubereitung(), "\n") * 2.2) . '" name="rezept_step[' . $key . '][warten]" id="rezept_step[' . $key . '][warten]" placeholder="z.B.: Stelle den Kuchen nun für 30 Min in den Kühlschrank">' . $step->getWarten() . '</textarea>
      <br/>
    </div>';
    }

    $sitehtmlForm .= '<div class="col-sm-1"></div>
  </div>';


    ////////////////////////////////////////////////////////////////
    $sitehtmlForm .= '<div class="form-group">
<label class="control-label col-sm-2" for="rezept_step[' . $key . '][warteZeit]">Dauer der Pause:</label>
<div class="col-sm-4">
        <input type="number" class="form-control"  name="rezept_step[' . $key . '][warteZeit]" id="rezept_step[' . $key . '][warteZeit]" placeholder="30" value ="' . $step->getWarteZeit() . '" >
       </div>
              <label class="control-label col-sm-2" for="rezept_step[' . $key . '][warteZeit]">in Minuten</label>
    <div class="col-sm-4"></div>
    </div><br /><br /><br />';
    ////////////////////////////////////

    foreach ($step->getZutaten() as $zutatNR => $zutat) {
        /* @var \Package\FoodOrganizer\Models\Recipe\zutat $zutat */
        $sitehtmlForm .= '
        
        <div class="form-group">
              <label class="control-label col-sm-2" for="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_name]" >Zutat (' . ($zutatNR + 1) . '):</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" name="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_name]" id="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_name]" value ="' . $zutat->getName() . '" >
              </div>
              <div class="col-sm-1">
              <label for="zutat_menge__' . $zutatNR . '">Menge:</label>
              </div>
              <div class="col-sm-2">
              <input type="number" step="0.1" class="form-control"  name="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_menge]" id="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_menge]" placeholder="500" value ="' . $zutat->getMenge() . '" >
              
              </div>
              <div class="col-sm-1">
              <input type="text" class="form-control" name="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_einheit]" id="rezept_step[' . $key . '][zutaten][' . $zutatNR . '][zutat_einheit]" placeholder="g / EL / Glas" value ="' . $zutat->getEinheit() . '">
              
              </div>
              <div class="col-sm-1">
              <button onclick="submit()" name="del[' . $key . '][' . $zutatNR . ']" value="[' . $key . '][' . $zutatNR . ']" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove-sign"></span>
      </button>
              </div>
              <div class="col-sm-1">
              
              
              </div>
              
              
        </div><br/>';


    }
    $sitehtmlForm .= '
    <div class="form-group">
    <div class="col-sm-1"></div>
    <label class="control-label col-sm-2" for="rezept_step_new">Neue Zutat hinzufügen</label>
    <div class="col-sm-2">
      <button onclick="submit()" name="neueZutat" value="' . $key . '" class="btn btn-success btn-block">
           <span class="glyphicon glyphicon-plus-sign"></span>
      </button>
      
    </div>
    <div class="col-sm-7"></div>
    </div>';


}
//ende step layout

$sitehtmlForm .= '
<div class="clearfix"></div>
<hr>
 <div class="form-group">
 <div class="col-sm-1"></div>
    <label class="control-label col-sm-2" for="rezept_step_new">Neuen Schritt hinzufügen</label>
    <div class="col-sm-2">
      <button onclick="submit()" name="neuerStep" class="btn btn-success btn-block">
           <span class="glyphicon glyphicon-plus-sign"></span>
      </button>
      
    </div>
    <div class="col-sm-7"></div>
    
  </div>';


$sitehtmlForm .= '
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-2">
    <div class="col-xs-12"><br/><br/></div>
    <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Speichern</button>
    
     
    </div>
    <div class=" col-sm-2">
    <div class="col-xs-12"><br/><br/></div>
     <button type="submit" name="abort" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Abbrechen</button>
    </div>
    <div class="col-sm-offset-4 col-sm-2 col-xs-6">
    
        <div class="col-xs-12"><br/><br/></div>
      <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Löschen</button>
    </div>
  </div>
  
  ' . endFormular('editRecipe') . ' 
   
  
  <!--EndFormHere-->
  </div></div>

</div>
  

';

$sePage->addContent('sitehtml', $sitehtml);


$sePage->addContent('sitehtml', $sitehtmlForm);
