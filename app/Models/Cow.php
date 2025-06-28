<?php

namespace App\Models;

/**
 * Модель коровы
 * 
 * Представляет корову на ферме
 */
class Cow
{
    /**
     * Уникальный идентификатор коровы
     * 
     * @var int
     */
    private int $id;

    /**
     * Конструктор коровы
     * 
     * @param int $id Уникальный идентификатор
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Производство молока
     * 
     * @return int Количество произведенного молока
     */
    public function produceMilk(): int
    {
        // Корова производит 8-12 литров молока в день
        return rand(8, 12);
    }
} 