let lenis; // 전역

document.addEventListener("DOMContentLoaded", () => {
  AOS.init();

  lenis = initLenis();

  gsap.registerPlugin(ScrollTrigger);
  initHeader();
  initMainVisualSwiper();
  initShowRoomSwiper();
  initProductViewSwiper();
  dropdown();
  formHandler();
  initFaq();
  initTopButton(lenis);

  clipImageAnimation();
  countingAnimation();
  initBreadCrumb();
  //subVisualYReveal();
  initIntro(lenis, 500);

  //REQUEST FORM ACTION
  const form = document.getElementById("requestForm");
  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    submitRequestForm(form);
  });
});

function initIntro(lenis, ttlMinutes = 30) {
  const wrap = document.querySelector(".no-intro");
  if (!wrap) return;

  const KEY = "intro_until";
  const now = Date.now();
  const until = Number(localStorage.getItem(KEY) || 0);

  // TTL 체크
  if (until && now < until) {
    wrap.style.display = "none";
    return;
  }

  const span = wrap.querySelector(".txt span");
  if (!span) return;

  document.body.classList.add("intro-lock");
  wrap.style.pointerEvents = "auto";
  if (lenis?.stop) lenis.stop();

  const split = new SplitType(span, { types: "chars" });
  gsap.set(split.chars, { yPercent: 120, opacity: 0 });
  gsap.set(".no-intro .bg>div", { scaleX: 1 });

  gsap
    .timeline({
      defaults: { ease: "power3.out" },
      onComplete: () => {
        split.revert();
        localStorage.setItem(KEY, String(Date.now() + ttlMinutes * 60 * 1000));
        wrap.style.display = "none";
        document.body.classList.remove("intro-lock");
        if (lenis?.start) lenis.start();
      },
    })
    .to(split.chars, { yPercent: 0, opacity: 1, stagger: 0.03, duration: 0.8 })
    .to(
      split.chars,
      {
        yPercent: 120,
        opacity: 0,
        stagger: { each: 0.02, from: "end" },
        duration: 0.6,
        ease: "power2.in",
      },
      "+=0.1"
    )
    .set(".no-intro .txt", { opacity: 0, visibility: "hidden" }, ">")
    .to(".no-intro .bg>div", { scaleX: 0, stagger: 0.12, duration: 0.9 }, "<");
}

async function submitRequestForm(form) {
  if (!form || form.dataset.busy === "1") return;
  form.dataset.busy = "1";

  const submitBtn = form.querySelector('button[type="submit"]');
  const prevText = submitBtn ? submitBtn.textContent : "";
  if (submitBtn) {
    submitBtn.disabled = true;
    submitBtn.textContent = "전송 중...";
  }

  try {
    const fd = new FormData(form);

    const res = await fetch("/module/ajax/request.process.php", {
      method: "POST",
      body: fd,
      credentials: "same-origin",
      cache: "no-store",
    });

    let data;
    const ct = res.headers.get("content-type") || "";
    if (ct.includes("application/json")) {
      data = await res.json();
    } else {
      const text = await res.text();
      try {
        data = JSON.parse(text);
      } catch {
        data = {
          result: res.ok ? "success" : "fail",
          msg: text || "응답 파싱 실패",
        };
      }
    }

    alert(
      data.msg || (res.ok ? "처리되었습니다." : "처리 중 오류가 발생했습니다.")
    );

    if (data.result === "success") {
      form.reset();

      const firstItem = form.querySelector(".dropdown-menu li");
      const labelSpan = form.querySelector(".dropdown .select span");
      const hiddenArea = form.querySelector('input[name="area"]');
      if (firstItem && labelSpan && hiddenArea) {
        labelSpan.textContent = firstItem.textContent.trim();
        hiddenArea.value = firstItem.dataset.value || hiddenArea.value;
      }
    }
  } catch (err) {
    console.error(err);
    alert("네트워크 오류가 발생했습니다.");
  } finally {
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.textContent = prevText;
    }
    form.dataset.busy = "0";
  }
}

function initLenis() {
  const lenisInstance = new Lenis({
    autoRaf: true,
  });

  return lenisInstance;
}

