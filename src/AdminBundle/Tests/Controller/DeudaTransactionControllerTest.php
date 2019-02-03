<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DeudaTransactionControllerTest extends WebTestCase
{
    public function testDeudashow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/');
    }

}
