// Helpers - to aid you on your journey.

const debounce = (method, delay) => {
  clearTimeout(method._tId);
  method._tId = setTimeout(function () {
    method();
  }, delay);
};

const isTouchDevice = () => {
  return (
    "ontouchstart" in window ||
    navigator.maxTouchPoints > 0 ||
    navigator.msMaxTouchPoints > 0
  );
};

const disableScroll = () => {
  document.body.classList.add("stop-scrolling");
};

const enableScroll = () => {
  document.body.classList.remove("stop-scrolling");
};

const isOdd = (num) => {
  return num % 2 === 1;
};

const isElementXPercentInViewport = function (el, percentVisible) {
  let rect = el.getBoundingClientRect(),
    windowHeight = window.innerHeight || document.documentElement.clientHeight;

  return !(
    Math.floor(100 - ((rect.top >= 0 ? 0 : rect.top) / +-rect.height) * 100) <
      percentVisible ||
    Math.floor(100 - ((rect.bottom - windowHeight) / rect.height) * 100) <
      percentVisible
  );
};

const isDevice = (device) => {
  let deviceClass = device === "tablet" ? ".tablet-check" : ".mobile-check";
  return window.getComputedStyle(document.querySelector(`${deviceClass}`), null)
    .display === "block"
    ? true
    : false;
};

const delay = (duration) => {
  return new Promise((resolve) => {
    setTimeout(() => resolve(), duration);
  });
};

const offset = (el) => {
  var rect = el.getBoundingClientRect(),
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return { top: rect.top + scrollTop, left: rect.left + scrollLeft };
};

export {
  debounce,
  isTouchDevice,
  disableScroll,
  enableScroll,
  isOdd,
  isElementXPercentInViewport,
  delay,
  offset,
  isDevice,
};
