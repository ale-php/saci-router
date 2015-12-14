<?php

namespace Saci\Http;

use React\EventLoop\Factory as Factory;
use React\Socket\Server as Server;
use React\Http\Server as Http;

class Application {
	
	private $loop;
	private $socket;
	private $http;

	
	public function __construct(){
		$this->loop = Factory::create();
        $this->socket = new Server($this->loop );
        $this->http = new Http($this->socket, $this->loop );
		
	}
	public function on($req,$app){
		$this->http->on($req,$app);
		
	}
	
	public function listen($port){
	$this->socket->listen($port);
	}
	
	public function run(){
     $this->loop->run();
	}

}

