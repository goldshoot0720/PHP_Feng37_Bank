<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP_鋒兄三七_銀行</title>
<script type="text/javascript" src="myjs.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800&family=Noto+Sans+TC:wght@400;500;700&display=swap');

:root {
  color-scheme: dark;
  --bg: #06111f;
  --bg-soft: #0c1c31;
  --panel: rgba(10, 24, 43, 0.88);
  --panel-strong: rgba(7, 18, 34, 0.94);
  --line: rgba(111, 196, 255, 0.18);
  --line-strong: rgba(111, 196, 255, 0.3);
  --text: #eef6ff;
  --muted: #92a9c4;
  --accent: #59e1ff;
  --accent-strong: #2bb5ff;
  --accent-soft: rgba(89, 225, 255, 0.12);
  --success: #7cffbf;
  --shadow: 0 24px 80px rgba(0, 0, 0, 0.45);
}

* {
  box-sizing: border-box;
}

html, body {
  margin: 0;
  min-height: 100%;
}

body {
  font-family: "Noto Sans TC", sans-serif;
  color: var(--text);
  background:
    radial-gradient(circle at top left, rgba(43, 181, 255, 0.18), transparent 28%),
    radial-gradient(circle at top right, rgba(89, 225, 255, 0.14), transparent 24%),
    linear-gradient(180deg, #07111d 0%, #040a14 100%);
}

body::before {
  content: "";
  position: fixed;
  inset: 0;
  background-image:
    linear-gradient(rgba(89, 225, 255, 0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(89, 225, 255, 0.05) 1px, transparent 1px);
  background-size: 48px 48px;
  mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.8), transparent 92%);
  pointer-events: none;
}

.shell {
  width: min(1180px, calc(100vw - 28px));
  margin: 0 auto;
  padding: 22px 0 44px;
}

.hero {
  display: grid;
  grid-template-columns: 1.25fr 0.9fr;
  gap: 20px;
  margin-bottom: 20px;
}

.hero-panel,
.status-panel,
.main-panel,
.total-panel,
.hint-panel {
  position: relative;
  overflow: hidden;
  border: 1px solid var(--line);
  border-radius: 28px;
  background: linear-gradient(180deg, rgba(11, 24, 43, 0.86), rgba(5, 15, 28, 0.94));
  box-shadow: var(--shadow);
}

.hero-panel,
.status-panel,
.main-panel,
.total-panel,
.hint-panel {
  padding: 24px;
}

.hero-panel::after,
.status-panel::after,
.main-panel::after {
  content: "";
  position: absolute;
  inset: auto -20px -40px auto;
  width: 180px;
  height: 180px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(89, 225, 255, 0.18), transparent 70%);
  pointer-events: none;
}

.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 9px 13px;
  border: 1px solid var(--line-strong);
  border-radius: 999px;
  background: rgba(89, 225, 255, 0.08);
  color: var(--accent);
  font-family: "Orbitron", sans-serif;
  font-size: 0.82rem;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}

.hero h1,
.section-title,
.total-value,
.status-value {
  font-family: "Orbitron", sans-serif;
}

.hero h1 {
  margin: 18px 0 12px;
  font-size: clamp(2.3rem, 5vw, 4.5rem);
  line-height: 0.94;
  letter-spacing: 0.02em;
}

.hero-copy,
.panel-label,
.helper,
.bank-note {
  color: var(--muted);
}

.hero-copy {
  max-width: 54ch;
  line-height: 1.85;
}

.hero-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 22px;
}

.meta-chip {
  min-width: 180px;
  padding: 12px 14px;
  border: 1px solid var(--line);
  border-radius: 18px;
  background: rgba(89, 225, 255, 0.05);
}

.meta-chip strong,
.status-value {
  display: block;
  margin-top: 6px;
  font-size: 1.15rem;
}

.status-panel {
  display: grid;
  align-content: space-between;
  gap: 18px;
}

.status-stack {
  display: grid;
  gap: 14px;
}

.status-block {
  padding: 16px;
  border: 1px solid var(--line);
  border-radius: 20px;
  background: rgba(89, 225, 255, 0.05);
}

.status-value {
  color: var(--accent);
}

.content-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 20px;
}

.section-head {
  display: flex;
  justify-content: space-between;
  align-items: end;
  gap: 16px;
  margin-bottom: 18px;
}

.section-title {
  margin: 0;
  font-size: clamp(1.3rem, 2.6vw, 1.9rem);
  letter-spacing: 0.08em;
}

.field-grid {
  display: grid;
  gap: 16px;
}

.field-card {
  padding: 18px;
  border: 1px solid var(--line);
  border-radius: 22px;
  background: rgba(89, 225, 255, 0.05);
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: 700;
}

select,
input {
  width: 100%;
  border: 1px solid var(--line-strong);
  border-radius: 16px;
  background: rgba(6, 17, 31, 0.92);
  color: var(--text);
  font: inherit;
  padding: 14px 16px;
}

select:focus,
input:focus {
  outline: 2px solid rgba(89, 225, 255, 0.18);
  border-color: var(--accent);
}

.total-panel {
  margin-top: 18px;
}

.total-value {
  margin-top: 6px;
  font-size: clamp(2rem, 5vw, 3rem);
  color: var(--accent);
}

.cta-row {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 18px;
}

.btn-tech {
  appearance: none;
  border: 1px solid var(--line-strong);
  border-radius: 999px;
  padding: 14px 22px;
  background: linear-gradient(135deg, rgba(43, 181, 255, 0.24), rgba(89, 225, 255, 0.12));
  color: var(--text);
  font: inherit;
  font-weight: 700;
  cursor: pointer;
  transition: transform 220ms ease, border-color 220ms ease, background 220ms ease;
}

