<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoriaControllerTest extends WebTestCase
{
    public function testCategoriaadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categoria');
    }

    public function testCategoriadelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'categoria');
    }

    public function testCategoriaedit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categoria');
    }

    public function testCategoriashow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categoria');
    }

}
