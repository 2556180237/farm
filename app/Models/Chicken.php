<?php

namespace App\Models;

/**
 * Модель курицы
 * 
 * Представляет курицу на ферме
 */
class Chicken
{
    /**
     * Уникальный идентификатор курицы
     * 
     * @var int
     */
    private int $id;

    /**
     * Конструктор курицы
     * 
     * @param int $id Уникальный идентификатор
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Несение яиц
     * 
     * @return int Количество снесенных яиц
     */
    public function layEgg(): int
    {
        // Курица несет 0-1 яйцо в день (70% вероятность)
        return rand(0, 100) <= 70 ? 1 : 0;
    }
} 