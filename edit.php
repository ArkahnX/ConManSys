<?php
function editScripts() {
	if(isLoggedIn()) {
		?><script src="assets/ckeditor/ckeditor.js"></script><script src="assets/js/edit.js"></script><?php
	}
}

function editable() {
	if(isLoggedIn()) {
		echo 'contenteditable="true"';
	}
}
?>