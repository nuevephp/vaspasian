<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Strong | Create Users</title>
<style>
<!--
#create {float: left; width: 320px; margin-top: 20px;}
#create p {float: left; width: 314px; margin: 2px 0px;}
#create label {float: left; width: 90px;}
#create input {float: left;}
#create .input_size {width: 220px;}
#create .submit_button {float: right}
.message {
	width: 310px;
	text-indent: 10px;
	padding: 5px;
	border: 1px solid #ccc;
}
.error {
	width: 310px;
	text-indent: 10px;
	padding: 5px;
	margin-bottom: 5px;
	border: 1px solid #f00;
}
-->
</style>
</head>

<body>
<?php if(isset($message)){ ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
<?php echo validation_errors(); ?>
<form id="create" action="<?php echo site_url('strong_setup/create'); ?>" method="post">
	<p>
		<label for="username">Username</label>
		<input id="username" name="username" type="text" value="<?php echo set_value('username'); ?>" class="input_size" />
	</p>
	<p>
		<label for="password">Password</label>
		<input id="password" name="password" type="text" value="<?php echo set_value('password'); ?>" class="input_size" />
	</p>
	<p>
		<label for="password_conf">Password Again</label>
		<input id="password_conf" name="password_conf" type="text" value="<?php echo set_value('password_conf'); ?>" class="input_size" />
	</p>
	<p>
		<label for="email">Email</label>
		<input id="email" name="email" type="text" value="<?php echo set_value('email'); ?>" class="input_size" />
	</p>
	<p>
		<input type="submit" value="Create User" class="submit_button" />
	</p>
</form>
</body>
</html>