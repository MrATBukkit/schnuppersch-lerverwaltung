function formularsenden() {
	var Vorname =document.getElementById('Vorname').value;
	var Nachname =document.getElementById('Nachname').value;
	var Benutzername =document.getElementById('Benutzername').value;
	var pword =document.getElementById('pword').value;
	var pword2 =document.getElementById('pword2').value;
	if (Vorname=="") {
		alert("Vorname eingeben");
		document.getElementById("Vorname").focus();
		return;	
	}
	if (Nachname=="") {
		alert("Nachname eingeben");
		document.getElementById("Nachname").focus();
		return;	
	}
	if (Benutzername=="") {
		alert("Benutzername eingeben");
		document.getElementById("Benutzername").focus();
		return;	
	}
	if (pword=="") {
		alert("Password eingeben");
		document.getElementById("pword").focus();
		return;	
	}
	if (pword2=="") {
		alert("Password2 eingeben");
		document.getElementById("pword2").focus();
		return;	
	}
	if (pword2!=pword) {
		alert("Password2 nicht übereinstimmend");
		document.getElementById("pword2").focus();
		return;
	}
	document.getElementById('lehrer').submit();
	return true;
}