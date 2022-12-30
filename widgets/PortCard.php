<?php

namespace app\widgets;


use app\core\Model;

class PortCard
{

    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __toString(): string
    {
        return sprintf('<div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="/cruise?port=%s">
            <img class="rounded-t-lg" src="/assets/image/%s" alt="" />
        </a>
        <div class="p-5">
            <a href="/cruise?port=%s">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">%s</h5>
            </a>

            <a href="/cruise?port=%s" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <div class="flex gap-8 flex-row p-2 justify-end font-semibold">
                <button type="button" id="deleteButton" data-modal-toggle="deleteModal"
                        class="text-red-400 hover:text-red-700" value="%s">Delete
                </button>
                <button type="button"  data-modal-toggle="Modal" class="edit-button edit-button text-amber-400 hover:text-amber-700"
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
        $this->model->id,
        $this->model->id,
        $this->model->id,

        );
    }
}