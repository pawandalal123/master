<html>
<head>
<title>Jotorres Table class example</title>
</head>
<body>
    <div id='results'>
    <?php echo $this->table->generate($books); ?>
	<?php echo $this->pagination->create_links(); ?>
    </div>
</body>
</html>