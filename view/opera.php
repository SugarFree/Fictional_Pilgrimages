
		<dl>
			<dt>Titolo:</dt>
			<dd><?php echo $opera->titolo; ?></dd>
			<dt>Tipo:</dt>
			<dd><?php if($opera->tipo == "serietv")
							echo "Serie TV";
						else if($opera->tipo == "film")
							echo "Film"; ?></dd>
			<dt>Sinossi:</dt>
			<dd><?php echo $opera->descrizione; ?></dd>
<?php

?>
		</dl>