function initTopButton(lenis) {
  const topBtn = document.querySelector(".no-top-btn button");
  const btnWrapper = document.querySelector(".no-top-btn");

  if (!btnWrapper || !topBtn) return; // 요소 없으면 실행 안 함

  // scroll 상태를 업데이트하는 함수
  const updateVisibility = (scroll) => {
    if (scroll <= 0) {
      btnWrapper.classList.add("hidden");
    } else {
      btnWrapper.classList.remove("hidden");
    }
  };

  if (lenis) {
    updateVisibility(lenis.scroll || 0); // lenis의 현재 스크롤 값 사용
  } else {
    updateVisibility(window.scrollY || 0); // fallback
  }

  // scroll 이벤트 감지해서 hidden 클래스 토글
  lenis.on("scroll", ({ scroll }) => {
    updateVisibility(scroll);
  });

  // TOP 버튼 클릭 이벤트
  topBtn.addEventListener("click", () => {
    if (lenis) {
      lenis.scrollTo(0, { offset: 0, immediate: false });
    } else {
      window.scrollTo({ top: 0, behavior: "smooth" }); // fallback
    }
  });
}

function countingAnimation() {
  const els = document.querySelectorAll(".counting");
  if (!els.length) return;

  els.forEach((el) => {
    const target = parseInt(el.dataset.count, 10) || 0;
    const counter = { val: 0 }; // 프록시 객체

    el.textContent = "00"; // 초기 표시

    gsap.to(counter, {
      val: target,
      duration: 2,
      ease: "cubic-bezier(.165,.84,.44,1)",
      snap: { val: 1 },
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
        toggleActions: "play none none reverse",
        once: true,
      },
      onUpdate: () => {
        el.textContent = String(counter.val).padStart(2, "0");
      },
    });
  });
}

function clipImageAnimation() {
  const clipImageWrap = document.querySelectorAll("--clip-img-wrap");
  const clipImageItem = document.querySelectorAll("--clip-img");

  if (!clipImageItem || !clipImageWrap) {
    return;
  }

  gsap.to(".--clip-img", {
    clipPath: "inset(0% 0 0 0)", // 최종적으로 전부 보이도록
    duration: 1.6,
    scale: 1,
    ease: "cubic-bezier(.165,.84,.44,1)",
    stagger: 0.05,
    scrollTrigger: {
      trigger: ".--clip-img-wrap",
      start: "top 80%",
      toggleActions: "play none none reverse",
      once: true,
    },
  });
}

function subVisualYReveal() {
  const section = document.querySelector(".no-sub-visual");
  const imgEl = section?.querySelector(".img img");
  if (!section || !imgEl) return;

  gsap.set(imgEl, { scale: 1.2, transformOrigin: "50% 50%" });

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: "top 80%",
      toggleActions: "play none none reverse",
      once: true,
    },
    defaults: { ease: "cubic-bezier(.165,.84,.44,1)" },
  });

  tl.to(
    [".no-sub-visual h2", ".no-sub-visual p"],
    {
      y: "0%",
      duration: 1.2,
      stagger: 0.06,
    },
    0
  ).to(
    imgEl,
    {
      scale: 1,
      duration: 1.6,
    },
    0
  );
}

function initBreadCrumb() {
  const root = document.querySelector(".breadcrumb");
  if (!root) return;

  root.querySelectorAll(".breadcrumb-toggle").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();

      // 기존 열림 닫기
      root
        .querySelectorAll(".breadcrumb-has-menu.is-open")
        .forEach((el) => el.classList.remove("is-open"));

      // 현재 토글
      btn.parentElement.classList.toggle("is-open");
    });
  });

  document.addEventListener("click", () => {
    root
      .querySelectorAll(".breadcrumb-has-menu.is-open")
      .forEach((el) => el.classList.remove("is-open"));
  });
}

function initHeader() {
  const root = document.getElementById("header");

  if (!root) return;

  const body = document.querySelector("body");
  const pageType = body.dataset.page;

  // 서브페이지일경우
  if (pageType === "sub") {
    root.classList.add("normal");
  }

  // 서브페이지일경우
  if (pageType === "main") {
    root.classList.add("transparent");
  }

  const menu = root.querySelector(".no-header__menu, .no-header-menu");
  const btn = root.querySelector(".no-header-btn");
  const backdrop = document.getElementById("no-backdrop");

  const mql = window.matchMedia("(min-width: 769px)");

  if (menu) {
    menu.addEventListener("mouseenter", () => {
      if (!mql.matches) return;
      root.classList.add("active");
      if (backdrop) backdrop.classList.add("active");
    });

    root.addEventListener("mouseleave", () => {
      if (!mql.matches) return;
      root.classList.remove("active");
      if (backdrop) backdrop.classList.remove("active");
    });
  }

  if (btn) {
    btn.addEventListener("click", () => {
      root.classList.toggle("mb-visible");
      btn.classList.toggle("active");
    });
  }

  function handleScroll() {
    if (window.scrollY > 80) {
      root.classList.add("is-scrolled");
    } else {
      root.classList.remove("is-scrolled");
    }
  }

  window.addEventListener("scroll", handleScroll);
  handleScroll();
}

