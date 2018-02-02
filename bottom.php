
	</div>
	<div id='scroll'>
		<img id='Top' onclick='topFunction()' src='./img/back_on_top.png' alt='' />
		<script>
		window.onscroll = function() {scrollFunction()};
		function scrollFunction() {
    		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        		document.getElementById('Top').style.display = 'block';
    		} else {
        		document.getElementById('Top').style.display = 'none';
    		}
		}
		function topFunction() {
    		document.body.scrollTop = 0;
    		document.documentElement.scrollTop = 0;
    	}
		</script>
	<div id='footer'>
		Copyright &copy; 2017 Fictional Pilgrimages | <?php echo $version . "\n"; ?>
	</div>
</body>
</html>