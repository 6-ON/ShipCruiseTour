<?php

use app\widgets\Widget;

?>
<div class="p-5 dark:bg-gray-900">
    <h1 class="text-3xl font-extrabold text-center md:text-5xl lg:text-6xl bg-clip-text text-transparent bg-gradient-to-r from-blue-700 via-purple-400 to-sky-500 capitalize">
        Choose a cruise</h1>
</div>

<div class="p-5 grid md :grid-cols-3 dark:bg-gray-900 gap-3 sm:grid-cols-2 grid-cols-1 justify-items-center">

    <?php
    foreach ($cruises as $c) {
        echo Widget::cruiseCard($c);
    }
    ?>
    <!--    <a href="#" data-popover-target="edit-delete" class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">-->
    <!--        <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/image//img-1.jpeg" alt="Cruise image">-->
    <!--        <div class="flex w-full flex-col justify-between p-4 leading-normal">-->
    <!--            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Royal Cruise</h5>-->
    <!--            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship:  <span class="text-sm font-medium">Default Ship</span></h5>-->
    <!--            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port:  <span class="text-sm font-medium">Default Ship</span></h5>-->
    <!--            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting:  <span class="text-sm font-medium">P1,P2,P3,P4</span></h5>-->
    <!--        </div>-->
    <!--    </a>-->
    <?php if (true): ?>
        <div data-popover id="edit-delete" role="tooltip"
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
        </div>
    <?php endif; ?>

    <a href="#"
       class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg"
             src="/assets/image//img-1.jpeg" alt="Cruise image">
        <div class="flex w-full flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Royal Cruise</h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship: <span
                        class="text-sm font-medium">Default Ship</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port: <span
                        class="text-sm font-medium">Default Ship</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting: <span
                        class="text-sm font-medium">P1,P2,P3,P4</span></h5>
        </div>
    </a>

    <a href="#"
       class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg"
             src="/assets/image//img-1.jpeg" alt="Cruise image">
        <div class="flex w-full flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Royal Cruise</h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship: <span
                        class="text-sm font-medium">Default Ship</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port: <span
                        class="text-sm font-medium">Default Ship</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting: <span
                        class="text-sm font-medium">P1,P2,P3,P4</span></h5>
        </div>
    </a>

    <a href="#"
       class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover h-full w-full rounded-t-lg md:rounded-none md:rounded-l-lg"
             src="/assets/image//img-1.jpeg" alt="Cruise image">
        <div class="flex w-full flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Royal Cruise</h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Ship: <span
                        class="text-sm font-medium">Default Ship</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Starting Port: <span
                        class="text-sm font-medium">Default Ship</span></h5>
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Visiting: <span
                        class="text-sm font-medium">P1,P2,P3,P4</span></h5>
        </div>
    </a>

</div>


<?php if (true): ?>

    <!-- delete modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button"
                            class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No, cancel
                    </button>
                    <button type="submit"
                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- create update modal-->
    <div id="Modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semi bold text-gray-900 dark:text-white">
                        Edit Cruise
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="Modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="#" method="post">
                    <div class="flex flex-col gap-4 mb-4">
                        <div>
                            <label for="label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">label</label>
                            <input type="text" name="name" id="label"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Type Cruise name" required="">
                        </div>
                        <div>
                            <label for="ship"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ship</label>
                            <select id="ship" name="shipId"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Ship</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div>
                            <label for="start_port"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Starting
                                Port</label>
                            <select id="start_port" name="startPort"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Port</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div>

                            <button id="portsButton" data-dropdown-toggle="ports" data-dropdown-placement="bottom"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">Visiting
                                <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="ports" class="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700">
                                <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownSearchButton">
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-11" name="visiting" type="checkbox" value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-11"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie
                                                Green</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input checked id="checkbox-item-12" name="visiting" type="checkbox"
                                                   value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-12"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese
                                                Leos</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-13" name="visiting" type="checkbox" value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-13"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Michael
                                                Gough</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-14" name="visiting" type="checkbox" value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-14"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Robert
                                                Wall</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-15" name="visiting" type="checkbox" value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-15"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Joseph
                                                Mcfall</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-16" name="visiting" type="checkbox" value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-16"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Leslie
                                                Livingston</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="checkbox-item-17" name="visiting" type="checkbox" value=""
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="checkbox-item-17"
                                                   class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Roberta
                                                Casas</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div>
                            <label for="cap"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Period </label>

                            <div date-rangepicker class="flex items-center justify-between">
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input name="start" type="text"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input name="end" type="text"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="Select date end">
                                </div>
                            </div>

                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                   aria-describedby="file_input_help" id="ship-img" accept="image/jpeg" type="file">
                        </div>
                    </div>
                    <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Apply Changes
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- create button-->
    <div class="fixed bottom-2 right-5">
        <button type="button" id="createButton" data-modal-toggle="Modal"
                class="flex justify-center items-center w-14 h-14 text-white bg-blue-700 rounded-full hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg aria-hidden="true" class="w-8 h-8 transition-transform group-hover:rotate-45" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span class="sr-only">create a cruise</span>
        </button>
    </div>

<?php endif; ?>

<script src="https://unpkg.com/flowbite@1.5.5/dist/datepicker.js"></script>
<script src="scripts/CRUD.js"></script>
