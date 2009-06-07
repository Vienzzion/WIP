<?php
if (isset($errors))
{
	foreach ($errors as $error)
	{
		echo $error .'<br />';
	}
}
echo form::open('users/register');
echo form::open_fieldset();
echo form::legend('Register an account');
echo form::label('username', 'Username:');
echo form::input('openid_identifier', $form['openid_identifier']);
echo form::label('password', 'Password:');
echo form::password('password');
echo form::submit('submit', 'register');
echo form::close_fieldset();
echo form::close();
?>
