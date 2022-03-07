<?php

namespace Tests\Unit;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class NumeroPrimoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function test_validate_numero_primo_15()
    {
       
        $payload = [
             'numero' => 15
        
         ];


         $response = $this->postJson('/api/numero-primo', ['numero' => '15']);
         $response->assertStatus(200)
         ->assertJsonFragment([
            "estado" => "OK",
            "mensaje" => "Operacion Exitosa",
            "codigo" => 200,
            "response" => [
                13,
                11,
                7,
                5,
                3,
                2
            ]
        ]);

    }

    /** @test */
    public function test_validate_numero_primo_7()
    {
       
         $response = $this->postJson('/api/numero-primo', ["numero" => "7"]);
         $response->assertStatus(200)
         ->assertJsonFragment([
            "estado" => "OK",
            "mensaje" => "Operacion Exitosa",
            "codigo" => 200,
            "response" => [
               "7",
                5,
                3,
                2
            ]
        ]);

    }



}
