<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EspecificacionControllerTest extends WebTestCase
{
    public function testEspecificacionadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add');
    }

    public function testEspecificacionedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{d}');
    }

    public function testEspecificacionshow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'show');
    }

}
