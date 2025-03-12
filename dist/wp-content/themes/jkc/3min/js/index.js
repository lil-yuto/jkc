window.onscroll = function () {
        const scrollTopBtn = document.getElementById("scrollTopBtn");
        const footer = document.querySelector("footer");
        const footerTop = footer.getBoundingClientRect().top + window.scrollY; // フッターの絶対位置
        const windowHeight = window.innerHeight;
        const scrollY = window.scrollY;

        // スクロール量が100px以上の場合、戻るボタンを表示
        if (scrollY > 100) {
            scrollTopBtn.style.display = 'block';
        } else {
            scrollTopBtn.style.display = 'none';
        }

        // ボタンをフッター上10pxで止める
        if (scrollY + windowHeight > footerTop + 20) {
            scrollTopBtn.style.bottom = `${windowHeight - (footerTop - scrollY) + 0}px`;
        } else {
            scrollTopBtn.style.bottom = "2rem";
        }
    };

    // スムーススクロールの設定
    document.getElementById("scrollTopBtn").addEventListener("click", function(event) {
        event.preventDefault(); // デフォルトのリンク動作を無効化
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

// const footprints = document.querySelectorAll('.footprint');

// footprints.forEach((footprint, index) => {
//     if (index < 6) {
//         setTimeout(() => {
//         footprint.style.opacity = 1;
//         }, index * 500);
//     }
// });

// const observer = new IntersectionObserver((entries, observer) => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//         entry.target.style.opacity = 1;  // 足跡を表示
//         observer.unobserve(entry.target);  // 監視を解除
//         }
//         });
// }, {
//   threshold: 0.1  // 足跡が10%でも画面に入ったら表示
// });
//     // 各足跡に対して監視を設定
// footprints.forEach((footprint, index) => {
//     if (index >= 6) {
//         observer.observe(footprint);
//     }
// });

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-1");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target); // 一度表示したら監視解除
      }
    });
  }, {
    threshold: 0.9 // 50%見えたら発火
  });

  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-2");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-3");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-4");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-5");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-6");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-7");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-8");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-9");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-10");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-11");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-12");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-13");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-14");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-16");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});

document.addEventListener("DOMContentLoaded", () => {
  const footprints = document.querySelectorAll(".cls-15");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }, 500); // 0.5秒遅延
    }
  });
}, {
  threshold: 0.5 // 100% 見えたら発火
});
  footprints.forEach((footprint) => observer.observe(footprint));
});
