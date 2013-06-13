<?php
include("headers.php");
include("functions.php");
include("edit.php");
	$defaultPage = getDefaultPage();
?>
<html>
	<head>
		<title><?php getTitle($_GET["page"]); ?></title>
		<script src="assets/js/jquery.js"></script>
		<?php editScripts(); ?>
	</head>
	<body>
		<?php include("header.php");?>
		<div id="content" data-page-id="<?php echo $_GET["page"]; ?>" <?php editable();?>></div>
		<?php include("sidebar.php");?>
		<?php include("footer.php");?>
	</body>
</html>