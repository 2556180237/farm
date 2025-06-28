<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\FarmService;
use App\Models\Farm;
use App\Models\Cow;
use App\Models\Chicken;

/**
 * Тесты для сервиса фермы
 */
class FarmServiceTest extends TestCase
{
    /**
     * Тест добавления коровы
     */
    public function test_can_add_cow(): void
    {
        $farm = new Farm();
        $service = new FarmService($farm);
        $cow = new Cow(1);
        
        $service->addAnimal($cow);
        
        $counts = $service->getAnimalCounts();
        $this->assertEquals(1, $counts['cows']);
        $this->assertEquals(0, $counts['chickens']);
    }

    /**
     * Тест добавления курицы
     */
    public function test_can_add_chicken(): void
    {
        $farm = new Farm();
        $service = new FarmService($farm);
        $chicken = new Chicken(1);
        
        $service->addAnimal($chicken);
        
        $counts = $service->getAnimalCounts();
        $this->assertEquals(0, $counts['cows']);
        $this->assertEquals(1, $counts['chickens']);
    }

    /**
     * Тест добавления нескольких животных
     */
    public function test_can_add_multiple_animals(): void
    {
        $farm = new Farm();
        $service = new FarmService($farm);
        
        $service->addAnimal(new Cow(1));
        $service->addAnimal(new Cow(2));
        $service->addAnimal(new Chicken(1));
        $service->addAnimal(new Chicken(2));
        
        $counts = $service->getAnimalCounts();
        $this->assertEquals(2, $counts['cows']);
        $this->assertEquals(2, $counts['chickens']);
    }

    /**
     * Тест сброса продуктов
     */
    public function test_can_reset_products(): void
    {
        $farm = new Farm();
        $service = new FarmService($farm);
        
        $service->addAnimal(new Cow(1));
        $service->addAnimal(new Chicken(1));
        
        $service->collectProducts();
        $products = $service->getProductCounts();
        
        $this->assertGreaterThan(0, $products['milk']);
        
        $service->resetProducts();
        $products = $service->getProductCounts();
        
        $this->assertEquals(0, $products['milk']);
        $this->assertEquals(0, $products['eggs']);
    }

    /**
     * Тест сбора продуктов от коров
     */
    public function test_can_collect_products_from_cows(): void
    {
        $farm = new Farm();
        $service = new FarmService($farm);
        
        $service->addAnimal(new Cow(1));
        $service->addAnimal(new Cow(2));
        
        $service->collectProducts();
        $products = $service->getProductCounts();
        
        $this->assertArrayHasKey('milk', $products);
        $this->assertGreaterThan(0, $products['milk']);
    }

    /**
     * Тест сбора продуктов от кур
     */
    public function test_can_collect_products_from_chickens(): void
    {
        $farm = new Farm();
        $service = new FarmService($farm);
        
        $service->addAnimal(new Chicken(1));
        $service->addAnimal(new Chicken(2));
        
        $service->collectProducts();
        $products = $service->getProductCounts();
        
        $this->assertArrayHasKey('eggs', $products);
    }
} 