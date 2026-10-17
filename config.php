<?php
// config.php - Centrale configuratie
session_start();

define('DATA_DIR', __DIR__ . '/data/');

// Zorg dat data directory bestaat
if (!file_exists(DATA_DIR)) {
    mkdir(DATA_DIR, 0755, true);
}

// Initialiseer bestanden als ze niet bestaan
function initFile($filename, $defaultContent = []) {
    $path = DATA_DIR . $filename;
    if (!file_exists($path)) {
        file_put_contents($path, json_encode($defaultContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    return $path;
}

// Standaard woorden (Turks -> Nederlands) per categorie
$standaardWoorden = [
    "dieren" => [
        ["tr" => "Kedi", "nl" => "Kat", "emoji" => "🐱"],
        ["tr" => "Köpek", "nl" => "Hond", "emoji" => "🐶"],
        ["tr" => "Kuş", "nl" => "Vogel", "emoji" => "🐦"],
        ["tr" => "Balık", "nl" => "Vis", "emoji" => "🐟"],
        ["tr" => "At", "nl" => "Paard", "emoji" => "🐴"],
        ["tr" => "İnek", "nl" => "Koe", "emoji" => "🐮"],
        ["tr" => "Koyun", "nl" => "Schaap", "emoji" => "🐑"],
        ["tr" => "Tavşan", "nl" => "Konijn", "emoji" => "🐰"],
        ["tr" => "Fare", "nl" => "Muis", "emoji" => "🐭"],
        ["tr" => "Aslan", "nl" => "Leeuw", "emoji" => "🦁"],
        ["tr" => "Fil", "nl" => "Olifant", "emoji" => "🐘"],
        ["tr" => "Maymun", "nl" => "Aap", "emoji" => "🐵"],
    ],
    "kleuren" => [
        ["tr" => "Kırmızı", "nl" => "Rood", "emoji" => "🔴"],
        ["tr" => "Mavi", "nl" => "Blauw", "emoji" => "🔵"],
        ["tr" => "Yeşil", "nl" => "Groen", "emoji" => "🟢"],
        ["tr" => "Sarı", "nl" => "Geel", "emoji" => "🟡"],
        ["tr" => "Turuncu", "nl" => "Oranje", "emoji" => "🟠"],
        ["tr" => "Mor", "nl" => "Paars", "emoji" => "🟣"],
        ["tr" => "Siyah", "nl" => "Zwart", "emoji" => "⚫"],
        ["tr" => "Beyaz", "nl" => "Wit", "emoji" => "⚪"],
        ["tr" => "Pembe", "nl" => "Roze", "emoji" => "🩷"],
        ["tr" => "Kahverengi", "nl" => "Bruin", "emoji" => "🟤"],
    ],
    "eten" => [
        ["tr" => "Elma", "nl" => "Appel", "emoji" => "🍎"],
        ["tr" => "Muz", "nl" => "Banaan", "emoji" => "🍌"],
        ["tr" => "Portakal", "nl" => "Sinaasappel", "emoji" => "🍊"],
        ["tr" => "Üzüm", "nl" => "Druif", "emoji" => "🍇"],
        ["tr" => "Çilek", "nl" => "Aardbei", "emoji" => "🍓"],
        ["tr" => "Ekmek", "nl" => "Brood", "emoji" => "🍞"],
        ["tr" => "Peynir", "nl" => "Kaas", "emoji" => "🧀"],
        ["tr" => "Süt", "nl" => "Melk", "emoji" => "🥛"],
        ["tr" => "Yumurta", "nl" => "Ei", "emoji" => "🥚"],
        ["tr" => "Balık", "nl" => "Vis", "emoji" => "🐟"],
        ["tr" => "Pizza", "nl" => "Pizza", "emoji" => "🍕"],
        ["tr" => "Dondurma", "nl" => "Ijs", "emoji" => "🍦"],
    ],
    "familie" => [
        ["tr" => "Anne", "nl" => "Moeder", "emoji" => "👩"],
        ["tr" => "Baba", "nl" => "Vader", "emoji" => "👨"],
        ["tr" => "Kardeş", "nl" => "Broer", "emoji" => "👦"],
        ["tr" => "Kız kardeş", "nl" => "Zus", "emoji" => "👧"],
        ["tr" => "Büyükanne", "nl" => "Oma", "emoji" => "👵"],
        ["tr" => "Büyükbaba", "nl" => "Opa", "emoji" => "👴"],
        ["tr" => "Bebek", "nl" => "Baby", "emoji" => "👶"],
        ["tr" => "Aile", "nl" => "Familie", "emoji" => "👨‍👩‍👧"],
    ],
    "getallen" => [
        ["tr" => "Bir", "nl" => "Een", "emoji" => "1️⃣"],
        ["tr" => "İki", "nl" => "Twee", "emoji" => "2️⃣"],
        ["tr" => "Üç", "nl" => "Drie", "emoji" => "3️⃣"],
        ["tr" => "Dört", "nl" => "Vier", "emoji" => "4️⃣"],
        ["tr" => "Beş", "nl" => "Vijf", "emoji" => "5️⃣"],
        ["tr" => "Altı", "nl" => "Zes", "emoji" => "6️⃣"],
        ["tr" => "Yedi", "nl" => "Zeven", "emoji" => "7️⃣"],
        ["tr" => "Sekiz", "nl" => "Acht", "emoji" => "8️⃣"],
        ["tr" => "Dokuz", "nl" => "Negen", "emoji" => "9️⃣"],
        ["tr" => "On", "nl" => "Tien", "emoji" => "🔟"],
    ],
    "lichaam" => [
        ["tr" => "Baş", "nl" => "Hoofd", "emoji" => "🧠"],
        ["tr" => "Göz", "nl" => "Oog", "emoji" => "👁️"],
        ["tr" => "Kulak", "nl" => "Oor", "emoji" => "👂"],
        ["tr" => "Ağız", "nl" => "Mond", "emoji" => "👄"],
        ["tr" => "Burun", "nl" => "Neus", "emoji" => "👃"],
        ["tr" => "El", "nl" => "Hand", "emoji" => "✋"],
        ["tr" => "Ayak", "nl" => "Voet", "emoji" => "🦶"],
        ["tr" => "Saç", "nl" => "Haar", "emoji" => "💇"],
    ],
];

initFile('woorden.json', $standaardWoorden);
initFile('scores.json', new stdClass());
initFile('gebruikers.json', new stdClass());