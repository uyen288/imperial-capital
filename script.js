function showPage(id, scrollToId = null) {
     document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
     document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));

     const page = document.getElementById('page-' + id);
     const nav = document.getElementById('nav-' + id);

     if (page) page.classList.add('active');
     if (nav) nav.classList.add('active');

     window.scrollTo(0, 0);

     if (id === 'performance') initChart();

     if (scrollToId) {
          setTimeout(() => {
               const el = document.getElementById(scrollToId);
               if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
               }
          }, 100);
     }
}

document.addEventListener("click", (e) => {
     const link = e.target.closest("a[href^='#']");
     if (!link) return;

     e.preventDefault();

     const hash = link.getAttribute("href").substring(1);

     if (hash === "performance-chart") {
          showPage("performance", "performance-chart");
     }
});

// ── Sidebar scroll
function scrollToDoc(id, el) {
     document.querySelectorAll('.sidebar-nav li').forEach(li => li.classList.remove('active'));
     el.classList.add('active');
     document.getElementById('doc-' + id).scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// ── Growth Chart (Monthly)
let chartInited = false;

function generateMonths(start, count) {
     const result = [];
     let d = new Date(start);

     for (let i = 0; i < count; i++) {
          result.push(
               String(d.getMonth() + 1).padStart(2, '0') + '/' + d.getFullYear()
          );
          d.setMonth(d.getMonth() + 1);
     }

     return result;
}

function initChart() {
     if (chartInited) return;
     chartInited = true;

     const labels = generateMonths('2026-01-01', 4);

     const imp = [
          -5.13, 5.34, 2.58, 3.02
     ];

     const vni = [
          2.50, 2.80, -10.95, 10.70
     ];

     const ctx = document.getElementById('growthChart').getContext('2d');

     new Chart(ctx, {
          type: 'line',
          data: {
               labels: labels,
               datasets: [
                    {
                         label: 'Imperial Capital',
                         data: imp,
                         backgroundColor: '#cc0000',
                         borderColor: '#0a0a0a',
                         borderWidth: 2,
                         pointRadius: 0,
                         tension: 0.4
                    },
                    {
                         label: 'VN-Index',
                         data: vni,
                         borderColor: '#9e9b96',
                         borderWidth: 1.5,
                         borderDash: [5, 5],
                         pointRadius: 0,
                         tension: 0.4
                    }
               ]
          },
          options: {
               responsive: true,
               plugins: {
                    legend: { display: false },
                    tooltip: {
                         mode: 'index',
                         intersect: false,
                         callbacks: {
                              label: ctx => `${ctx.dataset.label}: ${ctx.raw.toLocaleString()}%`
                         }
                    }
               },
               scales: {
                    x: {
                         grid: { color: '#f0ede8' },
                         ticks: {
                              color: '#9e9b96',
                              callback: function (value, index) {
                                   const total = this.getLabels().length;

                                   if (total <= 12) {
                                        return this.getLabelForValue(value);
                                   }

                                   return index % 3 === 0 ? this.getLabelForValue(value) : '';
                              }
                         }
                    },
                    y: {
                         grid: { color: '#f0ede8' },
                         ticks: {
                              color: '#9e9b96',
                              callback: v => v.toFixed(1) + '%'
                         }
                    }
               }
          }
     });
}

// PORTFOLIO

/* ================= COLOR SYSTEM ================= */
const COLORS = {
     black: "#000000",
     dark: "#1a1a1a",
     gray: "#6b6b6b",
     lightGray: "#cfcfcf",
     border: "#e5e5e5",
     accent: "#cc0000"
};

/* ================= DATA ================= */

const data = {
     sector: [
          { name: "Y tế", value: 40.4, color: COLORS.accent },
          { name: "Hàng cá nhân & Gia dụng", value: 30.3, color: COLORS.dark },

          { name: "Bất động sản", value: 9.0, color: COLORS.gray },
          { name: "Tài nguyên cơ bản", value: 7.4, color: COLORS.lightGray },
          { name: "Dịch vụ tài chính", value: 4.9, color: COLORS.lightGray },

          { name: "Hóa chất", value: 3.3, color: COLORS.border },
          { name: "Truyền thông", value: 1.6, color: COLORS.border },
          { name: "Điện, nước & Xăng dầu khí đốt", value: 1.4, color: COLORS.border },
          { name: "Ngân hàng", value: 1.2, color: COLORS.border },
          { name: "Xây dựng & Vật liệu", value: 0.3, color: COLORS.border },
          { name: "Hàng & Dịch vụ công nghiệp", value: 0.3, color: COLORS.border }
     ],

     asset: [
          { name: "Tiền mặt", value: 0, color: COLORS.black },
          { name: "Cổ phiếu", value: 100, color: COLORS.accent }
     ]
};

const donut = document.getElementById("donut");
const legend = document.getElementById("legend");

const centerValue = document.getElementById("centerValue");
const centerLabel = document.getElementById("centerLabel");

/* ================= RENDER ================= */
function render(type) {
     donut.innerHTML = "";
     legend.innerHTML = "";

     const radius = 80;
     const C = 2 * Math.PI * radius;

     let offset = 0;

     data[type].forEach((item) => {

          const dash = (item.value / 100) * C;

          /* ===== CREATE SEGMENT ===== */
          const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");

          circle.setAttribute("cx", 100);
          circle.setAttribute("cy", 100);
          circle.setAttribute("r", radius);
          circle.setAttribute("fill", "none");
          circle.setAttribute("stroke", item.color);
          circle.setAttribute("stroke-width", 15);

          circle.setAttribute("stroke-dasharray", `${dash} ${C}`);
          circle.setAttribute("stroke-dashoffset", -offset);

          circle.classList.add("segment");

          /* ===== HOVER: DONUT ===== */
          circle.addEventListener("mouseenter", () => {
               document.querySelectorAll(".segment").forEach(s => s.classList.remove("active"));
               circle.classList.add("active");

               centerValue.innerText = item.value + "%";
               centerLabel.innerText = item.name;
          });

          circle.addEventListener("mouseleave", () => {
               circle.classList.remove("active");

               centerValue.innerText = "100%";
               centerLabel.innerText = "Tổng";
          });

          donut.appendChild(circle);

          offset += dash;

          /* ===== LEGEND ===== */
          const row = document.createElement("div");
          row.className = "legend-item";

          row.innerHTML = `
      <div class="legend-left">
        <span class="dot" style="background:${item.color}"></span>
        <span class="legend-name">${item.name}</span>
      </div>
      <span class="legend-value">${item.value}%</span>
    `;

          /* 🔥 SYNC LEGEND ↔ DONUT */
          row.addEventListener("mouseenter", () => {
               circle.dispatchEvent(new Event("mouseenter"));
          });

          row.addEventListener("mouseleave", () => {
               circle.dispatchEvent(new Event("mouseleave"));
          });

          legend.appendChild(row);
     });
}

/* ================= TAB SWITCH ================= */
document.querySelectorAll(".tab, .bh-tab").forEach(btn => {
     btn.addEventListener("click", () => {
          document.querySelectorAll(".tab, .bh-tab").forEach(b => b.classList.remove("active"));
          btn.classList.add("active");

          render(btn.dataset.tab);
     });
});

/* ================= INIT ================= */
render("sector");



document.querySelectorAll(".toggle").forEach(btn => {
     btn.addEventListener("click", () => {
          const item = btn.closest(".doc-item");
          item.classList.toggle("open");

          btn.textContent = item.classList.contains("open") ? "−" : "+";
     });
});


// LOC LOAI TAI LIEU

const tabs = document.querySelectorAll(".tab");
const list = document.getElementById("docsList");
const empty = document.getElementById("docsEmpty");

let items = Array.from(document.querySelectorAll(".doc-item"));

// SORT
function sortByDate() {
     items.sort((a, b) => {
          return new Date(b.dataset.date) - new Date(a.dataset.date);
     });
     items.forEach(item => list.appendChild(item));
}

// FILTER + EMPTY CHECK
function filter(category) {
     let visibleCount = 0;

     items.forEach(item => {
          if (category === "all" || item.dataset.category === category) {
               item.style.display = "flex";
               visibleCount++;
          } else {
               item.style.display = "none";
          }
     });

     // show/hide empty message
     empty.style.display = visibleCount === 0 ? "block" : "none";
}

// TAB CLICK
tabs.forEach(tab => {
     tab.addEventListener("click", () => {
          tabs.forEach(t => t.classList.remove("active"));
          tab.classList.add("active");

          filter(tab.dataset.tab);
     });
});

// INIT
sortByDate();
filter("all");