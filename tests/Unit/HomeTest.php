<?php

namespace Tests\Unit;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_popular_products()
    {
        $this->get('/')->assertStatus(200)->assertSee(__('home.portfolio'));
    }
}
