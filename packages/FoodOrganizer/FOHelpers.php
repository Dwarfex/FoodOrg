<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 09.02.2016
 * Time: 14:55
 */

namespace Package\FoodOrganizer;


class FOHelpers
{
    // PHP topological sort function(http://blog.calcatraz.com/php-topological-sort-function-384)
// Author: Dan (http://www.calcatraz.com)
// Licensing: None - use it as you see fit
// Updates: http://blog.calcatraz.com/php-topological-sort-function-384
//
// Args:
//		$nodeids - an array of node ids,
//					e.g. array('paris', 'milan', 'vienna', ...);
// 		$edges - an array of directed edges,
//					e.g. array(array('paris','milan'),
//							   array('milan', 'vienna'),
//							   ...)
// Returns:
// 		topologically sorted array of node ids, or NULL if graph is
//		unsortable (i.e. contains cycles)
 private function  __construct()
{
    if(!defined('FORuns'))define('FORuns', false);
    if(!defined('FORunss'))define('FORuns', true);
}

    static function getProjektName()
    {
        return 'FoodOrganizer';
    }

    static function generateHTMLPageLayout($siteActive = '', $landingpage = false)
    {   //todo implement links as multidimensional array for automatic marking which site is active and generating html navigation snippet
        $topDirectory = self::getFOBaseDirectory();
        if (isset($_SESSION['seUserLoginId'])) $isLoggedIn = true;
        else $isLoggedIn = false;
        $html = '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          <a class="navbar-brand" href="' . $topDirectory . '/"><img src=' . FOHelpers::getLogoImage() . ' class="" alt="Cinque Terre" style="width:20px; display:inline;!important">&nbsp;&nbsp;' . FOHelpers::getProjektName() . '</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">';
        if ($isLoggedIn) $html .= '
            <li><a href="' . $topDirectory . '/">Home</a></li>
            <!--<li class="active"><a href="#">Home</a></li>-->
            <li><a href="' . $topDirectory . '/shoppinglist/">Einkaufszettel</a></li>
            <li><a href="' . $topDirectory . '/mealplanner/">Wochenplan</a></li>
            ';


        $html .= '
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rezepte<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="' . $topDirectory . '/recipes/all/">Alle Rezepte</a></li>';
        if ($isLoggedIn) $html .= '
                <li><a href="' . $topDirectory . '/recipes/mine/">Meine Rezepte</a></li>
                <li><a href="' . $topDirectory . '/recipes/myfavourites/">Meine Favouriten</a></li>
                <li><a href="' . $topDirectory . '/recipes/new/">Neues Rezept anlegen</a></li>
                <li><a href="' . $topDirectory . '/recipes/mygroup/">WG Rezepte</a></li>
                <li role="separator" class="divider"></li>
                <!--<li class="dropdown-header">Nav header</li>-->
                ';
        $html .= '
                <li><a href="' . $topDirectory . '/recipes/random/">Zufällige Rezepte</a></li>
                
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menues<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="' . $topDirectory . '/menues/all/">Alle Menues</a></li>';
        if ($isLoggedIn) $html .= '
                <li><a href="' . $topDirectory . '/menus/mine/">Meine Menues</a></li>
                <li><a href="' . $topDirectory . '/menus/myfavourites/">Meine Favouriten</a></li>
                ';
        $html .= '
              </ul>
            </li>
            ';
        if ($isLoggedIn) $html .= '
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vorrat<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="' . $topDirectory . '/menue/all/">Bestand</a></li>
                <li><a href="' . $topDirectory . '/menu/mine/">Meine Menues</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="' . $topDirectory . '/menu/myfavourites/">Meine Favouriten</a></li>

              </ul>
            </li>
            ';
        $html .= '


            <li><a href="' . $topDirectory . '/products/">Produkte</a></li>
            ';
        if ($isLoggedIn) {
            $html .= '<li><a href="' . $topDirectory . '/logout/">Logout</a></li>';
        } else {
            $html .= '<li><a href="' . $topDirectory . '/login/">Login</a></li>';
        }
        $html .= '
          </ul>
        
  <div class="form-group naviSuche">
  '.beginFormular('naviSuche',FOHelpers::getFOBaseDirectory().'/search','" class="form-inline" role="form').'
    <label for="suche" class="sr-only">Suche:</label>
    <input type="text" class="form-control" id="suche" value="Suche">
  <button type="submit" class="btn btn-default">>></button>
  '.endFormular('naviSuche').'
  </div>
  
  
  

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">';
        if ($landingpage) {
            $html .= ' <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

        <h1>' . FOHelpers::getProjektName() . '</h1>
        <p>Hier entsteht im Rahmen einer Bachelorarbeit die App mit dem Arbeitstitel:"' . FOHelpers::getProjektName() . '" </p>
        <p>
          <a class="btn btn-lg btn-primary" href="' . $topDirectory . '/dev/" role="button">DEV</a>
        </p>
      </div>';
        } else {
            $html .= '<div class="row">
            <div style="height: 80px"></div>
        </div>';
        }

        $html .= ' <!--###sitehtml###-->
         </div> <!-- /container -->';
        $html .= '<footer class="footer">
      <div class="container">
      
      
         <p class="text-muted"><a href="' . $topDirectory . '/imprint">Impressum</a>   Foodorganizer ' . date('Y') . '<!--###footer###--></p>
      </div>
    </footer>';
        return $html;
    }

    static function generateSiteSkippers($currentSite, $navigationStart = '')

