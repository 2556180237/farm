<?php

namespace App\Providers;

use App\Factories\AnimalFactory;
use App\Enums\Animal;

/**
 * Провайдер животных для фермы
 * 
 * Отвечает за создание и предоставление животных
 * для симуляции фермы
 */
class FarmProvider
{
    /**
     * ID последней коровы
     * 
     * @var int
     */
    private int $lastCowId = 0;
    
    /**
     * ID последней курицы
     * 
     * @var int
     */
    private int $lastChickenId = 10;

    /**
     * Получение начальных животных
     * 
     * @return array Массив начальных животных
     */
    public function getInitialAnimals(): array
    {
        $animals = [];

        // Добавляем 10 коров
        for ($i = 1; $i <= 10; $i++) {
            $animals[] = (new AnimalFactory)->create(Animal::COW->value, $i);
            $this->lastCowId = $i;
        }

        // Добавляем 20 кур
        for ($i = 1; $i <= 20; $i++) {
            $animals[] = (new AnimalFactory)->create(Animal::CHICKEN->value, $i + 10);
            $this->lastChickenId = $i + 10;
        }

        return $animals;
    }

    /**
     * Получение дополнительных животных
     * 
     * @return array Массив дополнительных животных
     */
    public function getAdditionalAnimals(): array
    {
        $animals = [];

        // Добавляем еще 1 корову
        $animals[] = (new AnimalFactory)->create(Animal::COW->value, $this->lastCowId + 1);

        // Добавляем еще 5 кур
        for ($i = 1; $i <= 5; $i++) {
            $animals[] = (new AnimalFactory)->create(Animal::CHICKEN->value, $this->lastChickenId + $i);
        }

        return $animals;
    }
}
