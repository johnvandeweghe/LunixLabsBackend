<?php
namespace LunixLabs\Endpoints\v1_0;

use LunixREST\Endpoints\Endpoint;

class projects extends Endpoint {
    public function getAll(){
		return ["helloworld" => "hello world"];
	}
}
