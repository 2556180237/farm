<?php

namespace App\Enums;

/**
 * Перечисление типов животных
 *
 * Определяет доступные типы животных на ферме
 */
enum Animal: string
{
    /**
     * Корова
     */
    case COW = 'cow';

    /**
     * Курица
     */
    case CHICKEN = 'chicken';

    /**
     * Получение всех значений перечисления
     *
     * @return array Массив значений
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Получение названия типа животного
     *
     * @return string Название на русском языке
     */
    public function label(): string
    {
        return match($this) {
            self::COW => 'Корова',
            self::CHICKEN => 'Курица',
        };
    }
}
