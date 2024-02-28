<?php

use function Livewire\Volt\{layout, state};

state([
    'title' => 'Lorem ipsum',
    'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.'
]);

$save = function () {
    $rules = [
      'title' => ['required', 'string', 'max:255'],
      'description' => ['required', 'string'],
    ];

    $this->validate($rules);
};

$handleModalButton = function () {
    $this->dispatch('mediable:open', id: 'description');
};

layout('layouts.app');
?>

<div class="py-4 lg:py-6">
    <div class="container mx-auto px-4 mb-4">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col justify-start">
                        <h1 class="flex flex-col justify-center text-lg text-gray-600 font-bold">Mediable Demonstration</h1>
                        <ul class="flex flex-row items-center justify-start flex-wrap list-none space-x-1 font-normal text-sm p-0 m-0">
                            <li class="text-gray-400">
                                <a href="{{route('dashboard')}}" class="text-gray-400 hover:text-blue-400">Dashboard</a>
                            </li>
                            <li class="text-gray-400">
                                <span class="text-gray-400">&dash;</span>
                            </li>
                            <li class="text-gray-400">Mediable Demonstration</li>
                        </ul>
                    </div>
                    <div class="flex items-center space-x-2"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4">
        <div class="flex gap-x-8 -mx-2">
            <div class="w-full md:w-2/3">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Available Options
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Add a few paragraphs of text then inject attachments at cursor position.
                            </p>
                        </header>
                        <form wire:submit="save" class="mt-6 space-y-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="title">
                                    Title
                                </label>
                                <input type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="title" wire:model="title">
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="description">
                                    Description
                                </label>
                                <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="description" rows="5" wire:model="description"></textarea>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Save
                                </button>
                                <button type="button" class="inline-flex items-center px-4 py-2 bg-pink-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-pink-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" wire:click.prevent="handleModalButton()">
                                    Insert Media
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <livewire:images />
                </div>
            </div>
        </div>
    </div>

    <livewire:mediable fullScreen />

</div>