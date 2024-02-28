<?php

use function Livewire\Volt\{state, on};

state([
    'currentItem' => 0,
    'items' => []
]);

on(['mediable:on' => function ($files) {
    $imageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/avif', 'image/bmp'];

    $images = [];
    foreach ($files as $file) {
        if (in_array($file['file_type'], $imageTypes)) {
            $images[] = [
                'url' => $file['file_url'],
                'title' => $file['title']
            ];
        }
    }

    $this->items = $images;
}]);

$showPrevItem = function () {
    $this->currentItem--;

    if ($this->currentItem < 0) {
        $this->currentItem = count($this->items) - 1;
    }
};

$showNextItem = function () {
    $this->currentItem++;

    if ($this->currentItem == count($this->items)) {
        $this->currentItem = 0;
    }
};

$change = function () {
    $this->dispatch('mediable:open');
};

$remove = function () {
    $this->items = [];
};

?>

<div class="relative">
    <div class="flex flex-col mb-5">
        <div class="relative">
            @forelse ($items as $index => $item)
            <img src="{{$item['url']}}" @class(['item hidden', '!block'=> $index == $currentItem]) title="{{$item['title']}}" />
            @empty
            <img src="http://placehold.it/1280x720">
            @endforelse
            <div class="bg-black w-6 h-12 absolute top-1/2 transform -translate-y-1/2 cursor-pointer z-10 left-0 ml-2.5" id="prev" @click="$wire.showPrevItem()"></div>
            <div class="bg-black w-6 h-12 absolute top-1/2 transform -translate-y-1/2 cursor-pointer z-10 right-0 mr-2.5" id="next" @click="$wire.showNextItem()"></div>
        </div>
    </div>
    <div class="mb-4">
        <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" wire:click="change">Change</button>
        @if (count($items) > 1)
        <button class="inline-flex items-center px-4 py-2 bg-pink-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-pink-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" wire:click="remove">Remove</button>
        @endif
    </div>
</div>