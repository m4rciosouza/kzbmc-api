<?php

return [
    'adminEmail' 			 => 'donotreply@kazcanvas.com',
	'jwt_key' 				 => '123456',
	'jwt_exp_time' 			 => (time() + (60 * 30)), // 30 min
	'exp_assinatura_premium' => strtotime('+365 days'),
];