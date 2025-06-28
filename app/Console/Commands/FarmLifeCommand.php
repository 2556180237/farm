<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\FarmController;

/**
 * Команда для симуляции жизни на ферме
 *
 */
class FarmLifeCommand extends Command
{
    /**
     * Сигнатура команды
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * Описание команды
     *
     * @var string
     */
    protected $description = 'Симуляция жизни на ферме';

    /**
     * Выполнение команды
     *
     * @param FarmController $controller Контроллер фермы
     * @return int
     */
    public function handle(FarmController $controller)
    {
        $controller->handle($this->output);
        return 0;
    }
}
