<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SeederTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }


    public function testLinksTable()
    {
        $this->seeInDatabase('posts', ['name' => 'dotdev.co']);
    }
}


