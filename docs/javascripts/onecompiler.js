const OC_BASE_URL = "https://raw.githubusercontent.com/dprevedello/Esercizi-programmazione/refs/heads/main/";

// Stile per lo spinner di caricamento (iniettato una sola volta)
if (!document.getElementById("oc-spinner-style")) {
  const style = document.createElement("style");
  style.id = "oc-spinner-style";
  style.textContent = `
    @keyframes oc-spin {
      to { transform: rotate(360deg); }
    }
    .oc-spinner {
      width: 36px;
      height: 36px;
      border: 4px solid #e5e7eb;
      border-top-color: #2563eb;
      border-radius: 50%;
      animation: oc-spin 0.8s linear infinite;
    }
  `;
  document.head.appendChild(style);
}

// Rileva il tema MkDocs Material (slate = dark, default = light)
function getOCTheme() {
  const scheme = document.body.getAttribute("data-md-color-scheme");
  return scheme === "slate" ? "dark" : "light";
}

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".oc-embed").forEach((container) => {
    const lang    = container.dataset.lang || "c";
    const height  = container.dataset.height || "500";
    const autorun = container.dataset.autorun === "true";

    // Supporto multi-file: paths separati da ";" con trim automatico
    const paths = container.dataset.path
      .split(";")
      .map((p) => p.trim())
      .filter((p) => p.length > 0);

    // Supporto stdin: se non presente usa stringa vuota
    // Supporta \n nell'attributo HTML come separatore di righe
    const stdin = (container.dataset.stdin || "").replace(/\\n/g, "\n");

    // Stile comune per i bottoni della toolbar
    const btnStyle = `
      padding: 0.3rem 0.9rem;
      font-size: 0.78rem;
      font-weight: 600;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    `;

    container.innerHTML = `
      <div style="text-align: center; margin: 1.5rem 0;">
        <button
          class="oc-toggle"
          style="
            padding: 0.6rem 1.6rem;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background-color: #2563eb;
            border: none;
            border-radius: 6px;
            cursor: pointer;
          ">
          ▶ Prova online
        </button>
      </div>
      <div class="oc-wrapper" style="display: none;">

        <div style="
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 0.5rem;
          margin-bottom: 0.4rem;
        ">
          <button class="oc-run"   title="Esegui il codice"              style="${btnStyle} background-color: #16a34a;">▶ Esegui</button>
          <button class="oc-reset" title="Ripristina il codice originale" style="${btnStyle} background-color: #d97706;">↺ Reimposta</button>
          <button class="oc-close" title="Chiudi l'editor"               style="${btnStyle} background-color: #dc2626;">✕ Chiudi</button>
        </div>

        <div class="oc-loading" style="
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          gap: 0.75rem;
          height: ${height}px;
          border: 1px solid #ddd;
          border-radius: 8px;
        ">
          <div class="oc-spinner"></div>
          <span style="font-size: 0.85rem; color: #6b7280;">Caricamento file in corso…</span>
        </div>

        <iframe
          class="oc-frame"
          src="about:blank"
          style="display:none; width:100%; height:${height}px; border:1px solid #ddd; border-radius:8px;"
          allowfullscreen>
        </iframe>

      </div>
    `;

    const toggleBtn  = container.querySelector(".oc-toggle");
    const closeBtn   = container.querySelector(".oc-close");
    const runBtn     = container.querySelector(".oc-run");
    const resetBtn   = container.querySelector(".oc-reset");
    const wrapper    = container.querySelector(".oc-wrapper");
    const frame      = container.querySelector(".oc-frame");
    const loading    = container.querySelector(".oc-loading");
    let loaded       = false;
    let cachedFiles  = null;

    function buildIframeSrc() {
      const theme = getOCTheme();
      return `https://onecompiler.com/embed/${lang}?listenToEvents=true&hideLanguageSelection=true&hideNewFileOption=true&hideTitle=true&hideRun=true&theme=${theme}`;
    }

    function sendFiles(files) {
      frame.contentWindow.postMessage({
        eventType: "populateCode",
        language: lang,
        files,
        stdin,
      }, "https://onecompiler.com");

      if (autorun) {
        setTimeout(() => {
          frame.contentWindow.postMessage(
            { eventType: "triggerRun" },
            "https://onecompiler.com"
          );
        }, 500);
      }
    }

    function showFrame() {
      loading.style.display = "none";
      frame.style.display   = "block";
    }

    function openEditor() {
      wrapper.style.display      = "block";
      toggleBtn.style.display    = "none";
      loading.style.display      = "flex";
      frame.style.display        = "none";

      if (!loaded) {
        loaded = true;
        frame.src = buildIframeSrc();

        frame.addEventListener("load", async () => {
          // Fetch parallelo di tutti i file
          const results = await Promise.allSettled(
            paths.map((path) =>
              fetch(OC_BASE_URL + path).then((res) => {
                if (!res.ok) throw new Error(`HTTP ${res.status} per ${path}`);
                return res.text().then((content) => ({
                  name: path.split("/").pop(),
                  content,
                }));
              })
            )
          );

          cachedFiles = results
            .filter((r) => r.status === "fulfilled")
            .map((r) => r.value);

          setTimeout(() => {
            sendFiles(cachedFiles);
            showFrame();
          }, 1500);
        });

      } else {
        // Già caricato: mostra subito l'iframe senza spinner
        showFrame();
      }
    }

    function closeEditor() {
      wrapper.style.display   = "none";
      toggleBtn.style.display = "inline-block";
    }

    toggleBtn.addEventListener("click", openEditor);
    closeBtn.addEventListener("click", closeEditor);

    runBtn.addEventListener("click", () => {
      frame.contentWindow.postMessage(
        { eventType: "triggerRun" },
        "https://onecompiler.com"
      );
    });

    resetBtn.addEventListener("click", () => {
      if (!cachedFiles) return;
      loading.style.display = "flex";
      frame.style.display   = "none";
      setTimeout(() => {
        sendFiles(cachedFiles);
        showFrame();
      }, 800);
    });

    // Sincronizzazione tema dinamica: se l'utente cambia tema mentre
    // l'editor è aperto, ricarica l'iframe con il nuovo tema
    const themeObserver = new MutationObserver(() => {
      if (loaded && wrapper.style.display !== "none") {
        loaded = false;
        loading.style.display = "flex";
        frame.style.display   = "none";
        frame.src             = "about:blank";
        openEditor();
      }
    });
    themeObserver.observe(document.body, {
      attributes: true,
      attributeFilter: ["data-md-color-scheme"],
    });

  });
});