<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Enums\Animal;

class AnimalEnumTest extends TestCase
{
    public function test_enum_has_correct_values(): void
    {
        $this->assertEquals('cow', Animal::COW->value);
        $this->assertEquals('chicken', Animal::CHICKEN->value);
    }

    public function test_values_method_returns_all_values(): void
    {
        $values = Animal::values();

        $this->assertIsArray($values);
        $this->assertCount(2, $values);
        $this->assertContains('cow', $values);
        $this->assertContains('chicken', $values);
    }

    public function test_cow_label_is_correct(): void
    {
        $this->assertEquals('Корова', Animal::COW->label());
    }

    public function test_chicken_label_is_correct(): void
    {
        $this->assertEquals('Курица', Animal::CHICKEN->label());
    }

    public function test_all_animals_have_russian_labels(): void
    {
        foreach (Animal::cases() as $animal) {
            $label = $animal->label();
            $this->assertNotEmpty($label);
            $this->assertIsString($label);
        }
    }
}
