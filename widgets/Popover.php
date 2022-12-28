<?php

namespace app\widgets;

class Popover
{
    public function __toString(): string
    {
        return '<div data-popover id="ed-popover" role="tooltip"
             class="edit-button absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">

            <div class="flex gap-8 flex-row p-2 justify-center font-semibold  ">
                <button type="button" id="deleteButton" data-modal-toggle="deleteModal"
                        class="text-red-400 hover:text-red-700" value="idShip">Delete
                </button>
                <button type="button" data-modal-toggle="Modal" class="text-amber-400 hover:text-amber-700"
                        value="idShip">Edit
                </button>
            </div>
            <div data-popper-arrow></div>
        </div>';
    }
}