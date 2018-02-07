<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
		'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='it' xml:lang='it'>
<head>
	<title><?php echo $titolo; ?></title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<script src='script.js'></script>
	<link href='https://fonts.googleapis.com/css?family=Crimson+Text:600' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='style.css' />
	<link rel='stylesheet' type='text/css' media='handheld, screen and (max-width:480px), only screen and (max-device-width:480px)' href='small_style.css' />
	<link rel="stylesheet" type="text/css" media="print" href="print_style.css"/>
</head>
<body>
	<h1 id='titolo'>Fictional Pilgrimages</h1>
	<div id='path'>
		Ti trovi in: <?php echo $path . "\n";?>
		<?php
		session_start();
		if(!isset($_SESSION['username']))
		{

			echo ("<form method='get' action='registrazione.php'>
				<button type='submit'>Connettiti</button>
			</form>");
		}
		else
		{
			echo ("<form method='get' action='logout.php'>
			<button type='submit'>Logout</button>
			</form>");
			echo "<p id='prova'>Ciao " .$_SESSION['username']. "</p>";
		}
		?>
	</div>
	<div id='sidenav'>
		<a href='#corpo' style='display: none'>Clicca per saltare il menu.</a>
		<img id='logo' src='./img/logo.png' alt='Logo del sito' />
		<ul id='menu'><?php
			class menu_item {
				function __construct($href, $icon, $text) {
					$this->href=$href;
					$this->icon=$icon;
					$this->testo=$text; }}

			$menu_items = array(new menu_item("index.php","home.png","Home"),
													new menu_item("ricerca_per_localita.php","world.png","Cerca localit&agrave;"),
													new menu_item("cerca_opere.php","titolo.png","Cerca opere"),
													new menu_item("#","utente.png","Pannello utente"));

			echo "\n";
			for($i=0; $i<count($menu_items); $i++) {
				echo "\t\t\t";
				if($i == $current_menu_item) {
					echo "<li class='selected'><img class='icon' src='./img/" . $menu_items[$i]->icon . "' alt='' />" . $menu_items[$i]->testo . "</li>"; }
				else {
					echo "<a href='" . $menu_items[$i]->href . "'><li><img class='icon' src='./img/" . $menu_items[$i]->icon . "' alt='' />" . $menu_items[$i]->testo . "</li></a>"; }
				echo "\n"; }
			?>
		</ul>
	</div>
	<div id='corpo'>
