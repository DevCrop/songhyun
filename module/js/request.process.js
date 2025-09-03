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
      // 폼 초기화
      form.reset();

      // 드롭다운 UI를 쓴다면 표시 텍스트/hidden 값도 초기화 (있을 때만)
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

// 페이지 로드 시 submit 이벤트에 함수 연결
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("requestForm");
  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    submitRequestForm(form);
  });
});
