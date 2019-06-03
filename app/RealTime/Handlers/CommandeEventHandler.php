<?php

namespace App\RealTime\Handlers;

use Redis;
use Response;
class CommndeEventHandler 
{
	CONST EVENT = 'commnde.update';
	CONST CHANEL 'commnde.update';

	public function handler ($data){
		$redis = Redis::connect();
		$redis->publish(self::CHANEL, $data);
	}  
}