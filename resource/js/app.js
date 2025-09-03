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
});

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

  // 최초 로드 시 초기 상태 검사
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

function initHeader() {
  const root = document.getElementById("header");

  if (!root) return;

  const body = document.querySelector("body");
  const pageType = body.dataset.page;

  // 서브페이지일경우
  if (pageType === "sub") {
    root.classList.add("transparent");
  }

  //상세페이지일경우
  if (pageType === "view") {
    root.classList.add("normal");
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
    pagination: {
      el: el.querySelector(".swiper-pagination"),
      clickable: true,
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
