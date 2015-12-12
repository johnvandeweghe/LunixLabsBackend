<?php
namespace LunixLabs\Endpoints\v1_0;

use LunixREST\Endpoints\DoctrineEndpoint;

class projects extends DoctrineEndpoint {
    public function getAll(){
		return array_map(function($project) {
			return $project->toArray();
		}, $this->entityManager->getRepository('LunixLabs\Entities\Projects')->findBy([]));
	}
}
