<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DineroEnCasaTransactionControllerTest extends WebTestCase
{
    public function testDineroencasaadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add/');
    }

    public function testDineroencasaedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{id}/');
    }

    public function testDineroencasashow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
