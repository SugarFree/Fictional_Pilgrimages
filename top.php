<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='it' xml:lang='it'>
<head>
	<title><?php echo $titolo; ?></title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<script type='text/javascript' src='./js/main.js'></script>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Crimson+Text:600' />
	<link rel='stylesheet' type='text/css' href='./css/main.css' />
<?php
	if(isset($local_style))
		echo "\t<link rel='stylesheet' type='text/css' href='./css/$local_style.css' />\n";
?>
	<link rel='stylesheet' type='text/css' media='handheld, screen and (max-width:767px), only screen and (max-device-width:767px)' href='./css/mobile.css' />
<?php
	if(isset($local_mobile_style))
		echo "\t<link rel='stylesheet' type='text/css' media='handheld, screen and (max-width:767px), only screen and (max-device-width:767px)' href='./css/$local_mobile_style.css' />\n";
?>
	<link rel="stylesheet" type="text/css" media="print" href="./css/print.css" />
	<link rel="icon" type="image/png" href="./favicon-16x16.png" />
</head>
<body>
	<h1 id='titolo' lang='en'>Fictional Pilgrimages</h1>
<?php
	if(isset($path))
		include "view/path.php";
?>
	<div id='sidenav'>
		<a class='nascosto' href='#corpo'>Clicca per saltare il menu.</a>
		<img id='logo' src='./img/logo.png' alt='Logo del sito' />
		<ul id='menu'>
<?php
	class menu_item {
		function __construct($href, $icon, $text, $en) {
			$this->href=$href;
			$this->icon=$icon;
			$this->testo=$text;
			$this->inglese=$en; }}

	$menu_items = array(new menu_item("index.php","home.png","Home", true),
		new menu_item("cerca_localita.php","world.png","Cerca localit&agrave;", false),
		new menu_item("cerca_opere.php","titolo.png","Cerca opere", false));

	if(isset($_SESSION["username"])) {
		$menu_items[]=new menu_item("upload.php", "upload.png", "Inserisci <span lang='en'>post</span>", false);
		$menu_items[]=new menu_item("pannelloUtente.php", "utente.png", "Pannello utente", false);
		if($_SESSION["rango"] == "admin")
			$menu_items[] = new menu_item("pannelloAdmin.php", "admin.png", "Pannello <span lang='en'>admin</span>", false); }

	for($i=0; $i<count($menu_items); $i++) {
		echo "\t\t\t";
		if($i == $current_menu_item) {
			echo "<li class='selected'";
			if($menu_items[$i]->inglese)
				echo " lang='en'";
			echo "><img class='icon' src='./img/" . $menu_items[$i]->icon . "' alt='' />" . $menu_items[$i]->testo . "</li>"; }
		else {
			echo "<li";
			if($menu_items[$i]->inglese)
				echo " lang='en'";
			echo "><a href='" . $menu_items[$i]->href . "'><img class='icon' src='./img/" . $menu_items[$i]->icon . "' alt='' />" . $menu_items[$i]->testo . "</a></li>"; }
		echo "\n"; }
?>
		</ul>
	</div>
	<div id='corpo'>
