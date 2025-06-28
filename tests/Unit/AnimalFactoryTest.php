<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Factories\AnimalFactory;
use App\Enums\Animal;
use App\Exceptions\FarmException;
use App\Models\Cow;
use App\Models\Chicken;

class AnimalFactoryTest extends TestCase
{
    public function test_can_create_cow(): void
    {
        $factory = new AnimalFactory();
        
        $cow = $factory->create(Animal::COW->value, 1);
        
        $this->assertInstanceOf(Cow::class, $cow);
    }

    public function test_can_create_chicken(): void
    {
        $factory = new AnimalFactory();
        
        $chicken = $factory->create(Animal::CHICKEN->value, 2);
        
        $this->assertInstanceOf(Chicken::class, $chicken);
    }

    public function test_throws_exception_for_invalid_animal_type(): void
    {
        $this->expectException(FarmException::class);
        
        $factory = new AnimalFactory();
        $factory->create('invalid', 1);
    }

    public function test_can_create_animals_with_different_ids(): void
    {
        $factory = new AnimalFactory();
        
        $cow1 = $factory->create(Animal::COW->value, 1);
        $cow2 = $factory->create(Animal::COW->value, 2);
        
        $this->assertInstanceOf(Cow::class, $cow1);
        $this->assertInstanceOf(Cow::class, $cow2);
    }
} 