// app.js - Nederlands Leren App

const API = 'api.php';
let state = {
    categories: [],
    currentCategory: null,
    currentWords: [],
    quizWords: [],
    currentIndex: 0,
    score: 0,
    juist: 0,
    fout: 0,
    level: 1,
    soundOn: true,
    totalStars: 0,
    totalScore: 0,
    userScore: null,
    answered: false
};

const QUESTIONS_PER_LEVEL = 10;

// ============ INIT ============
document.addEventListener('DOMContentLoaded', async () => {
    bindEvents();
    await loadCategories();
    await loadUserScore();
});

function bindEvents() {
    document.getElementById('btnHome').onclick = () => showScreen('home');
    document.getElementById('btnSound').onclick = toggleSound;
    document.getElementById('btnLeaderboard').onclick = showLeaderboard;
    document.getElementById('btnStats').onclick = showStats;
    document.getElementById('btnPlayAgain').onclick = () => startGame(state.currentCategory);
    document.getElementById('btnBackHome').onclick = () => { showScreen('home'); loadCategories(); };
    document.getElementById('btnReset').onclick = resetScore;
}

// ============ API CALLS ============
async function apiGet(action, params = {}) {
    const url = new URL(API, window.location.href);
    url.searchParams.set('action', action);
    Object.keys(params).forEach(k => url.searchParams.set(k, params[k]));
    const res = await fetch(url);
    return res.json();
}

async function apiPost(action, data) {
    const res = await fetch(API + '?action=' + action, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    });
    return res.json();
}

// ============ CATEGORIES ============
async function loadCategories() {
    const cont = document.getElementById('categories');
    cont.innerHTML = '<div class="loading">Laden... ⏳</div>';
    const res = await apiGet('getCategories');
    if (!res.success) return;
    state.categories = res.categories;
    
    cont.innerHTML = res.categories.map(c => `
        <div class="category-card" data-cat="${c.id}">
            <div class="category-emoji">${c.emoji}</div>
            <div class="category-naam">${c.naam}</div>
            <div class="category-aantal">${c.aantal} woorden</div>
        </div>
    `).join('');
    
    document.querySelectorAll('.category-card').forEach(el => {
        el.onclick = () => startGame(el.dataset.cat);
    });
}

// ============ USER SCORE ============
async function loadUserScore() {
    const res = await apiGet('getScore');
    if (res.success) {
        state.userScore = res.score;
        updateHeaderStats();
        calculateLevel();
    }
}

function updateHeaderStats() {
    if (!state.userScore) return;
    document.getElementById('totalScore').textContent = state.userScore.totaal || 0;
    
    let stars = 0;
    if (state.userScore.levels) {
        Object.values(state.userScore.levels).forEach(l => stars += l.sterren || 0);
    }
    state.totalStars = stars;
    document.getElementById('totalStars').textContent = stars;
    document.getElementById('currentLevel').textContent = state.level;
    
    const progress = Math.min(100, (stars / 30) * 100);
    document.getElementById('progressFill').style.width = progress + '%';
}

function calculateLevel() {
    // Level op basis van totaal sterren
    const stars = state.totalStars;
    if (stars >= 27) state.level = 6;
    else if (stars >= 20) state.level = 5;
    else if (stars >= 14) state.level = 4;
    else if (stars >= 8) state.level = 3;
    else if (stars >= 3) state.level = 2;
    else state.level = 1;
}

// ============ GAME ============
async function startGame(category) {
    state.currentCategory = category;
    const res = await apiGet('getWords', { category });
    if (!res.success) return;
    
    state.currentWords = res.words;
    state.currentIndex = 0;
    state.score = 0;
    state.juist = 0;
    state.fout = 0;
    state.answered = false;
    
    // Shuffle en pak max 10 vragen
    const shuffled = [...res.words].sort(() => Math.random() - 0.5);
    state.quizWords = shuffled.slice(0, Math.min(QUESTIONS_PER_LEVEL, shuffled.length));
    
    document.getElementById('gameCategory').textContent = 
        category.charAt(0).toUpperCase() + category.slice(1);
    
    showScreen('game');
    showQuestion();
}

