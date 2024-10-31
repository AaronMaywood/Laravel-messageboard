<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * 投稿できるかテスト
     */
    public function test_can_post(): void
    {
        $response = $this->post('/', [
            'name' => 'Feature Test User',
            'description' => 'test test test',
        ]);

        $response->assertRedirect('/');
    }

}