function initMainVisualSwiper() {
  const el = document.querySelector(".no-main-visual-swiper");
  if (!el) return;

  new Swiper(el, {
    loop: true,
    speed: 1600,
    autoplay: {
      delay: 3000, // 3초마다
      disableOnInteraction: false, // 유저가 스와이프해도 다시 자동 재생
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: el.querySelector(".swiper-pagination"),
      type: "fraction",
      formatFractionCurrent: (number) => (number < 10 ? "0" + number : number),
      formatFractionTotal: (number) => (number < 10 ? "0" + number : number),
      renderFraction: (currentClass, totalClass) => {
        return `<span class="${currentClass}"></span>/<span class="${totalClass}"></span>`;
      },
    },
  });
}

function initFaq() {
  const root = document.querySelector(".no-sub-faq");
  if (!root) return;

  const items = root.querySelectorAll(".faq-item");

  items.forEach((item) => {
    const btn = item.querySelector(".faq-q");
    const panel = item.querySelector(".faq-a");
    if (!btn || !panel) return;

    btn.addEventListener("click", () => {
      const isActive = item.classList.contains("active");

      if (isActive) {
        item.classList.remove("active");
        btn.setAttribute("aria-expanded", "false");
      } else {
        item.classList.add("active");
        btn.setAttribute("aria-expanded", "true");
      }
    });
  });
}

function initProductViewSwiper() {
  const mainEl = document.querySelector(".no-sub-product-view-swiper");
  const thumbEl = document.querySelector(".no-sub-product-thumb-swiper");
  if (!mainEl || !thumbEl) return;

  const thumbSwiper = new Swiper(thumbEl, {
    spaceBetween: 12,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
  });

  new Swiper(mainEl, {
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: thumbSwiper,
    },
    autoplay: {
      delay: 3000, // 3초 간격
      disableOnInteraction: false, // 유저가 클릭해도 자동재생 유지
    },
  });
}

function initShowRoomSwiper() {
  const el = document.querySelector(".no-sub-showroom-swiper");
  if (!el) return;

  new Swiper(el, {
    loop: false,

    pagination: {
      el: el.querySelector(".swiper-pagination"),
      type: "progressbar",
    },

    navigation: {
      nextEl: el.querySelector(".swiper-button-next"),
      prevEl: el.querySelector(".swiper-button-prev"),
    },

    breakpoints: {
      321: { slidesPerView: 1, spaceBetween: 16 },
      640: { slidesPerView: 1.5, spaceBetween: 16 },
      1024: { slidesPerView: 2, spaceBetween: 20 },
      1440: { slidesPerView: 2.3, spaceBetween: 24 },
    },
  });
}

function dropdown() {
  /*Dropdown Menu*/
  $(".dropdown").click(function () {
    $(this).attr("tabindex", 1).focus();
    $(this).toggleClass("active");
    $(this).find(".dropdown-menu").slideToggle(300);
  });

  /*Dropdown selection and data attribute setting*/
  $(".dropdown .dropdown-menu li").click(function () {
    var selectedText = $(this).text();
    var selectedValue = $(this).data("value");
    console.log(selectedValue);
    $(this).parents(".dropdown").find("span").text(selectedText);
    $(this).parents(".dropdown").data("selected-value", selectedValue);

    // Hidden input for form submission if needed
    $(this).parents(".dropdown").find("input").val(selectedValue);
  });

  /*Additional handling for the calculate specific dropdown*/
  const calculate = document.querySelector(".calculate");

  if (calculate) {
    $(".dropdown .dropdown-menu li").click(function () {
      var selectedText = $(this).text();
      var selectedValue = $(this).data("value");

      $(this).parents(".dropdown").find("span").text(selectedText);
      $(this).parents(".dropdown").data("selected-value", selectedValue);

      // Hidden input for form submission if needed
      $(this).parents(".dropdown").find("input").val(selectedValue);
    });
  }
}

function formHandler() {
  const form = document.querySelector("form");
  if (!form) {
    return;
  }

  const reloadingButton = document.getElementById("reloading");
  if (!reloadingButton) {
    return;
  }
  const captchaImg = document.querySelector("#captcha-img");

  reloadingButton.addEventListener("click", () => {
    const base = "/inc/lib/captcha.n.php";
    captchaImg.src = base + "?_=" + Date.now();
  });
}
