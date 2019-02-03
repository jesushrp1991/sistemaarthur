<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VentaTransactionControllerTest extends WebTestCase
{
    public function testVentaadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add/');
    }

    public function testVentaedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{id}');
    }

    public function testVentashow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
