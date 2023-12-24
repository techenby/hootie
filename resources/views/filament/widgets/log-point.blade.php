<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <h2
                    class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white"
                >
                    Log Delta Point
                </h2>
            </div>

            {{ $this->createAction() }}

        </div>
    </x-filament::section>
    <x-filament-actions::modals />
</x-filament-widgets::widget>
