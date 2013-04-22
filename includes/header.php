<?php

?>
<!--<a href="<?php echo BASE_PATH; ?>"><img src ="<?php echo IMAGE_PATH_ICO; ?>logo_short2.png" alt="logo" title="logo"></a>-->

	<div id="logo">
		<a id="logo_link" href="<?php echo BASE_PATH; ?>">MCDC</a>
	</div>
    <div id="searchBox">
        	<input id="searchBoxInput" placeholder="   Nombre de Pelicula o Disco" type="text" value="" class="search">
            <input id="searchBoxButton" type="submit" value="Buscar" class="submit" onclick="search();">
    </div>

	<div id="response_ajax"></div>

<?php
if($server_request == "90.0.4.143"){
echo "<div id=\"horario\">
<img src =\"".IMAGE_PATH_ICO."Horario.png\" alt=\"sabados domingos feriados\" title=\"sabados domingos feriados\">
</div>";
}
?>
