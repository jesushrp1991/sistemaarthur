<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComprarTransactionControllerTest extends WebTestCase
{
    public function testCompraradd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add/');
    }

    public function testCompraredit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/');
    }

    public function testComprarshow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
