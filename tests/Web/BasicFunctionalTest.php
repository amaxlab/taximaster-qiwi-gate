<?php

namespace Tests\Web;

use Tests\AbstractWebTestCase;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class BasicFunctionalTest extends AbstractWebTestCase
{
    public function testGetHomePage()
    {
        $this->request('GET', '/');
        $this->assertTrue($this->response()->isOk());
        //$this->assertEquals('', $this->response()->getContent());
    }

    public function testGetUrl404()
    {
        $this->request('GET', '/notFoundURL');
        $this->assertEquals(404, $this->response()->getStatusCode());
        //$this->assertEquals('', $this->response()->getContent());
    }
}
