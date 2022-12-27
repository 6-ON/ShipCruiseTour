<?php

namespace app\widgets;


use app\core\Model;
use app\models\Passage;

class CruiseCard
{

    public Model $model;
    public array $ports;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->ports = array_map(fn($port) => $port->label, Passage::getPorts($this->model->id));
    }

    public function __toString(): string
    {
        return sprintf('<a href="%s" data-popover-target="popover-id-%s" class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/image/%s" alt="Cruise image">
        <div class="flex w-full flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">%s</h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting:  <span class="text-sm font-medium">%s</span></h5>
        </div>
    </a>
    ',
            '/link',
            $this->model->id,
        $this->model->image,
        $this->model->label,
        $this->model->ship,
        $this->model->startPortName,
        implode(', ',$this->ports)


        );
    }
}