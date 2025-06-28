<?php

namespace App\Interfaces;

use App\Models\Cow;
use App\Models\Chicken;

/**
 * Интерфейс фабрики животных
 *
 */
interface AnimalFactoryInterface
{
    /**
     * Создание животного по типу
     *
     * @param string $type Тип животного
     * @param int $id Уникальный идентификатор животного
     * @return Cow|Chicken Созданное животное
     */
    public function create(string $type, int $id): Cow|Chicken;
}
