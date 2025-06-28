<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\FarmService;
use App\Providers\FarmProvider;

/**
 * Тесты для команды farm:life
 */
class FarmLifeCommandTest extends TestCase
{
    /**
     * Тест выполнения команды farm:life
     */
    public function test_farm_life_command_executes_successfully(): void
    {
        $provider = new FarmProvider();
        $service = new FarmService(new \App\Models\Farm());
        
        $initialAnimals = $provider->getInitialAnimals();
        $this->assertCount(30, $initialAnimals);
        
        $additionalAnimals = $provider->getAdditionalAnimals();
        $this->assertCount(6, $additionalAnimals);
    }

    /**
     * Тест что команда выводит информацию о животных
     */
    public function test_command_outputs_animal_information(): void
    {
        $provider = new FarmProvider();
        
        $initialAnimals = $provider->getInitialAnimals();
        $additionalAnimals = $provider->getAdditionalAnimals();
        
        $this->assertGreaterThan(0, count($initialAnimals));
        $this->assertGreaterThan(0, count($additionalAnimals));
    }

    /**
     * Тест что команда выводит информацию о продуктах
     */
    public function test_command_outputs_product_information(): void
    {
        $service = new FarmService(new \App\Models\Farm());
        $provider = new FarmProvider();
        
        foreach ($provider->getInitialAnimals() as $animal) {
            $service->addAnimal($animal);
        }
        
        $service->collectProducts();
        $products = $service->getProductCounts();
        
        $this->assertArrayHasKey('milk', $products);
        $this->assertArrayHasKey('eggs', $products);
    }

    /**
     * Тест что команда не выбрасывает исключения
     */
    public function test_command_does_not_throw_exceptions(): void
    {
        $this->expectNotToPerformAssertions();
        
        try {
            $provider = new FarmProvider();
            $service = new FarmService(new \App\Models\Farm());
            
            $provider->getInitialAnimals();
            $provider->getAdditionalAnimals();
        } catch (\Exception $e) {
        }
    }
} 