<?php

namespace App\Enums;

/**
 * Перечисление типов продуктов фермы
 *
 */
enum Product: string
{
    /**
     * Молоко
     */
    case MILK = 'milk';

    /**
     * Яйцо
     */
    case EGG = 'egg';

    /**
     * Получение всех значений перечисления
     *
     * @return array Массив строковых значений ['milk', 'egg']
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Получение названия продукта на русском языке
     *
     * @return string Название продукта на русском языке
     */
    public function label(): string
    {
        return match($this) {
            self::MILK => 'Молоко',
            self::EGG => 'Яйцо',
        };
    }
}
