function pruefe(datum)
{
    //(Schritt 1) Fehlerbehandlung
 if (!datum) return false;
 datum=datum.toString();

    //(Schritt 2) Aufspaltung des Datums
 datum=datum.split(".");
 if (datum.length!=3) return false;

    //(Schritt 3) Entfernung der fuehrenden Nullen und Anpassung des Monats

 datum[0]=parseInt(datum[0],10);
 datum[1]=parseInt(datum[1],10)-1;

    //(Schritt 4) Behandlung Jahr nur zweistellig
 if (datum[2].length==2) datum[2]="20"+datum[2];

    //(Schritt 5) Erzeugung eines neuen Dateobjektes
 var kontrolldatum=new Date(datum[2],datum[1],datum[0]);

    //(Schritt 6) Vergleich, ob das eingegebene Datum gleich dem JS-Datum ist
 if (kontrolldatum.getDate()==datum[0] && kontrolldatum.getMonth()==datum[1] && kontrolldatum.getFullYear()==datum[2])
     return true; else return false;
}
function formularsenden() {
	var datum = document.getElementById('Geburtsdatum').value;
	var Vorname =document.getElementById('Vorname').value;
	var Nachname =document.getElementById('Nachname').value;
	var Strasse =document.getElementById('Strasse').value;
	var PLZ =document.getElementById('PLZ').value;
	var Ort =document.getElementById('Ort').value;
	if (!pruefe(datum)) {
		alert("Falsches Datum");
		document.getElementById('Geburtsdatum').focus();
		return false;	
	}
	if (Vorname=="") {
		alert("Vorname eingeben");
		document.getElementById('Vorname').focus();
		return false;	
	}
	if (Nachname=="") {
		alert("Nachname eingeben");
		document.getElementById('Nachname').focus();
		return false;	
	}
	if (Strasse=="") {
		alert("Straﬂe eingeben");
		document.getElementById('Straﬂe').focus();
		return false;	
	}
	if (PLZ=="") {
		alert("PLZ eingeben");
		document.getElementById('PLZ').focus();
		return false;	
	}
	if (Ort=="") {
		alert("Ort eingeben");
		document.getElementById('Ort').focus();
		return false;	
	}
	document.getElementById('schueler').submit();
	return true;
}