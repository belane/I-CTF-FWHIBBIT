<p><h2>Upload</h2><h4>Wash your bills</h4></p>
<?php
$max_size=262144;
$valid_ext = array('doc','docx');
$valid_headers = array(
	'application/octet-stream',
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
$valid_types = array(
	'application/msword; charset=binary',
	'application/octet-stream; charset=binary',
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document; charset=binary');

if(isset($_FILES['file']))
	{
	// Extension
	$ext=strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
	if(!in_array($ext, $valid_ext))
		die('<h4>Not a valid file</h4>');
	// Size
	if($_FILES['file']['size'] > $max_size)
		die('<h4>Not a valid file</h4>');
	// Client Headers
	if(!in_array($_FILES['file']['type'], $valid_headers))
		die('<h4>Not a valid file</h4>');
	// File type
	$finfo = new finfo(FILEINFO_MIME);
	$type = $finfo->file($_FILES['file']['tmp_name']);
	if(!in_array($type, $valid_types))
		die('<h4>Not a valid file</h4>');

	// Move Upload
	$file=sha1(file_get_contents($_FILES['file']['tmp_name']).time().rand()).'.'.$ext;
	$dest = './uploads/'.$file;
	if (move_uploaded_file($_FILES['file']['tmp_name'], $dest))
			echo '<pre>Your bill is uploaded as <i>'.$file.'</i> and queued for processing.</br>';
	    echo 'Queue and bills are empty every 20 minutes.</pre>';
	}
?>
<p>You do not need to give away any personal information to use Laundry service. Simply send us your bills or balances and exchange them for new and clean rabbits</p>
<form enctype="multipart/form-data" action="" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_size; ?>" />
    Attach bill: <input name="file" type="file" accept=".doc,.docx" class="btn btn-primary btn-file" /></br>
    <input type="submit" value="  Send  " class="btn btn-default"/>
</form>
