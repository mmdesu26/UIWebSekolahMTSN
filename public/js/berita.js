document.addEventListener("DOMContentLoaded", () => {
  const items = document.querySelectorAll(".reveal");

  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) e.target.classList.add("is-revealed");
    });
  }, { threshold: 0.12 });

  items.forEach((el) => io.observe(el));
});
