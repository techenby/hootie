import './bootstrap'

const url = new URL(window.location.href)
if (url.searchParams.get('theme') !== null) {
    localStorage.theme = url.searchParams.get('theme')
} else {
    localStorage.removeItem('theme')
}

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}
