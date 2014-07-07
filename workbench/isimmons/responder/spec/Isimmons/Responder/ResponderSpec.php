<?php

namespace spec\Isimmons\Responder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Isimmons\Responder\Response;
use Illuminate\Http\JsonResponse;

class ResponderSpec extends ObjectBehavior
{

    function let(Response $response)
    {
        $this->beConstructedWith($response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Isimmons\Responder\Responder');
    }

    function it_reponds_with_a_404()
    {
        $response = $this->json(['foobar'], 404)->getData();
        var_dump($response);die();
    }
}
