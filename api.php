<?php
// api.php - API endpoints
require_once 'config.php';

header('Content-Type: application/json; charset=utf-8');

$action = $_GET['action'] ?? $_POST['action'] ?? '';

function loadJson($file) {
    $path = DATA_DIR . $file;
    if (!file_exists($path)) return [];
    return json_decode(file_get_contents($path), true) ?: [];
}

function saveJson($file, $data) {
    $path = DATA_DIR . $file;
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function getUserId() {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['user_id'] = 'user_' . uniqid();
    }
    return $_SESSION['user_id'];
}

switch ($action) {
    case 'getCategories':
        $woorden = loadJson('woorden.json');
        $categories = [];
        foreach ($woorden as $key => $items) {
            $categories[] = [
                'id' => $key,
                'naam' => ucfirst($key),
                'aantal' => count($items),
                'emoji' => getCategoryEmoji($key)
            ];
        }
        echo json_encode(['success' => true, 'categories' => $categories]);
        break;

    case 'getWords':
        $cat = $_GET['category'] ?? '';
        $woorden = loadJson('woorden.json');
        if (!isset($woorden[$cat])) {
            echo json_encode(['success' => false, 'error' => 'Categorie niet gevonden']);
            break;
        }
        echo json_encode(['success' => true, 'words' => $woorden[$cat]]);
        break;

    case 'saveScore':
        $input = json_decode(file_get_contents('php://input'), true);
        $userId = getUserId();
        $scores = loadJson('scores.json');
        
        if (!isset($scores[$userId])) {
            $scores[$userId] = [
                'totaal' => 0,
                'juist' => 0,
                'fout' => 0,
                'levels' => [],
                'categorieën' => [],
                'naam' => $input['naam'] ?? 'Speler'
            ];
        }
        
        $scores[$userId]['naam'] = $input['naam'] ?? $scores[$userId]['naam'];
        $scores[$userId]['totaal'] += $input['punten'] ?? 0;
        $scores[$userId]['juist'] += $input['juist'] ?? 0;
        $scores[$userId]['fout'] += $input['fout'] ?? 0;
        
        // Update per categorie
        $cat = $input['categorie'] ?? 'onbekend';
        if (!isset($scores[$userId]['categorieën'][$cat])) {
            $scores[$userId]['categorieën'][$cat] = ['juist' => 0, 'fout' => 0];
        }
        $scores[$userId]['categorieën'][$cat]['juist'] += $input['juist'] ?? 0;
        $scores[$userId]['categorieën'][$cat]['fout'] += $input['fout'] ?? 0;
        
        // Update level
        $level = $input['level'] ?? 1;
        if (!isset($scores[$userId]['levels'][$level])) {
            $scores[$userId]['levels'][$level] = ['sterren' => 0, 'besteScore' => 0];
        }
        $nieuwePunten = $input['punten'] ?? 0;
        if ($nieuwePunten > $scores[$userId]['levels'][$level]['besteScore']) {
            $scores[$userId]['levels'][$level]['besteScore'] = $nieuwePunten;
        }
        // Sterren op basis van prestatie
        $sterren = min(3, floor(($input['juist'] ?? 0) / 3));
        if ($sterren > $scores[$userId]['levels'][$level]['sterren']) {
            $scores[$userId]['levels'][$level]['sterren'] = $sterren;
        }
        
        saveJson('scores.json', $scores);
        echo json_encode(['success' => true, 'score' => $scores[$userId]]);
        break;

    case 'getScore':
        $userId = getUserId();
        $scores = loadJson('scores.json');
        if (!isset($scores[$userId])) {
            $scores[$userId] = [
                'totaal' => 0, 'juist' => 0, 'fout' => 0,
                'levels' => [], 'categorieën' => [], 'naam' => 'Speler'
            ];
        }
        echo json_encode(['success' => true, 'score' => $scores[$userId]]);
        break;

    case 'getLeaderboard':
        $scores = loadJson('scores.json');
        $board = [];
        foreach ($scores as $uid => $data) {
            $board[] = [
                'naam' => $data['naam'] ?? 'Speler',
                'totaal' => $data['totaal'] ?? 0,
                'juist' => $data['juist'] ?? 0,
            ];
        }
        usort($board, fn($a, $b) => $b['totaal'] - $a['totaal']);
        echo json_encode(['success' => true, 'leaderboard' => array_slice($board, 0, 10)]);
        break;

    case 'resetScore':
        $userId = getUserId();
        $scores = loadJson('scores.json');
        unset($scores[$userId]);
        saveJson('scores.json', $scores);
        echo json_encode(['success' => true]);
        break;

    default:
        echo json_encode(['success' => false, 'error' => 'Onbekende actie']);
}

function getCategoryEmoji($key) {
    $map = [
        'dieren' => '🐾',
        'kleuren' => '🎨',
        'eten' => '🍎',
        'familie' => '👨‍👩‍👧',
        'getallen' => '🔢',
        'lichaam' => '🦶'
    ];
    return $map[$key] ?? '📚';
}