<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Studio — Creative Development</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg: #0e0e0e;
    --fg: #f0ede8;
    --muted: #555450;
    --nav-w: 200px;
  }

  html { scroll-behavior: smooth; }

  body {
    background: var(--bg);
    color: var(--fg);
    font-family: 'Inter', sans-serif;
    font-weight: 300;
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ────────────────────────────────────
     FLOATING RIGHT NAV — exact vanholtz style
     numbers left, link text right, lowercase,
     hover = text fades in brightness, no borders/underlines
  ──────────────────────────────────── */
  .nav {
    position: fixed;
    top: 0;
    right: 0;
    width: var(--nav-w);
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 0 0 2.8rem 0;
    z-index: 200;
  }

  .nav-block {
    display: flex;
    flex-direction: column;
    gap: 0;
    padding: 0 2rem 0 0;
  }

  /* each row: number + label side by side */
  .nav-block a {
    display: grid;
    grid-template-columns: 2rem 1fr;
    align-items: baseline;
    gap: 0;
    padding: 0.22rem 0;
    text-decoration: none;
    color: var(--muted);
    transition: color 0.18s ease;
    line-height: 1;
  }

  .nav-block a:hover { color: var(--fg); }

  .nav-block a .n {
    font-size: 0.58rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    color: inherit;
    line-height: 1;
    padding-top: 0.05em;
  }

  .nav-block a .t {
    font-size: 0.7rem;
    font-weight: 400;
    letter-spacing: 0.01em;
    color: inherit;
    line-height: 1;
  }

  /* spacer between social group and pages group */
  .nav-gap { height: 1.1rem; }

  /* bottom-right corner labels: "design" / studio name */
  .nav-corner {
    position: fixed;
    bottom: 2.8rem;
    right: 2rem;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 0.15rem;
  }

  .nav-corner span {
    font-size: 0.62rem;
    font-weight: 400;
    letter-spacing: 0.05em;
    color: var(--muted);
    line-height: 1;
  }

  /* ── MAIN ── */
  .main {
    margin-right: var(--nav-w);
  }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 0 4rem 4.5rem 5rem;
    position: relative;
  }

  .hero-tag {
    font-size: 0.58rem;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 1.2rem;
    font-weight: 400;
  }

  .hero-h {
    font-family: 'Inter', sans-serif;
    font-size: clamp(3rem, 6vw, 5.5rem);
    font-weight: 700;
    line-height: 1.0;
    letter-spacing: -0.03em;
    color: var(--fg);
    text-transform: uppercase;
    margin-bottom: 2rem;
  }

  .hero-sub {
    font-size: 0.78rem;
    line-height: 1.8;
    color: var(--muted);
    max-width: 340px;
  }

  /* ── WORK ── */
  .work {
    padding: 0 4rem 8rem 5rem;
  }

  .section-label {
    font-size: 0.56rem;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 2.5rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
  }

  .section-label::after {
    content: '';
    width: 30px;
    height: 1px;
    background: var(--muted);
    opacity: 0.35;
  }

  .work-list { list-style: none; }

  .work-item {
    border-top: 1px solid rgba(255,255,255,0.06);
    padding: 1.4rem 0;
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 2rem;
    cursor: pointer;
    transition: padding-left 0.3s cubic-bezier(0.77,0,0.175,1);
  }

  .work-item:last-child { border-bottom: 1px solid rgba(255,255,255,0.06); }
  .work-item:hover { padding-left: 1.2rem; }

  .work-title {
    font-size: clamp(1.3rem, 2.2vw, 1.9rem);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: -0.02em;
    color: var(--fg);
  }

  .work-meta {
    text-align: right;
    flex-shrink: 0;
  }

  .work-type {
    display: block;
    font-size: 0.56rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--muted);
  }

  .work-year {
    display: block;
    font-size: 0.54rem;
    color: var(--muted);
    opacity: 0.5;
    margin-top: 0.15rem;
  }

  /* ── ABOUT ── */
  .about {
    border-top: 1px solid rgba(255,255,255,0.06);
    padding: 5rem 4rem 7rem 5rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
  }

  .about-text {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--fg);
    opacity: 0.8;
  }

  .services h4 {
    font-size: 0.56rem;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 0.7rem;
    font-weight: 400;
  }

  .services ul { list-style: none; margin-bottom: 2rem; }

  .services li {
    font-size: 0.72rem;
    color: var(--fg);
    opacity: 0.55;
    padding: 0.2rem 0;
    font-weight: 300;
  }

  /* ── CONTACT ── */
  .contact {
    border-top: 1px solid rgba(255,255,255,0.06);
    padding: 5rem 4rem 6rem 5rem;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 2rem;
  }

  .contact h2 {
    font-size: clamp(1.6rem, 2.8vw, 2.8rem);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: -0.02em;
    color: var(--fg);
    line-height: 1.1;
    max-width: 460px;
  }

  .contact a {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.65rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--fg);
    text-decoration: none;
    opacity: 0.5;
    transition: opacity 0.2s, gap 0.2s;
    flex-shrink: 0;
  }

  .contact a:hover { opacity: 1; gap: 0.9rem; }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .hero-tag { opacity: 0; animation: fadeUp 0.7s 0.1s ease forwards; }
  .hero-h   { opacity: 0; animation: fadeUp 0.7s 0.22s ease forwards; }
  .hero-sub { opacity: 0; animation: fadeUp 0.7s 0.38s ease forwards; }

  @media (max-width: 860px) {
    :root { --nav-w: 160px; }
    .hero, .work, .about, .contact { padding-left: 3rem; padding-right: 3rem; }
    .about { grid-template-columns: 1fr; gap: 2.5rem; }
    .contact { flex-direction: column; align-items: flex-start; }
  }

  @media (max-width: 580px) {
    :root { --nav-w: 0px; }
    .nav, .nav-corner { display: none; }
    .main { margin-right: 0; }
    .hero, .work, .about, .contact { padding-left: 1.5rem; padding-right: 1.5rem; }
  }
