import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Clusters/Delta/**/*.php',
        './resources/views/filament/clusters/delta/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
