<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Idea;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function list_of_ideas_show_on_main_page()
    {

        $ideaOne = Idea::factory()->create([
            'title' => 'My Title',
            'description' => 'Description of my title',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Title',
            'description' => 'Description of my second title',
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
    }
}
