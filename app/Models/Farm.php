<?php

namespace App\Models;

use App\Models\Cow;
use App\Models\Chicken;
use App\Enums\Product;

/**
 * Модель фермы
 * 
 * Управляет животными и продуктами на ферме
 */
class Farm
{
    /**
     * Массив коров на ферме
     * 
     * @var array
     */
    private array $cows = [];

    /**
     * Массив кур на ферме
     * 
     * @var array
     */
    private array $chickens = [];

    /**
     * Количество собранного молока
     * 
     * @var int
     */
    private int $milkCount = 0;

    /**
     * Количество собранных яиц
     * 
     * @var int
     */
    private int $eggsCount = 0;

    /**
     * Добавление животного на ферму
     * 
     * @param Cow|Chicken $animal Животное для добавления
     * @return void
     */
    public function addAnimal(Cow|Chicken $animal): void
    {
        if ($animal instanceof Cow) {
            $this->cows[] = $animal;
        } elseif ($animal instanceof Chicken) {
            $this->chickens[] = $animal;
        }
    }

    /**
     * Сбор продуктов со всех животных
     * 
     * @return void
     */
    public function collectProducts(): void
    {
        // Собираем молоко с коров
        foreach ($this->cows as $cow) {
            $this->milkCount += $cow->produceMilk();
        }

        // Собираем яйца с кур
        foreach ($this->chickens as $chicken) {
            $this->eggsCount += $chicken->layEgg();
        }
    }

    /**
     * Получение количества животных по типам
     * 
     * @return array Массив с количеством животных
     */
    public function getAnimalCounts(): array
    {
        return [
            'cows' => count($this->cows),
            'chickens' => count($this->chickens),
        ];
    }

    /**
     * Получение количества собранных продуктов
     * 
     * @return array Массив с количеством продуктов
     */
    public function getProductCounts(): array
    {
        return [
            'milk' => $this->milkCount,
            'eggs' => $this->eggsCount,
        ];
    }

    /**
     * Сброс счетчиков продуктов
     * 
     * @return void
     */
    public function resetProducts(): void
    {
        $this->milkCount = 0;
        $this->eggsCount = 0;
    }
} 