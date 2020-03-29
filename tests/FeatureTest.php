<?php

namespace Tests;

use Camrymps\ClearSight\View;
use Camrymps\ClearSight\Traits\HasSight;

class FeatureTest extends TestCase
{
    use HasSight;

    public function test_views()
    {
        $guest_ip = '0.0.0.0';

        $post_1 = Post::create(['title' => 'Test 1']);
        $post_2 = Post::create(['title' => 'Test 2']);

        $post_1_view = $this->view($post_1, $guest_ip);
        $post_2_view = $this->view($post_2, $guest_ip);

        $this->assertInstanceOf(View::class, $post_1_view);
        $this->assertInstanceOf(Post::class, app($post_1_view->viewable_type));
        $this->assertTrue($this->has_viewed($post_1, $guest_ip));

        $this->assertEquals(1, $post_1->views()->count());
        $this->assertEquals(2, $this->viewed($guest_ip)->count());
    }

}