</style>
</head>
<body>

<!-- ────── RIGHT NAV ────── -->
<nav class="nav" aria-label="Navegación">
  <div class="nav-block">

    <!-- social links 03 04 05 -->
    <a href="https://twitter.com" target="_blank" rel="noopener">
      <span class="n">03</span><span class="t">twitter</span>
    </a>
    <a href="https://instagram.com" target="_blank" rel="noopener">
      <span class="n">04</span><span class="t">instagram</span>
    </a>
    <a href="https://linkedin.com" target="_blank" rel="noopener">
      <span class="n">05</span><span class="t">linkedin</span>
    </a>

    <div class="nav-gap"></div>

    <!-- page links 01 02 -->
    <a href="#work">
      <span class="n">01</span><span class="t">trabajo</span>
    </a>
    <a href="#about">
      <span class="n">02</span><span class="t">about</span>
    </a>

  </div>
</nav>

<!-- bottom-right corner label -->
<div class="nav-corner" aria-hidden="true">
  <span>design</span>
  <span>studio</span>
</div>

<!-- ────── CONTENT ────── -->
<main class="main">

  <section class="hero" id="home">
    <p class="hero-tag">Experiencias digitales · Valencia ES</p>
    <h1 class="hero-h">Studio<br>Nuevo</h1>
    <p class="hero-sub">
      Diseño y desarrollo web de alta calidad. Colaboramos con marcas que valoran el detalle, el rendimiento y la integridad del diseño.
    </p>
  </section>

  <section class="work" id="work">
    <p class="section-label">Proyectos seleccionados</p>
    <ul class="work-list">
      <li class="work-item">
        <span class="work-title">Arkana Studio</span>
        <div class="work-meta"><span class="work-type">Branding · Web</span><span class="work-year">2024</span></div>
      </li>
      <li class="work-item">
        <span class="work-title">Meridian Commerce</span>
        <div class="work-meta"><span class="work-type">E-commerce · Dev</span><span class="work-year">2024</span></div>
      </li>
      <li class="work-item">
        <span class="work-title">Lumina Health</span>
        <div class="work-meta"><span class="work-type">UI/UX · Frontend</span><span class="work-year">2023</span></div>
      </li>
      <li class="work-item">
        <span class="work-title">Forja Editorial</span>
        <div class="work-meta"><span class="work-type">Dirección · Web</span><span class="work-year">2023</span></div>
      </li>
      <li class="work-item">
        <span class="work-title">Ovid Systems</span>
        <div class="work-meta"><span class="work-type">App · Frontend</span><span class="work-year">2022</span></div>
      </li>
      <li class="work-item">
        <span class="work-title">Pelágica</span>
        <div class="work-meta"><span class="work-type">Identidad · Web</span><span class="work-year">2022</span></div>
      </li>
    </ul>
  </section>

  <section class="about" id="about">
    <div>
      <p class="section-label" style="margin-bottom:1.5rem;">Sobre el estudio</p>
      <p class="about-text">
        Desarrollador web especializado en experiencias digitales de alta calidad. Atención especial a los matices del diseño, la optimización y el rendimiento para entregar interfaces únicas.
      </p>
      <p class="about-text" style="margin-top:1.2rem; font-size:0.75rem; opacity:0.35;">
        Disponible para proyectos remotos.
      </p>
    </div>
    <div class="services">
      <div>
        <h4>Desarrollo</h4>
        <ul>
          <li>Dirección técnica</li>
          <li>Front-end development</li>
          <li>Animaciones web</li>
          <li>Consultoría</li>
        </ul>
      </div>
      <div>
        <h4>Diseño</h4>
        <ul>
          <li>UI / UX Design</li>
          <li>Sistemas de diseño</li>
          <li>Identidad digital</li>
          <li>Motion design</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="contact">
    <h2>¿Trabajamos<br>juntos?</h2>
    <a href="mailto:hola@studio.co">
      Escríbeme
      <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M7 17L17 7M17 7H7M17 7v10"/>
      </svg>
    </a>
  </section>

</main>

<script>
  const sections = document.querySelectorAll('section[id]');
  const links = document.querySelectorAll('.nav-block a');
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        links.forEach(a => a.style.color = '');
        const hit = document.querySelector(`.nav-block a[href="#${e.target.id}"]`);
        if (hit) hit.style.color = 'var(--fg)';
      }
    });
  }, { threshold: 0.4 });
  sections.forEach(s => io.observe(s));
</script>
</body>
</html>