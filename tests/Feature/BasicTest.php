<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    public function testLoadHomePage(){ 
        $this->actingAs($this->defaultUser())->get('/')->assertStatus(302)->assertSee('Redirecting');
    }
    
    public function testLoadCatalogPage(){ 
    	$this->actingAs($this->defaultUser())->get('/catalog')->assertStatus(200)->assertSee('El padrino');
    }
    
    public function testLoadCreatePage(){ 
    	$this->actingAs($this->defaultUser())->get('/catalog/create')->assertStatus(200)->assertSee('Afegir pel.lícula');
    }
    
    public function testLoadEditPage(){ 
    	$this->actingAs($this->defaultUser())->get('/catalog/edit/22')->assertStatus(200)->assertSee('Modificar pel.lícula');
    }
    
    public function testLoadShowPage(){ 
    	$this->actingAs($this->defaultUser())->get('/catalog/show/22')->assertStatus(200)->assertSee('Tornar catàleg');
    }
    
    private function defaultUser(){ 
	return User::find(1);
    }
}
