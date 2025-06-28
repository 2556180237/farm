<?php

namespace App\Services;

use App\Models\Farm;
use App\Models\Cow;
use App\Models\Chicken;
use App\Exceptions\FarmException;

/**
 * Сервис для управления фермой
 * 
 * Предоставляет методы для работы с животными и продуктами фермы
 */
class FarmService
{
    /**
     * Конструктор сервиса
     * 
     * @param Farm $farm Модель фермы
     */
    public function __construct(private Farm $farm) {}

    /**
     * Добавление животного на ферму
     * 
     * @param Cow|Chicken $animal Животное для добавления
     * @return void
     */
    public function addAnimal(Cow|Chicken $animal): void
    {
        $this->farm->addAnimal($animal);
    }

    /**
     * Сбор продуктов со всех животных
     * 
     * @return void
     */
    public function collectProducts(): void
    {
        $this->farm->collectProducts();
    }

    /**
     * Получение количества животных по типам
     * 
     * @return array Массив с количеством животных
     */
    public function getAnimalCounts(): array
    {
        return $this->farm->getAnimalCounts();
    }

    /**
     * Получение количества собранных продуктов
     * 
     * @return array Массив с количеством продуктов
     */
    public function getProductCounts(): array
    {
        return $this->farm->getProductCounts();
    }

    /**
     * Сброс счетчиков продуктов
     * 
     * @return void
     */
    public function resetProducts(): void
    {
        $this->farm->resetProducts();
    }
}
