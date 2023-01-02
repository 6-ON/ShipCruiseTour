<?php

namespace app\widgets;

use app\core\Model;

class ReservationCard
{

    public Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __toString(): string
    {
        return sprintf('<div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">

        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">%s</h5>
            <h6 class="mb-2 dark:text-white">
                <span class="font-semibold">Room type: </span>%s
            </h6>
            <h6 class="mb-7 dark:text-white">
                <span class="font-semibold">Price: </span>%s
            </h6>
            <div class="flex gap-8 flex-row p-2 justify-center font-semibold">
                <button  type="button" id="deleteButton" data-modal-toggle="deleteModal"
                        class="text-red-400 hover:text-red-700" value="%s">Cancel
                </button>
            </div>
        </div>
    </div>
',
            $this->model->cruise,
            $this->model->type,
            $this->model->price,
            $this->model->reservationId
        );
    }
}