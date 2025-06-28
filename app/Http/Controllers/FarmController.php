<?php

namespace App\Http\Controllers;

use App\Services\FarmService;
use App\Providers\FarmProvider;
use App\Enums\Animal;
use App\Enums\Product;
use Illuminate\Console\OutputStyle;

/**
 * Контроллер для управления фермой
 */
class FarmController
{
    /**
     * Конструктор контроллера
     *
     * @param FarmService $farmService Сервис фермы
     * @param FarmProvider $farmProvider Провайдер животных
     */
    public function __construct(
        private FarmService $farmService,
        private FarmProvider $farmProvider
    ) {}

    /**
     * Основной метод обработки симуляции фермы
     *
     * @param OutputStyle $output Объект для вывода в консоль
     * @return void
     */
    public function handle(OutputStyle $output)
    {
        $this->addAnimals('Первые животные', $this->farmProvider->getInitialAnimals(), $output);

        $this->simulateWeek('Неделя 1', $output);

        $this->addAnimals('Дополнительные животные', $this->farmProvider->getAdditionalAnimals(), $output);

        $this->simulateWeek('Неделя 2', $output);
    }

    /**
     * Добавление животных на ферму
     *
     * @param string $title Заголовок для вывода
     * @param array $animals Массив животных для добавления
     * @param OutputStyle $output Объект для вывода в консоль
     * @return void
     */
    private function addAnimals(string $title, array $animals, OutputStyle $output): void
    {
        foreach ($animals as $animal) {
            $this->farmService->addAnimal($animal);
        }

        $output->writeln("$title добавлены:");
        $this->displayAnimalCounts($output);
    }

    /**
     * Симуляция недели на ферме
     *
     * @param string $weekTitle Заголовок недели
     * @param OutputStyle $output Объект для вывода в консоль
     * @return void
     */
    private function simulateWeek(string $weekTitle, OutputStyle $output): void
    {
        $this->farmService->resetProducts();

        $output->writeln("$weekTitle производство:");

        // Собираем продукты в течение 7 дней
        for ($day = 1; $day <= 7; $day++) {
            $this->farmService->collectProducts();
        }

        $this->displayProductCounts($output);
    }

    /**
     * Отображение количества животных
     *
     * @param OutputStyle $output Объект для вывода в консоль
     * @return void
     */
    private function displayAnimalCounts(OutputStyle $output): void
    {
        $counts = $this->farmService->getAnimalCounts();

        if (isset($counts['cows'])) {
            $output->writeln(Animal::COW->label() . ": " . $counts['cows']);
        }
        if (isset($counts['chickens'])) {
            $output->writeln(Animal::CHICKEN->label() . ": " . $counts['chickens']);
        }
    }

    /**
     * Отображение количества продуктов
     *
     * @param OutputStyle $output Объект для вывода в консоль
     * @return void
     */
    private function displayProductCounts(OutputStyle $output): void
    {
        $counts = $this->farmService->getProductCounts();

        if (isset($counts['milk'])) {
            $output->writeln(Product::MILK->label() . ": " . $counts['milk']);
        }
        if (isset($counts['eggs'])) {
            $output->writeln(Product::EGG->label() . ": " . $counts['eggs']);
        }
    }
}