    {

        if (!$navigationStart == '') {
            $navigationStart = $navigationStart . '/';
        }
        $htmlString = '';
        $htmlString .= '<div class="row">
 <div class="col-md-12 text-center"><ul class="pagination">';

        switch ($currentSite) {
            case 1:

                $htmlString .= '
                 <li class="active"><a href="' . $navigationStart . '">' . ($currentSite) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 1) . '">' . ($currentSite + 1) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 2) . '">' . ($currentSite + 2) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 3) . '">' . ($currentSite + 3) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 4) . '">' . ($currentSite + 4) . '</a></li>
                  <li><a href="' . ($currentSite + 1) . '">Weiter</a></li>
                ';

                break;
            case 2:
                $htmlString .= '
                 <li><a href="' . $navigationStart . ($currentSite - 1) . '">Zur&uuml;ck</a></li>\';
                  <li><a href="' . $navigationStart . ($currentSite - 1) . '">' . ($currentSite - 1) . '</a></li>
                  <li class="active"><a href="' . $navigationStart . ($currentSite) . '">' . $currentSite . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 1) . '">' . ($currentSite + 1) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 2) . '">' . ($currentSite + 2) . '</a></li>
                  
                  <li><a href="' . $navigationStart . ($currentSite + 1) . '">Weiter</a></li>
                ';
                break;

            default:
                $htmlString .= '
                    <li><a href="' . $navigationStart . ($currentSite - 1) . '">Zur&uuml;ck</a></li>\';
                  <li><a href="' . $navigationStart . ($currentSite - 2) . '">' . ($currentSite - 2) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite - 1) . '">' . ($currentSite - 1) . '</a></li>
                  <li class="active"><a href="' . $navigationStart . ($currentSite) . '">' . $currentSite . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 2) . '">' . ($currentSite + 1) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 3) . '">' . ($currentSite + 2) . '</a></li>
                  <li><a href="' . $navigationStart . ($currentSite + 1) . '">Weiter</a></li>
                ';
                break;


        }
        $htmlString .= '</ul></div></div>';
        return $htmlString;
    }

    static function generateStarsFromRating($recipeGetRezeptVotesGetAverage)
    {
        $stars = '';
        for ($b = 1; $b <= round($recipeGetRezeptVotesGetAverage); $b++) {
            $stars .= '<span class="glyphicon glyphicon-star"></span>';
        }
        for ($b = 1; $b <= (5 - round($recipeGetRezeptVotesGetAverage)); $b++) {
            $stars .= '<span class="glyphicon glyphicon-star-empty"></span>';
        }
        return $stars;
    }

    static function getLogoImage($icon = false)
    {
        if($icon){
            $icon ='sml';
        }else{
            $icon ='';
        }
        return '/packages/FoodOrganizer/layout/images/1455296375_Kitchen_Bolt_Line_Mix-64'.$icon.'.png';

    }
    static function getFaviconInclude(){

        return ['
        <link rel="shortcut icon" href="'.self::getLogoImage().'" type="image/png" />',
            '<link rel="icon" href="'.self::getLogoImage().'" type="image/png" />',
           ' <link rel="apple-touch-icon" href="'.self::getLogoImage(true).'"/>',
           '
    <link rel="apple-touch-icon-precomposed" href="'.self::getLogoImage(true).'"/>'];
    }

    function topological_sort($nodeids, $edges)
    {

        // initialize variables
        $L = $S = $nodes = array();

        // remove duplicate nodes
        $nodeids = array_unique($nodeids);

        // remove duplicate edges
        $hashes = array();
        foreach ($edges as $k => $e) {
            $hash = md5(serialize($e));
            if (in_array($hash, $hashes)) {
                unset($edges[$k]);
            } else {
                $hashes[] = $hash;
            };
        }

        // Build a lookup table of each node's edges
        foreach ($nodeids as $id) {
            $nodes[$id] = array('in' => array(), 'out' => array());
            foreach ($edges as $e) {
                if ($id == $e[0]) {
                    $nodes[$id]['out'][] = $e[1];
                }
                if ($id == $e[1]) {
                    $nodes[$id]['in'][] = $e[0];
                }
            }
        }

        // While we have nodes left, we pick a node with no inbound edges,
        // remove it and its edges from the graph, and add it to the end
        // of the sorted list.
        foreach ($nodes as $id => $n) {
            if (empty($n['in'])) $S[] = $id;
        }
        while (!empty($S)) {
            $L[] = $id = array_shift($S);
            foreach ($nodes[$id]['out'] as $m) {
                $nodes[$m]['in'] = array_diff($nodes[$m]['in'], array($id));
                if (empty($nodes[$m]['in'])) {
                    $S[] = $m;
                }
            }
            $nodes[$id]['out'] = array();
        }

        // Check if we have any edges left unprocessed
        foreach ($nodes as $n) {
            if (!empty($n['in']) or !empty($n['out'])) {
                return null; // not sortable as graph is cyclic
            }
        }
        return $L;
    }

    static function bootstrapContent($title, $subtitle = '')
    {
        return ' <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">' . $title . '
        <small>' . $subtitle . '</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-responsive" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-4">
            <h3>Project Description</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
            <h3>Project Details</h3>
            <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
            </ul>
        </div>

    </div>
    <!-- /.row -->';
    }
    static function getFOBaseDirectory(){
       return $topDirectory = '/foodorganizer/main';

    }

    static function getRecipeDifficulties(){
        return [
            'simpel',
            'pfiffig',
            'normal',

        ];
    }

}