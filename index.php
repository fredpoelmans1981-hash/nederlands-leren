<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<link rel="manifest" href="manifest.json">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>🇳🇱 Nederlands Leren - Türkçe</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div id="app">
    <!-- Header -->
    <header class="header">
        <button id="btnHome" class="icon-btn" title="Home">🏠</button>
        <h1 id="headerTitle">Nederlands Leren</h1>
        <button id="btnSound" class="icon-btn" title="Geluid aan/uit">🔊</button>
    </header>

    <!-- Voortgangsbalk -->
    <div class="progress-container">
        <div class="progress-info">
            <span>Level <span id="currentLevel">1</span></span>
            <span>⭐ <span id="totalStars">0</span>/30</span>
            <span>💎 <span id="totalScore">0</span></span>
        </div>
        <div class="progress-bar">
            <div id="progressFill" class="progress-fill"></div>
        </div>
    </div>

    <!-- Scherm: Home / Categorieën -->
    <main id="screen-home" class="screen active">
        <h2 class="screen-title">Kies een categorie 📚</h2>
        
        <!-- Knop om geluid te activeren -->
        <button id="btnActivateSound" style="background:#4caf50; color:white; padding:10px 20px; border:none; border-radius:8px; cursor:pointer; margin-bottom:20px; font-weight:bold; font-size:16px; width:100%;">
            🔊 Activeer Geluid (Klik hier eerst)
        </button>

        <div id="categories" class="categories-grid"></div>
        
        <div class="menu-buttons">
            <button id="btnLeaderboard" class="menu-btn">🏆 Scorebord</button>
            <button id="btnStats" class="menu-btn">📊 Mijn Voortgang</button>
        </div>
    </main>

    <!-- Scherm: Spel -->
    <main id="screen-game" class="screen">
        <div class="game-info">
            <span id="gameCategory"></span>
            <span id="gameProgress">1 / 10</span>
        </div>
        
        <div id="questionCard" class="question-card" title="Tik om opnieuw te horen">
            <div id="questionEmoji" class="question-emoji">🐱</div>
            <div id="questionText" class="question-text">Kedi</div>
            <div class="question-hint">Kies de juiste Nederlandse vertaling</div>
        </div>
        
        <div id="answers" class="answers-grid"></div>
        
        <div id="feedback" class="feedback"></div>
    </main>

    <!-- Scherm: Resultaat -->
    <main id="screen-result" class="screen">
        <div class="result-card">
            <h2 id="resultTitle">Goed gedaan! 🎉</h2>
            <div id="resultStars" class="result-stars">⭐⭐⭐</div>
            <p id="resultScore" class="result-score">0 punten</p>
            <p id="resultDetails" class="result-details"></p>
            <button id="btnPlayAgain" class="btn-primary">🔄 Opnieuw spelen</button>
            <button id="btnBackHome" class="btn-secondary">🏠 Terug naar home</button>
        </div>
    </main>

    <!-- Scherm: Leaderboard -->
    <main id="screen-leaderboard" class="screen">
        <h2 class="screen-title">🏆 Scorebord</h2>
        <div id="leaderboardList" class="leaderboard-list"></div>
        <button class="btn-secondary" onclick="showScreen('home')">🏠 Terug</button>
    </main>

    <!-- Scherm: Statistieken -->
    <main id="screen-stats" class="screen">
        <h2 class="screen-title">📊 Mijn Voortgang</h2>
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-value" id="statTotaal">0</div>
                <div class="stat-label">Totaal punten</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="statJuist">0</div>
                <div class="stat-label">Juiste antwoorden</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="statFout">0</div>
                <div class="stat-label">Foute antwoorden</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="statAccuraatheid">0%</div>
                <div class="stat-label">Nauwkeurigheid</div>
            </div>
        </div>
        <h3>Categorieën</h3>
        <div id="categoryStats" class="category-stats"></div>
        <button class="btn-secondary" onclick="showScreen('home')">🏠 Terug</button>
        <button class="btn-danger" id="btnReset">🗑️ Reset mijn scores</button>
    </main>
</div>

<!-- Confetti container -->
<div id="confetti" class="confetti-container"></div>

<script src="assets/words.js"></script>
<script src="assets/app.js"></script>
</body>
</html>