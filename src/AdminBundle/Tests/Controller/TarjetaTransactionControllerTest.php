<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TarjetaTransactionControllerTest extends WebTestCase
{
    public function testTarjetaadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add');
    }

    public function testTrajetaedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{id}');
    }

    public function testTarjetashow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
