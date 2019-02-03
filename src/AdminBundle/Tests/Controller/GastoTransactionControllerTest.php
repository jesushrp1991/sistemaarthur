<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GastoTransactionControllerTest extends WebTestCase
{
    public function testGastoshow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
