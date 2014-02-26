<?php

return array(

	'driver' => 'eloquent',
	
	'model' => 'Usuario',

	'table' => 'usuarios',

	'reminder' => array(

		'email' => 'emails.auth.reminder',

		'table' => 'password_reminders',

		'expire' => 60,

	),

);
