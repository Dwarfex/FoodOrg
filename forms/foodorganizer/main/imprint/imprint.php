<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 12.02.2016
 * Time: 11:29
 */

$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$sePage->includeCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
$sePage->includeCss('FoodOrganizer/layout/css/foodorganizer.css');
$sePage->includeJavascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$sePage->addContent('content', \Package\FoodOrganizer\FOHelpers::generateHTMLPageLayout('',false));
$sePage->setTitle('FO- Impressum');
$imprint = '<h1>Impressum</h1>
<h2>Angaben gemäß § 5 TMG:</h2>
<p>Henrik Oelze<br />
Hinrichsenstr. 28a<br />

20535 Hamburg
</p>
<h2>Kontakt:</h2>
<table><tr>

<tr><td>E-Mail:</td>
<td>kontakt@somecoding.de</td>
</tr></table>
<h2>Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV:</h2>
Henrik Oelze<br />
Hinrichsenstr. 28a<br />

20535 Hamburg

';

$disclaimer = '<h1>Haftungsausschluss (Disclaimer)</h1>
<p><strong>Haftung für Inhalte</strong></p> <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p> <p><strong>Haftung für Links</strong></p> <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p> <p><strong>Urheberrecht</strong></p> <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p><p> </p>';

$usedIcons='<h1>Genutze Grafiken
</h1>
<p>
<ul><li><a href="https://www.iconfinder.com/Zerg">Sergei Kokota</a> nach   <a href="http://creativecommons.org/licenses/by/2.5/">License: Creative Commons (Attribution 2.5 Generic)</a>(keine &Auml;nderung)</li>
<li><a href="https://www.iconfinder.com/Zerg">Sergei Kokota</a> nach   <a href="http://creativecommons.org/licenses/by/3.0/">License: Creative Commons (Attribution 3.0 Unported)</a>(keine &Auml;nderung)</li>
<li><a href="https://www.iconfinder.com/UsersInsights">Users Insights</a> nach   <a href="http://creativecommons.org/licenses/by/3.0/">License: Creative Commons (Attribution 3.0 Unported)</a>(keine &Auml;nderung)</li>
</ul></p>';
$sitehtml='
<div class="row">
<div class="col-md-9">'.br().br().$imprint.br().br().$disclaimer.br().br().$usedIcons.br().br().br().' </div>
<div class="col-md-3"> </div>




</div>
';


$sePage->addContent('sitehtml',$sitehtml);