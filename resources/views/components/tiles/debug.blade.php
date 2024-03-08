<x-tile :width="$data['width']" :height="$data['height']">
    <div x-data="{ innerWidth: window.innerWidth, innerHeight: window.innerHeight, outerWidth: window.outerWidth, outerHeight: window.outerHeight, theme: localStorage.theme }">
        <dl>
            <dt>Inner Width</dt>
            <dd x-text="innerWidth"></dd>
            <dt>Inner Height</dt>
            <dd x-text="innerHeight"></dd>
            <dt>Outer Width</dt>
            <dd x-text="outerWidth"></dd>
            <dt>Outer Height</dt>
            <dd x-text="outerHeight"></dd>
            <dt>Theme</dt>
            <dd x-text="theme"></dd>
        </dl>
    </div>
</x-tile>
