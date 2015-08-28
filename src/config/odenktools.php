<?php
return [

	'identified_by' => ['username', 'email'],
	
	// DB prefix for tables
	'prefix' => 'odk_',
	
	'tables' => [
		'user' 					=> 'users',
		'user_fields' 			=> 'user_fields',
		'role' 					=> 'role',
		'role_profile_fields' 	=> 'role_profilefields'
	]

];
