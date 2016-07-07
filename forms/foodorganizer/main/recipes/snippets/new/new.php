<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 10.02.2016
 * Time: 12:35
 */

echo"
<label id=\"Label1\"></label>
<form action=\"\" method=\"post\">

	<table style=\"width: 100%\">
		<tr>
			<td colspan=\"3\" style=\"height: 40px\"><h1>Neues Snippet Anlegen:</h1></td>
		</tr>
		<tr>
			<td style=\"width: 138px\">Rezeptname:</td>
			<td colspan=\"2\">
			<input name=\"Text1\" style=\"width: 206px\" type=\"text\" /></td>
		</tr>
		<tr>
			<td colspan=\"2\">Rezeptbeschreibung:</td>
			<td><textarea name=\"TextArea3\" style=\"width: 206px; height: 62px\"></textarea></td>
		</tr>
		<tr>
			<td colspan=\"2\" style=\"height: 30px\">Zutaten:</td>
			<td style=\"height: 30px\"><input name=\"Text2\" type=\"text\" /><input name=\"Submit1\" type=\"submit\" value=\"Zutat hinzufügen\" /></td>
		</tr>
		<tr>
			<td colspan=\"2\" style=\"height: 30px\">Hinzugefügte Zutaten:</td>
			<td style=\"height: 30px\">Mehl, Wasser, Zucker, Latein,
			Buchstabennudeln, Salz</td>
		</tr>
		<tr>
			<td style=\"height: 23px\" colspan=\"3\">1. Schritt:</td>
		</tr>
		<tr>
			<td colspan=\"3\">
			<textarea name=\"TextArea1\" style=\"width: 1008px; height: 139px\">Hier kommt der Erste teil eines Rezeptes ReinLorem  Ipsum dolor sit amezt consectetur adipisci velit. Ipsum dolor sit amezt consectetur adipisci velit. Ipsum dolor sit amezt consectetur adipisci velit. Ipsum dolor sit amezt consectetur adipisci velit.Ipsum dolor sit amezt consectetur adipisci velit.Ipsum dolor sit amezt consectetur adipisci velit.</textarea></td>
		</tr>
		<tr>
			<td style=\"height: 110px\" colspan=\"3\">
			<input name=\"addRecipiePart\" type=\"submit\" value=\"Einen weiteren Schritt hinzufügen:\" /></td>
		</tr>
	</table>

	<hr />


<table style=\"width: 100%\">
	<tr>
			<td colspan=\"2\" style=\"height: 110px\"><br />
			<input checked=\"checked\" name=\"Radio2\" type=\"radio\" value=\"V1\" />Pause
			zwischen dem nächsten Schritt:<br />
&nbsp;<select name=\"Select1\">
			<option>Kühlschrank</option>
			<option>Frierer</option>
			<option>An der Luft abkühlen lassen</option>
			<option>Gehen lassen</option>
			</select> für <select name=\"Select2\">
			<option>5</option>
			<option>10</option>
			<option>15</option>
			<option>20</option>
			<option>25</option>
			<option>30</option>
			<option>35</option>
			<option>40</option>
			<option>50</option>
			<option>60</option>
			<option>90</option>
			<option>120</option>
			</select>Minuten<br />
			<br />
			<input checked=\"checked\" name=\"Radio1\" type=\"radio\" value=\"V1\" />keine
			Pause</td>
			</tr>
	<tr>
		<td colspan=\"2\">2. Schritt:</td>
	</tr>
	<tr>
		<td colspan=\"2\">
		<textarea cols=\"20\" name=\"TextArea2\" rows=\"1\" style=\"width: 425px; height: 139px\">Hier kommt der Erste teil eines Rezeptes ReinLorem  Ipsum dolor sit amezt consectetur adipisci velit. Ipsum dolor sit amezt consectetur adipisci velit. Ipsum dolor sit amezt consectetur adipisci velit. Ipsum dolor sit amezt consectetur adipisci velit.Ipsum dolor sit amezt consectetur adipisci velit.Ipsum dolor sit amezt consectetur adipisci velit.</textarea></td>
	</tr>
	<tr>
		<td style=\"width: 519px\">
		<input name=\"addRecipiePart0\" type=\"submit\" value=\"Einen weiteren Schritt hinzufügen:\" />
		</td>
		<td>

			<input name=\"save\" type=\"submit\" value=\"Speichern\" />
		</td>
	</tr>
</table>
</form>

";