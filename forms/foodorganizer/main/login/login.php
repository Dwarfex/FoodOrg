<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 15:05
 */

$warningText = '';
if (se::isclicked('login')) {
    $login = $_POST['user'];
    $password = $_POST['password'];
    $loginStatus = $seUser->userLogin($login, $password);
    if ($loginStatus == MSG_LOGIN_SUCCESS) {
        //if ((se02GeneralLogLevel>0)) $se02->log('login', "user:\t\t$_SESSION[seUserLogin]\n\t\t\t\tname:\t\t$_SESSION[seUserIdentityGivenNames]\n\t\t\t\tsurname:\t$_SESSION[seUserIdentitySurname]");
        navigate(''.\Package\FoodOrganizer\FOHelpers::getFOBaseDirectory().'/');
    } else {
        $warningText = '<div class="alert bg-warning" role="alert">
<span class="glyphicon glyphicon-warning-sign"></span> Login failed: "' . $loginStatus . '"<a class="pull-right" href="#"><span class="glyphicon glyphicon-remove"></span>
</a>
</div>';
    }
}
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');

$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));

$sitehtml='';

$sitehtmlForm='

<div class="panel panel-default">
    <div class="panel-heading"><h2>Login</h2></div>
    
    <div class="panel-body">
    <div class="row">
    <div class="col-sm-12">'.$warningText.'</div>
    </div>
    <div class="form-group row">
    <div class="col-sm-2"></div>
    
    <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
    
    <div class="col-sm-6">
      <input type="text" name="user" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  <div class="col-sm-2"></div>
    
  </div>
  <div class="form-group row">
    <div class="col-sm-2"></div>
    
    <label for="inputPassword3" class="col-sm-2 form-control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  <div class="col-sm-2"></div>
    
  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" name="login" class="btn btn-secondary">Sign in</button>
    </div>
  </div></div>

</div>
  

';

$sePage->addContent('sitehtml',$sitehtml);

$sePage->addContent('sitehtml', beginFormular('login'));

$sePage->addContent('sitehtml',$sitehtmlForm);
$sePage->addContent('sitehtml', endFormular('login'));