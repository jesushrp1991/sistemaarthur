<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovilControllerTest extends WebTestCase
{
    public function testMoviladd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add/');
    }

    public function testMoviledit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{id}/');
    }

    public function testMovilshow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

    public function testMovilshowone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/mobile/{id}/');
    }

}
