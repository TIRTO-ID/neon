<?php


return [
	'url' => [
		'root' => env('NEON_URL', ''),
		'check_email' => env('NEON_URL','') . '/api/check/{email}',
		'login' => env('NEON_URL').'google?src={src}&clientid={clientid}',
		'logout' => env('NEON_URL').'api/logout/{sid}',
		'check_session' => env('NEON_URL').'api/check-session/{sid}/{clientid}',

	],
	'client_id' => env('NEON_CLIENT_ID', 6538), //indium live (devel 8884)
	//default role for new registered user
    // 'default_role' => 'admin',

    
    'users' => [
        'model' => App\Models\User::class,
    ],
    
];