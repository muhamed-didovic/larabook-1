<?php namespace Isimmons\Responder;

use Isimmons\Responder\Response;

class Responder
{

    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function json($message, $code = null)
    {
        return $this->response->json(['data' => $message], $code);
    }

}
