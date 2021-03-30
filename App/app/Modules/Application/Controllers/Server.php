<?php

namespace App\Modules\Application\Controllers;

use App\Libraries\Chat;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use CodeIgniter\Controller;

class Server extends Controller
{

  public function index()
  {

    if(!is_cli()){
      die('OUCH!');
    }

    $server = IoServer::factory(
      new HttpServer(
          new WsServer(
              new Chat()
          )
      ),
      8081
  );

  $server->run();
  }
}
