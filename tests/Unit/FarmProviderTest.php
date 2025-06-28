<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Providers\FarmProvider;

class FarmProviderTest extends TestCase
{
    public function test_can_get_initial_animals(): void
    {
        $provider = new FarmProvider();
        $animals = $provider->getInitialAnimals();
        
        $this->assertIsArray($animals);
        $this->assertCount(30, $animals);
    }

    public function test_can_get_additional_animals(): void
    {
        $provider = new FarmProvider();
        $animals = $provider->getAdditionalAnimals();
        
        $this->assertIsArray($animals);
        $this->assertCount(6, $animals);
    }

    public function test_sequential_animal_creation(): void
    {
        $provider = new FarmProvider();
        
        $initial = $provider->getInitialAnimals();
        $additional = $provider->getAdditionalAnimals();
        
        $this->assertCount(30, $initial);
        $this->assertCount(6, $additional);
        
        foreach ($initial as $animal) {
            $this->assertIsObject($animal);
        }
        
        foreach ($additional as $animal) {
            $this->assertIsObject($animal);
        }
    }
} 