<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_see_one_blogpost_when_there_is_one()
    {
        //Arrange
        $post=$this->createDummyBlogPost();
      

        //Act
        $response = $this->get('/posts');

        //Assert
        $response->assertSeeText('test2');

        $this->assertDatabaseHas('blog_posts',[
            'title'=> 'test2'
        ]);
    }

    public function test_store_valid(){
        $params = [
            'title' => 'Valid title',
            'body' => 'At least 5 characters'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post was created');
    }
    public function test_store_fail(){
        $params = [
            'title' => 'x',
            'body' => 'x'
        ];
        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');
        $messages = session('errors')->getMessages();
       
        $this->assertEquals($messages['title'][0], 'The title must be at least 3 characters.');
        $this->assertEquals($messages['body'][0], 'The body must be at least 5 characters.');
    }

    public function test_update_valid(){
         //Arrange
         $post= $this->createDummyBlogPost();

         $this->assertDatabaseHas('blog_posts', $post->getAttributes());

         $params = [
            'title' => 'Updated',
            'body' => 'Updated test body'
        ];
        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');
        
        $this->assertEquals(session('status'), 'The blog post was updated');
        $this->assertDatabaseMissing('blog_posts',$post->getAttributes());
        $this->assertDatabaseHas('blog_posts',[
            'title' => 'Updated',
            'body' => 'Updated test body'
        ]);
    }
    public function test_delete(){
        $post = $this->createDummyBlogPost();
        $this->assertDatabaseHas('blog_posts', $post->getAttributes());

        $this->delete("/posts/{$post->id}")
        ->assertStatus(302)
        ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The post '. $post->title .' was deleted');
        $this->assertDatabaseMissing('blog_posts',$post->getAttributes());

    }

    private function createDummyBlogPost():BlogPost{
        $post= new BlogPost();
         $post->title = 'test2';
         $post->body ="test2 body of post";
         $post->save();
         return $post;
    }
}
