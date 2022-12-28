<?php
/* @var Exception $exception */
?>


<section class="bg-white h-screen flex justify-center items-center dark:bg-gray-900">
    <div class="text-center">
        <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-red-400 dark:text-white"><?= $exception->getCode() ?></h1>
        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Error. <?= $exception->getMessage() ?></p>
        <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that page. You'll
            find lots to explore on the home page. </p>
        <a href="/"
           class="inline-flex text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back
            to Homepage</a>
    </div>
</section>