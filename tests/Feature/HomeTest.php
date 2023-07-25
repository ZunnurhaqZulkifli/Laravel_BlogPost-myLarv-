<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{

    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');

        $response->assertSeeText('Main Home'); 
        $response->assertSeeText('A wide variety of things and items, feel free to click some buttons');
    }

    public function testContactPageIsWorkingCorrectly()
    {
        $response = $this->get('/contact');

        $response->assertSeeText("one"); 
        $response->assertSeeText('This is where all of your contacts will be');
    }
}