function showQuestion() {
    if (state.currentIndex >= state.quizWords.length) {
        finishGame();
        return;
    }
    
    state.answered = false;
    const word = state.quizWords[state.currentIndex];
    
    document.getElementById('gameProgress').textContent = 
        `${state.currentIndex + 1} / ${state.quizWords.length}`;
    
    // Toon het NEDERLANDSE woord, kies de TURKSE vertaling
    // Wacht: opdracht zegt "van Turks naar Nederlands" - dus toon Turks, kies Nederlands
    document.getElementById('questionEmoji').textContent = word.emoji;
    document.getElementById('questionText').textContent = word.tr;
    
    // Spreek het Turkse woord? Nee, we leren Nederlands. We spreken straks het NL woord uit.
    
    // Genereer antwoorden (NL)
    const wrongs = state.currentWords
        .filter(w => w.nl !== word.nl)
        .sort(() => Math.random() - 0.5)
        .slice(0, 3);
    
    const answers = [...wrongs, word].sort(() => Math.random() - 0.5);
    
    const cont = document.getElementById('answers');
    cont.innerHTML = answers.map(a => 
        `<button class="answer-btn" data-nl="${a.nl}">${a.nl}</button>`
    ).join('');
    
    document.querySelectorAll('.answer-btn').forEach(btn => {
        btn.onclick = () => checkAnswer(btn, word);
    });
    
    document.getElementById('feedback').textContent = '';
    document.getElementById('feedback').className = 'feedback';
}

function checkAnswer(btn, correctWord) {
    if (state.answered) return;
    state.answered = true;
    
    const gekozen = btn.dataset.nl;
    const isCorrect = gekozen === correctWord.nl;
    
    document.querySelectorAll('.answer-btn').forEach(b => {
        b.disabled = true;
        if (b.dataset.nl === correctWord.nl) b.classList.add('correct');
    });
    
    const fb = document.getElementById('feedback');
    
    if (isCorrect) {
        state.juist++;
        state.score += 10;
        fb.textContent = '✅ Goed! +10';
        fb.className = 'feedback success';
        speak(correctWord.nl);
        smallConfetti();
    } else {
        btn.classList.add('wrong');
        state.fout++;
        fb.textContent = `❌ Fout! Juiste antwoord: ${correctWord.nl}`;
        fb.className = 'feedback error';
        speak(correctWord.nl);
    }
    
    setTimeout(() => {
        state.currentIndex++;
        showQuestion();
    }, 1800);
}

async function finishGame() {
    // Bereken sterren
    const sterren = state.juist >= 9 ? 3 : state.juist >= 6 ? 2 : state.juist >= 3 ? 1 : 0;
    
    // Opslaan
    const res = await apiPost('saveScore', {
        categorie: state.currentCategory,
        level: state.level,
        punten: state.score,
        juist: state.juist,
        fout: state.fout,
        naam: state.userScore?.naam || 'Speler'
    });
    
    if (res.success) state.userScore = res.score;
    
    // Toon resultaat
    document.getElementById('resultTitle').textContent = 
        sterren >= 2 ? 'Uitstekend! 🎉' : sterren >= 1 ? 'Goed gedaan! 👏' : 'Blijf oefenen! 💪';
    document.getElementById('resultStars').textContent = '⭐'.repeat(sterren) + '☆'.repeat(3 - sterren);
    document.getElementById('resultScore').textContent = state.score + ' punten';
    document.getElementById('resultDetails').textContent = 
        `${state.juist} juist • ${state.fout} fout`;
    
    await loadUserScore();
    showScreen('result');
    
    if (sterren >= 2) bigConfetti();
}

// ============ SPEECH ============
function speak(text) {
    if (!state.soundOn || !('speechSynthesis' in window)) return;
    speechSynthesis.cancel();
    const u = new SpeechSynthesisUtterance(text);
    u.lang = 'nl-NL';
    u.rate = 0.85;
    u.pitch = 1.1;
    speechSynthesis.speak(u);
}

function toggleSound() {
    state.soundOn = !state.soundOn;
    document.getElementById('btnSound').textContent = state.soundOn ? '🔊' : '🔇';
    if (!state.soundOn) speechSynthesis.cancel();
}

