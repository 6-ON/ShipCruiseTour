<?php

namespace app\widgets;


use app\core\Model;
use app\models\Passage;
use app\models\User;

class CruiseCard
{

    public Model $model;
    public array $ports;
    private string $format = '';

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->ports = array_map(fn($port) => $port->label, Passage::getPorts($this->model->id));
        if (User::isAdmin()) {
            $this->format = sprintf('<div class="cruise-card flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <a href="/room?cruise=%s" class="h-full w-full">
            <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/image/%s" alt="Cruise image">
        </a>
        <div class="flex w-full flex-col justify-between p-4 leading-normal">
        <a href="/room?cruise=%s">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">%s</h5>
        </a>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Date:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting:  <span class="text-sm font-medium">%s</span></h5>
            <div class="flex gap-8 flex-row p-2 justify-end font-semibold  ">
                <button type="button" data-modal-toggle="deleteModal"
                        class="text-red-400 hover:text-red-700" value="%s">Delete
                </button>
                <button type="button" data-modal-toggle="Modal" class="edit-button text-amber-400 hover:text-amber-700"
                        value="%s">Edit
                </button>
            </div>
        </div>
    </div>
    ',
                $this->model->id,
                $this->model->image,
                $this->model->id,
                $this->model->label,
                $this->model->ship,
                $this->model->startPortName,
                $this->model->startDate,
                implode(', ', $this->ports),
                $this->model->id,
                $this->model->id,

            );
        } else {
            $this->format = sprintf('<div class="cruise-card flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <a href="/room?cruise=%s" class="h-full w-full">
            <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/image/%s" alt="Cruise image">
        </a>
        <div class="flex w-full flex-col justify-between p-4 leading-normal">
        <a href="/room?cruise=%s">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">%s</h5>
        </a>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Date:  <span class="text-sm font-medium">%s</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting:  <span class="text-sm font-medium">%s</span></h5>
        </div>
    </div>
    ',
                $this->model->id,
                $this->model->image,
                $this->model->id,
                $this->model->label,
                $this->model->ship,
                $this->model->startPortName,
                $this->model->startDate,
                implode(', ', $this->ports)

            );
        }

    }

    public function __toString(): string
    {
        return $this->format;
    }
}