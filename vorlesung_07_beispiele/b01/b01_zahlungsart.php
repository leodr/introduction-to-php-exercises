<form action="b01.php?" method="POST" style="padding: 5px;">
    Bitte wählen Sie eine Zahlungsart:
    <br />
    <select name="zahlungsart">
        <option value="Vorkasse">Vorkasse</option>
        <option value="Rechnung">Rechnung</option>
        <option value="Kreditkarte">Kreditkarte</option>
        <option value="Einzugsermächtigung">Einzugsermächtigung</option>	
    </select>
    
    <br />
    <br />
	
    <input type="hidden" value="<?=$seite?>" name="seite">
    <input type="submit" value="Ok" name="weiter">
</form>