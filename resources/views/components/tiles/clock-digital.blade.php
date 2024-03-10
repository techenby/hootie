<x-tile class="flex items-center justify-center relative" :width="$data['width']" :height="$data['height']">
    <div class="flex-auto text-sm font-semibold absolute top-0 left-0 p-2">{{ now()->timezone($data['timezone'])->format('T') }}</div>
    <div
        x-data="{
            timezone: @js($data['timezone']),
            now: null,
            time: null,
            date: null,
            init() {
                let now = new Date()
                this.time = now.toLocaleTimeString('en-US', { timeZone: this.timezone, timeStyle: 'short', })
                this.date = now.toLocaleDateString('en-US', { timeZone: this.timezone, dateStyle: 'full', })
                setInterval(() => {
                    let now = new Date()
                    this.time = now.toLocaleTimeString('en-US', { timeZone: this.timezone, timeStyle: 'short', })
                    this.date = now.toLocaleDateString('en-US', { timeZone: this.timezone, dateStyle: 'full', })
                }, 1000);
            }
        }"
    >
        <p x-text="time" class="text-4xl font-bold mb-2 text-center dark:text-gray-200"></p>
        <p x-text="date" class="text-sm text-center"></p>
    </div>
</x-tile>
