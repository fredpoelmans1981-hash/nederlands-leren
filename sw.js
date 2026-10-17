const CACHE_NAME = 'nl-leren-v1';
const ASSETS = [
  './',
  './index.php',
  './assets/style.css',
  './assets/app.js',
  './assets/words.js',
  './manifest.json'
];

self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(ASSETS))
  );
});

self.addEventListener('fetch', (e) => {
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request))
  );
});