const OC_BASE_URL = "https://raw.githubusercontent.com/dprevedello/Esercizi-programmazione/refs/heads/main/";

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".oc-embed").forEach((container) => {
    const rawUrl = OC_BASE_URL + container.dataset.path;
    const lang = container.dataset.lang || "c";

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
        <iframe
          class="oc-frame"
          src="about:blank"
          data-src="https://onecompiler.com/embed/${lang}?listenToEvents=true&hideNewFileOption=true"
          style="width:100%; height:500px; border:1px solid #ddd; border-radius:8px;"
          allowfullscreen>
        </iframe>
      </div>
    `;

    const btn = container.querySelector(".oc-toggle");
    const wrapper = container.querySelector(".oc-wrapper");
    const frame = container.querySelector(".oc-frame");
    let loaded = false;

    btn.addEventListener("click", () => {
      const isHidden = wrapper.style.display === "none";

      if (isHidden) {
        wrapper.style.display = "block";
        btn.textContent = "✕ Chiudi";

        if (!loaded) {
          loaded = true;
          frame.src = frame.dataset.src;
          frame.addEventListener("load", async () => {
            const res = await fetch(rawUrl);
            const code = await res.text();
            setTimeout(() => {
              frame.contentWindow.postMessage({
                eventType: "populateCode",
                language: lang,
                files: [{ name: "main." + lang, content: code }]
              }, "https://onecompiler.com");
            }, 1500);
          });
        }
      } else {
        wrapper.style.display = "none";
        btn.textContent = "▶ Prova online";
      }
    });
  });
});