// ============ SCREENS ============
function showScreen(name) {
    document.querySelectorAll('.screen').forEach(s => s.classList.remove('active'));
    document.getElementById('screen-' + name).classList.add('active');
    
    const titles = {
        home: 'Nederlands Leren',
        game: '🎯 Spelen',
        result: '🎉 Resultaat',
        leaderboard: '🏆 Scorebord',
        stats: '📊 Voortgang'
    };
    document.getElementById('headerTitle').textContent = titles[name] || 'Nederlands Leren';
}

// ============ LEADERBOARD ============
async function showLeaderboard() {
    const res = await apiGet('getLeaderboard');
    const cont = document.getElementById('leaderboardList');
    
    if (!res.success || res.leaderboard.length === 0) {
        cont.innerHTML = '<div class="loading">Nog geen scores 😢</div>';
    } else {
        cont.innerHTML = res.leaderboard.map((p, i) => `
            <div class="leaderboard-item ${i < 3 ? 'top-' + (i+1) : ''}">
                <div class="rank">${i === 0 ? '🥇' : i === 1 ? '🥈' : i === 2 ? '🥉' : (i+1)}</div>
                <div class="naam">${escapeHtml(p.naam)}</div>
                <div class="punten">${p.totaal} 💎</div>
            </div>
        `).join('');
    }
    showScreen('leaderboard');
}

// ============ STATS ============
async function showStats() {
    await loadUserScore();
    const s = state.userScore;
    
    document.getElementById('statTotaal').textContent = s.totaal || 0;
    document.getElementById('statJuist').textContent = s.juist || 0;
    document.getElementById('statFout').textContent = s.fout || 0;
    const tot = (s.juist || 0) + (s.fout || 0);
    document.getElementById('statAccuraatheid').textContent = 
        tot > 0 ? Math.round((s.juist / tot) * 100) + '%' : '0%';
    
    const cats = s.categorieën || {};
    const cont = document.getElementById('categoryStats');
    const keys = Object.keys(cats);
    
    if (keys.length === 0) {
        cont.innerHTML = '<div class="loading">Nog geen data</div>';
    } else {
        cont.innerHTML = keys.map(k => {
            const c = cats[k];
            const total = c.juist + c.fout;
            const acc = total > 0 ? Math.round((c.juist / total) * 100) : 0;
            return `<div class="cat-stat">
                <span class="cat-stat-naam">${k}</span>
                <span class="cat-stat-info">✅ ${c.juist} • ❌ ${c.fout} • ${acc}%</span>
            </div>`;
        }).join('');
    }
    
    showScreen('stats');
}

async function resetScore() {
    if (!confirm('Weet je zeker dat je al je scores wilt wissen?')) return;
    await apiPost('resetScore', {});
    await loadUserScore();
    showStats();
}

// ============ CONFETTI ============
function smallConfetti() {
    const colors = ['#ffd54f', '#ff8f00', '#4caf50', '#2196f3', '#e91e63'];
    const cont = document.getElementById('confetti');
    for (let i = 0; i < 15; i++) {
        const p = document.createElement('div');
        p.className = 'confetti-piece';
        p.style.left = Math.random() * 100 + '%';
        p.style.background = colors[Math.floor(Math.random() * colors.length)];
        p.style.animationDuration = (2 + Math.random()) + 's';
        p.style.animationDelay = Math.random() * 0.3 + 's';
        cont.appendChild(p);
        setTimeout(() => p.remove(), 3500);
    }
}

function bigConfetti() {
    const colors = ['#ffd54f', '#ff8f00', '#4caf50', '#2196f3', '#e91e63', '#9c27b0'];
    const cont = document.getElementById('confetti');
    for (let i = 0; i < 60; i++) {
        const p = document.createElement('div');
        p.className = 'confetti-piece';
        p.style.left = Math.random() * 100 + '%';
        p.style.background = colors[Math.floor(Math.random() * colors.length)];
        p.style.width = (8 + Math.random() * 10) + 'px';
        p.style.height = p.style.width;
        p.style.animationDuration = (2.5 + Math.random() * 2) + 's';
        p.style.animationDelay = Math.random() * 0.6 + 's';
        cont.appendChild(p);
        setTimeout(() => p.remove(), 5000);
    }
}

// ============ UTILS ============
function escapeHtml(s) {
    return String(s).replace(/[&<>"']/g, m => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[m]));
}