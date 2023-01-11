<form action="b01.php?" method="POST" style="padding: 5px;">
    Bitte geben Sie Ihren Wohnort ein:
    <br />
    <br />
    
    Straße
    <br />
    <input type="text" name="str" size="50" />
    <br />
    
    PLZ
    <br />
    <input type="text" name="plz" size="50" />
    <br />
    
    Ort
    <br />
    <input type="text" name="ort" size="50" />
    <br />

    <br />
    <br />
	<input type="hidden" value="<?=$seite?>" name="seite">
    <input type="submit" value="Ok" name="weiter">
</form>
