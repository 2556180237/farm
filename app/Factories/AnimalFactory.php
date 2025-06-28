<?php

namespace App\Factories;

use App\Interfaces\AnimalFactoryInterface;
use App\Models\Cow;
use App\Models\Chicken;
use App\Enums\Animal;
use App\Exceptions\FarmException;

/**
 * Фабрика для создания животных
 * 
 * Отвечает за создание объектов коров и кур
 */
class AnimalFactory implements AnimalFactoryInterface
{
    /**
     * Создание животного по типу
     * 
     * @param string $type Тип животного (cow или chicken)
     * @param int $id Уникальный идентификатор животного
     * @return Cow|Chicken Созданное животное
     * @throws FarmException Если указан неверный тип животного
     */
    public function create(string $type, int $id): Cow|Chicken
    {
        return match ($type) {
            Animal::COW->value => new Cow($id),
            Animal::CHICKEN->value => new Chicken($id),
            default => throw new FarmException("Неверный тип животного: $type"),
        };
    }
}
