<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <h1 class="mb-2">Delta</h1>
            <dl class="grid grid-cols-1 overflow-hidden bg-white divide-y divide-gray-200 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-900 md:grid-cols-3 md:divide-y-0 md:divide-x">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-base font-normal text-gray-900 dark:text-gray-200">
                        Temperature Change
                    </dt>
                    <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                        <div class="flex items-baseline text-2xl font-semibold text-indigo-600 dark:text-indigo-400">
                            {{ $todayTemp }}
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                from {{ $yesterdayTemp }}
                            </span>
                        </div>

                        @if($todayTemp > $yesterdayTemp)
                        <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                            <svg class="self-center flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ abs($todayTemp - $yesterdayTemp) }}
                        </div>
                        @else
                        <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                            <svg class="self-center flex-shrink-0 w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ abs($todayTemp - $yesterdayTemp) }}
                        </div>
                        @endif
                    </dd>
                </div>

                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-base font-normal text-gray-900 dark:text-gray-200">
                        Precipitation Change
                    </dt>
                    <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                        <div class="flex items-baseline text-2xl font-semibold text-indigo-600 dark:text-indigo-400">
                            {{ $todayWeather['main'] }}
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                from {{ $yesterdayWeather['main'] }}
                            </span>
                        </div>
                    </dd>
                </div>

                <div class="grid grid-cols-2 divide-x divide-gray-200 dark:divide-gray-900">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900 dark:text-gray-200">
                            Joint Pain
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600 dark:text-indigo-400">
                                {{ $jointPain ? 'Likely' : 'Not likely' }}
                            </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900 dark:text-gray-200">
                            Muscle Pain
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600 dark:text-indigo-400">
                                {{ $musclePain ? 'Likely' : 'Not likely' }}
                            </div>
                        </dd>
                    </div>
                </div>
            </dl>
        </div>

        <form wire:submit.prevent="save" class="max-w-3xl mx-auto space-y-6">
            <div>
                <label class="text-base font-medium text-gray-900 dark:text-gray-200">Joint Pain</label>
                <fieldset class="mt-1">
                    <legend class="sr-only">Joint Pain</legend>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="joint-pain-none" wire:model="form.joint" type="radio" value="none" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="joint-pain-none" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                None
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="joint-pain-mild" wire:model="form.joint" type="radio" value="mild" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="joint-pain-mild" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Mild
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="joint-pain-moderate" wire:model="form.joint" type="radio" value="moderate" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="joint-pain-moderate" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Moderate
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="joint-pain-severe" wire:model="form.joint" type="radio" value="severe" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="joint-pain-severe" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Severe
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div>
                <label class="text-base font-medium text-gray-900 dark:text-gray-200">Muscle Pain</label>
                <fieldset class="mt-1">
                    <legend class="sr-only">Muscle Pain</legend>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="muscle-pain-none" wire:model="form.muscle" type="radio" value="none" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="muscle-pain-none" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                None
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="muscle-pain-mild" wire:model="form.muscle" type="radio" value="mild" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="muscle-pain-mild" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Mild
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="muscle-pain-moderate" wire:model="form.muscle" type="radio" value="moderate" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="muscle-pain-moderate" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Moderate
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="muscle-pain-severe" wire:model="form.muscle" type="radio" value="severe" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="muscle-pain-severe" class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
                                Severe
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div>
                <label for="notes" class="text-base font-medium text-gray-900 dark:text-gray-200">Notes</label>
                <textarea name="notes" id="notes" wire:model="form.notes" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:text-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>

                @if($saved)
                <span class="ml-4 text-gray-700 dark:text-gray-400">Saved</span>
                @endif
            </div>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
