<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MiscelaneaControllerTest extends WebTestCase
{
    public function testMiscelaneaadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add/');
    }

    public function testMiscelaneaedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{id}/');
    }

    public function testMiscelaneashow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