.btn-tech:hover,
.btn-tech:focus-visible {
  transform: translateY(-2px);
  border-color: var(--accent);
  outline: none;
}

.btn-tech.secondary {
  background: rgba(89, 225, 255, 0.05);
}

.hint-panel {
  display: grid;
  gap: 16px;
}

.hint-card {
  padding: 18px;
  border: 1px solid var(--line);
  border-radius: 22px;
  background: rgba(89, 225, 255, 0.05);
}

.bank-note {
  line-height: 1.8;
}

.cat-visual {
  width: min(100%, 240px);
  justify-self: end;
  filter: drop-shadow(0 18px 32px rgba(89, 225, 255, 0.18));
}

@media (max-width: 940px) {
  .hero,
  .content-grid {
    grid-template-columns: 1fr;
  }

  .cat-visual {
    justify-self: start;
  }
}

@media (max-width: 640px) {
  .shell {
    width: min(100vw - 18px, 1180px);
    padding-top: 14px;
  }

  .hero-panel,
  .status-panel,
  .main-panel,
  .total-panel,
  .hint-panel {
    padding: 18px;
    border-radius: 22px;
  }

  .section-head {
    flex-direction: column;
    align-items: start;
  }

  .cta-row {
    flex-direction: column;
  }

  .btn-tech {
    width: 100%;
  }

  .meta-chip {
    min-width: 0;
    width: 100%;
  }
}
</style>
</head>
<body>
<main class="shell">
  <section class="hero">
    <article class="hero-panel">
      <span class="eyebrow">Impeccable Tech UI</span>
      <h1>PHP_鋒兄三七_銀行</h1>
      <p class="hero-copy">
        只重做介面表現，保留原本的資料內容、銀行清單、按鈕名稱與功能邏輯。
        這版走 2026 到 2027 的科技風格，讓原本單純的存款工具看起來更像正式產品。
      </p>
      <div class="hero-meta">
        <div class="meta-chip">
          <span class="panel-label">最後更新</span>
          <strong>
            <?php
              date_default_timezone_set("Asia/Taipei");
              echo date("F d Y H:i:s", filemtime("bank_savings.txt"));
            ?>
          </strong>
        </div>
        <div class="meta-chip">
          <span class="panel-label">資料來源</span>
          <strong>bank_savings.txt</strong>
        </div>
      </div>
    </article>

    <aside class="status-panel">
      <div class="status-stack">
        <div class="status-block">
          <span class="panel-label">運作狀態</span>
          <strong class="status-value">Online</strong>
        </div>
        <div class="status-block">
          <span class="panel-label">金融機構數量</span>
          <strong class="status-value">10</strong>
        </div>
        <div class="status-block">
          <span class="panel-label">主題方向</span>
          <strong class="status-value">科技風格</strong>
        </div>
      </div>
      <p class="bank-note">中央銀行鋒兄分行維持原設定，內容不調整，只提升視覺呈現。</p>
    </aside>
  </section>

  <section class="content-grid">
    <div>
      <article class="main-panel">
        <div class="section-head">
          <div>
            <span class="panel-label">Control Panel</span>
            <h2 class="section-title">銀行資料輸入</h2>
          </div>
          <span class="helper">只改介面，不改內容</span>
        </div>

        <div class="field-grid">
          <section class="field-card">
            <label for="financial_institution">金融機構：</label>
            <select id="financial_institution" onchange="Select_Onchange()">
              <option>(006)合作金庫(5880)</option>
              <option>(012)台北富邦(2881)</option>
              <option>(013)國泰世華(2882)</option>
              <option>(017)兆豐銀行(2886)</option>
              <option>(048)王道銀行(2897)</option>
              <option>(103)新光銀行(2888)</option>
              <option>(700)中華郵政</option>
              <option>(808)玉山銀行(2884)</option>
              <option>(812)台新銀行(2887)</option>
              <option>(822)中國信託(2891)</option>
            </select>
          </section>

          <section class="field-card">
            <label for="saving">存款金額：</label>
            <input type="text" id="saving" name="saving" required minlength="1" maxlength="10" size="10">
          </section>
        </div>

        <section class="total-panel">
          <span class="panel-label">Realtime Summary</span>
          <label for="sum_saving">累積存款：</label>
          <div class="total-value" id="sum_saving">0</div>
          <p class="bank-note">(000)中央銀行(鋒兄分行)存款金額：∞</p>
          <div class="cta-row">
            <button type="button" class="btn-tech" onclick="Button_Click1()">修改</button>
            <button type="button" id="button2" class="btn-tech secondary">彩蛋</button>
          </div>
        </section>
      </article>
    </div>

    <aside class="hint-panel">
      <div class="section-head">
        <div>
          <span class="panel-label">Visual Layer</span>
          <h2 class="section-title">介面說明</h2>
        </div>
      </div>
      <section class="hint-card">
        <strong>保留內容</strong>
        <p class="bank-note">金融機構選項、按鈕文字、累積存款、彩蛋內容與寫檔流程皆維持原本設定。</p>
      </section>
      <section class="hint-card">
        <strong>更新外觀</strong>
        <p class="bank-note">改用深色科技感儀表板、幾何網格背景、冷色光暈與更清楚的輸入層級。</p>
      </section>
      <img class="cat-visual" src="cat20240917_183326-removebg.png" alt="A cat named Miabubu.">
    </aside>
  </section>
</main>
<?php include 'readFile.php'; ?>
</body>
</html>
