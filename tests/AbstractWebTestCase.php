<?php

namespace Tests;

use Silex\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Client;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
abstract class AbstractWebTestCase extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../src/app.php';
        require __DIR__.'/../config/prod.php';
        require __DIR__.'/../src/controllers.php';
        $app['session.test'] = true;

        return $this->app = $app;
    }

    /**
     * @param array $server
     *
     * @return Client
     */
    public function createClient(array $server = array())
    {
        $client = parent::createClient($server);
        $client->followRedirects(true);

        return $client;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = $this->createClient();
        }

        return $this->client;
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @return Crawler
     */
    public function request($method, $uri)
    {
        return $this->getClient()->request($method, $uri);
    }

    /**
     * @return null|Response
     */
    public function response()
    {
        return $this->getClient()->getResponse();
    }
}
