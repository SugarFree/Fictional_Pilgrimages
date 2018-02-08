window.onload = function() {
    document.getElementById('Top').style.display = 'none'; };

window.onscroll = function() {
	scrollFunction() };

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.getElementById('Top').style.display = 'block'; }
	else {
		document.getElementById('Top').style.display = 'none'; }};