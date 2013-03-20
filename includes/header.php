<?php

?>
<!--<a href="<?php echo BASE_PATH; ?>"><img src ="<?php echo IMAGE_PATH_ICO; ?>logo_short2.png" alt="logo" title="logo"></a>-->
<a id="logo_link" href="<?php echo BASE_PATH; ?>">MCDC</a>
<div id="container">
  <div id="mainContent">
    <div id="searchBox">
		<form method="get" action="#">
        	<input id="searchBoxInput" type="text" value="Nombre de Pelicula o Disco" class="search" onclick="clearSearchBoxInput();">
            <input id="searchBoxButton" type="submit" value="Buscar" class="submit" onclick="search();">
       	</form> 
    </div>
	<div id="response_ajax"></div>
</div>
<?php
if($server_request == "90.0.4.143"){
echo "<div id=\"horario\">
<img src =\"".IMAGE_PATH_ICO."Horario.png\" alt=\"sabados domingos feriados\" title=\"sabados domingos feriados\">
</div>";
}
?>
