<?php

return [
    'adminEmail' 			 => 'marcio@kazale.com',
	'jwt_key' 				 => 'KZ-bmc:K@z@l3.c0m',
	'jwt_exp_time' 			 => (time() + (60 * 30)), // 30 min
	'exp_assinatura_premium' => strtotime('+365 days'),
];