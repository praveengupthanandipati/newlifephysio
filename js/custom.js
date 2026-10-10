// Analytics: send a GA4 event. Safe no-op until GA4 is configured
// ($site['analytics']['ga4_id'] in components/data.php loads gtag).
window.nlTrack = function (name, params) {
  if (typeof window.gtag === 'function') window.gtag('event', name, params || {});
};

// Analytics: conversion clicks anywhere on the site (calls, WhatsApp, email,
// booking buttons). link_location says which part of the page it came from.
document.addEventListener('click', function (e) {
  var link = e.target.closest && e.target.closest('a[href]');
  if (!link) return;
  var href = link.getAttribute('href');
  var area = link.closest('header, footer, section');
  var params = {
    link_location: area ? (area.id || area.className.split(' ')[0] || area.tagName.toLowerCase()) : 'page',
    link_text: link.textContent.replace(/\s+/g, ' ').trim().slice(0, 60)
  };
  if (href.indexOf('tel:') === 0) {
    params.phone = href.slice(4);
    window.nlTrack('click_call', params);
  } else if (href.indexOf('wa.me') !== -1) {
    window.nlTrack('click_whatsapp', params);
  } else if (href.indexOf('mailto:') === 0) {
    window.nlTrack('click_email', params);
  } else if (link.hash === '#appointment') {
    window.nlTrack('click_book_cta', params);
  }
});

// Header: Bootstrap offcanvas drawer (below xl) helpers
$(function () {
  var drawerEl = document.getElementById('mhOffcanvas');
  if (!drawerEl || typeof bootstrap === 'undefined') return;
  var drawer = bootstrap.Offcanvas.getOrCreateInstance(drawerEl);

  // The drawer sits inside the sticky header, which is lifted above Bootstrap's
  // backdrop while open (see _header.scss), so taps on the dimmed header must
  // close it here.
  $('.site-header').on('click', function (e) {
    if (drawerEl.classList.contains('show') && !drawerEl.contains(e.target)) drawer.hide();
  });

  // Links to a section of the current page ("#appointment", or
  // "treatments.php#sciatica" while on treatments.php): close the drawer
  // first, then jump once Bootstrap has released the body scroll lock.
  $(drawerEl).on('click', 'a[href*="#"]', function (e) {
    if (!drawerEl.classList.contains('show')) return;
    if (this.pathname !== window.location.pathname || !this.hash) return;
    var target = document.getElementById(decodeURIComponent(this.hash.slice(1)));
    if (!target) return;
    e.preventDefault();
    var hash = this.hash;
    drawerEl.addEventListener('hidden.bs.offcanvas', function () {
      // setting the hash scrolls (honouring scroll-margin) and updates :target
      if (window.location.hash === hash) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      } else {
        window.location.hash = hash;
      }
    }, { once: true });
    drawer.hide();
  });
});

// Home hero carousel
var heroSwiper = new Swiper('.heroSwiper', {
  loop: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  speed: 1000,
  autoplay: {
    delay: 6000,
    disableOnInteraction: false,
  },
  keyboard: {
    enabled: true,
  },
  on: {
    init: heroInertSlides,
    slideChange: heroInertSlides,
  },
});

// Hero controls sit inside every slide (under the buttons), so they are wired
// by delegation; each slide's dots already mark that slide as current.
var heroRefocus = null; // control to focus on the new slide (keyboard users)
$('.home-carousel').on('click', '.hero-prev', function () { heroRefocus = '.hero-prev'; heroSwiper.slidePrev(); })
  .on('click', '.hero-next', function () { heroRefocus = '.hero-next'; heroSwiper.slideNext(); })
  .on('click', '.hero-dot', function () {
    var index = this.getAttribute('data-slide');
    heroRefocus = '.hero-dot[data-slide="' + index + '"]';
    heroSwiper.slideToLoop(+index);
  });

// Faded-out slides stay in the DOM: keep their links and buttons out of the
// tab order, and carry focus over to the same control on the new slide
function heroInertSlides() {
  var swiper = this;
  if (!swiper || !swiper.slides) return;
  Array.prototype.forEach.call(swiper.slides, function (slide, i) {
    var hidden = i !== swiper.activeIndex;
    slide.toggleAttribute('inert', hidden);
    slide.setAttribute('aria-hidden', hidden ? 'true' : 'false');
  });
  if (heroRefocus) {
    var target = swiper.slides[swiper.activeIndex].querySelector(heroRefocus);
    if (target && document.activeElement === document.body) target.focus({ preventScroll: true });
    heroRefocus = null;
  }
}

// Home testimonials carousel: 1 / 2 / 3 cards per view
var tmSwiper = new Swiper('.tmSwiper', {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  speed: 700,
  grabCursor: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.testimonials-home .tm-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.testimonials-home .tm-next',
    prevEl: '.testimonials-home .tm-prev',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 28,
    },
  },
});

// Pause testimonials while hovered (Swiper 5 has no pauseOnMouseEnter)
$('.tmSwiper').on('mouseenter', function () {
  if (tmSwiper.autoplay) tmSwiper.autoplay.stop();
}).on('mouseleave', function () {
  if (tmSwiper.autoplay) tmSwiper.autoplay.start();
});

// Gallery: category filters + full-screen zoom viewer
$(function () {
  var $section = $('.gallery-page');
  var lightbox = document.getElementById('glLightbox');
  if (!$section.length || !lightbox) return;

  var $tabs = $section.find('.svc-tab');
  var $items = $section.find('.gl-item');
  var caption = lightbox.querySelector('.gl-lightbox__caption');
  var current = lightbox.querySelector('.gl-current');
  var zoomBtn = lightbox.querySelector('.gl-zoom-toggle');
  var viewer = null;
  var opener = null;

  // filters
  $tabs.on('click', function () {
    var filter = $(this).data('filter');
    $tabs.removeClass('is-active').attr('aria-pressed', 'false');
    $(this).addClass('is-active').attr('aria-pressed', 'true');
    $items.each(function () {
      this.classList.toggle('is-hidden', filter !== 'all' && this.getAttribute('data-cat') !== filter);
    });
  });

  function setZoomed(zoomed) {
    lightbox.classList.toggle('is-zoomed', zoomed);
    zoomBtn.setAttribute('aria-label', zoomed ? 'Zoom out' : 'Zoom in');
  }

  function update() {
    var slide = viewer.slides[viewer.activeIndex];
    current.textContent = viewer.activeIndex + 1;
    caption.textContent = slide ? slide.getAttribute('data-title') : '';
    setZoomed(false);
  }

  function open(index) {
    opener = document.activeElement;
    lightbox.hidden = false;
    document.documentElement.classList.add('gl-lock');

    if (!viewer) {
      // created on first open, while visible, so Swiper can measure it
      viewer = new Swiper('.glSwiper', {
        initialSlide: index,
        speed: 450,
        spaceBetween: 30,
        preloadImages: false,
        lazy: { loadPrevNext: true },
        zoom: { maxRatio: 3, toggle: false },
        keyboard: { enabled: true },
        navigation: {
          nextEl: '#glLightbox .gl-next',
          prevEl: '#glLightbox .gl-prev',
        },
        on: {
          slideChange: function () { if (viewer) update(); },
          zoomChange: function (scale) { setZoomed(scale > 1); },
          // single tap / click on the photo zooms in and out
          click: function (e) { if (e && e.target.tagName === 'IMG') this.zoom.toggle(); },
        },
      });
      update();
    } else {
      viewer.update();
      viewer.slideTo(index, 0);
      update();
    }

    requestAnimationFrame(function () { lightbox.classList.add('is-open'); });
    lightbox.querySelector('.gl-close').focus();
  }

  function close() {
    if (viewer) viewer.zoom.out();
    lightbox.classList.remove('is-open');
    document.documentElement.classList.remove('gl-lock');
    setTimeout(function () { lightbox.hidden = true; }, 300);
    if (opener) opener.focus();
  }

  $section.on('click', '.gl-item__btn', function () {
    open(parseInt(this.getAttribute('data-index'), 10));
  });

  zoomBtn.addEventListener('click', function () { viewer.zoom.toggle(); });
  lightbox.querySelector('.gl-close').addEventListener('click', close);

  // click on the dark backdrop (outside the photo) closes
  lightbox.addEventListener('click', function (e) {
    if (e.target.classList.contains('swiper-slide') && !lightbox.classList.contains('is-zoomed')) close();
  });

  document.addEventListener('keydown', function (e) {
    if (lightbox.hidden) return;
    if (e.key === 'Escape') close();
    // keep keyboard focus inside the viewer
    if (e.key === 'Tab') {
      var focusables = lightbox.querySelectorAll('button:not(.swiper-button-disabled)');
      var first = focusables[0];
      var last = focusables[focusables.length - 1];
      if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
      else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
    }
  });
});

// Services: category filter tabs
$(function () {
  var $section = $('.services-home');
  if (!$section.length) return;
  var $tabs = $section.find('.svc-tab');
  var $cards = $section.find('.svc-card');

  $tabs.on('click', function () {
    var filter = $(this).data('filter');
    $tabs.removeClass('is-active').attr('aria-pressed', 'false');
    $(this).addClass('is-active').attr('aria-pressed', 'true');

    $cards.each(function () {
      var show = filter === 'all' || this.getAttribute('data-cat') === filter;
      this.classList.remove('is-revealed');
      this.classList.toggle('is-hidden', !show);
    });
    // restart the reveal animation on the cards left visible
    void $section[0].offsetWidth;
    $cards.not('.is-hidden').addClass('is-revealed');
  });
});

// Journey to recovery: draw the timeline once the steps scroll into view
$(function () {
  var steps = document.querySelector('.jr-steps');
  if (!steps) return;
  if (!('IntersectionObserver' in window)) {
    steps.classList.add('is-inview');
    return;
  }
  // Fire once the list's top passes 75% of the viewport height. A ratio
  // threshold could never be reached when the (vertical, mobile) timeline is
  // much taller than the screen.
  var io = new IntersectionObserver(function (entries) {
    if (entries[0].isIntersecting) {
      steps.classList.add('is-inview');
      io.disconnect();
    }
  }, { rootMargin: '0px 0px -25% 0px' });
  io.observe(steps);
});

// FAQ page: live search + topic filters, deep links, open tracking
$(function () {
  var list = document.getElementById('faqList');
  if (!list) return;
  var search = document.getElementById('faqSearch');
  var empty = document.getElementById('faqEmpty');
  var filters = document.querySelectorAll('.faq-filter');
  var groups = list.querySelectorAll('.faq-group');
  var activeCat = 'all';

  function apply() {
    var query = search.value.trim().toLowerCase();
    var anyVisible = false;
    [].forEach.call(groups, function (group) {
      var inCat = activeCat === 'all' || group.getAttribute('data-cat') === activeCat;
      var groupVisible = false;
      [].forEach.call(group.querySelectorAll('.faq-item'), function (item) {
        var match = inCat && (!query || item.textContent.toLowerCase().indexOf(query) !== -1);
        item.classList.toggle('is-hidden', !match);
        if (match) groupVisible = true;
      });
      group.classList.toggle('is-hidden', !groupVisible);
      if (groupVisible) anyVisible = true;
    });
    empty.hidden = anyVisible;
  }

  var searchTimer = null;
  search.addEventListener('input', function () {
    apply();
    // record what people search for (after they pause typing)
    clearTimeout(searchTimer);
    var term = this.value.trim();
    if (term.length > 2) {
      searchTimer = setTimeout(function () { window.nlTrack('search', { search_term: term, location: 'faq' }); }, 1200);
    }
  });

  [].forEach.call(filters, function (btn) {
    btn.addEventListener('click', function () {
      activeCat = this.getAttribute('data-filter');
      [].forEach.call(filters, function (b) {
        var on = b === btn;
        b.classList.toggle('is-active', on);
        b.setAttribute('aria-pressed', on ? 'true' : 'false');
      });
      apply();
    });
  });

  // Which questions get opened (GA4)
  list.addEventListener('show.bs.collapse', function (e) {
    var item = e.target.closest('.faq-item');
    if (item) window.nlTrack('faq_open', { question: item.querySelector('.faq-item__q').textContent.trim() });
  });

  // Deep link (faq.php#faq-is-physiotherapy-painful): open that answer
  function openFromHash() {
    var id = decodeURIComponent(window.location.hash.slice(1));
    var item = id && document.getElementById(id);
    if (!item || !item.classList.contains('faq-item') || typeof bootstrap === 'undefined') return;
    bootstrap.Collapse.getOrCreateInstance(item.querySelector('.accordion-collapse'), { toggle: false }).show();
    setTimeout(function () { item.scrollIntoView({ behavior: 'smooth', block: 'start' }); }, 650);
  }
  openFromHash();
  window.addEventListener('hashchange', openFromHash);
});

// Treatments page: contents highlighting, mobile jump menu, deep links
$(function () {
  var toc = document.getElementById('trtToc');
  if (!toc) return;

  // Highlight the condition currently on screen in the sticky contents.
  // Active = the last section whose top has passed just below the sticky
  // header. Deterministic, so it is right after direct jumps (deep links,
  // contents clicks) as well as normal scrolling.
  var links = toc.querySelectorAll('.trt-toc__link');
  var catLinks = toc.querySelectorAll('.trt-toc__cat');
  var items = [].map.call(links, function (link) {
    return document.getElementById(link.getAttribute('href').slice(1));
  });
  var current = -1;
  var ticking = false;

  function updateActive() {
    ticking = false;
    var line = 170; // px from the viewport top, just under the header
    var index = 0;
    for (var i = 0; i < items.length; i++) {
      if (items[i] && items[i].getBoundingClientRect().top <= line) index = i;
    }
    if (index === current) return;
    current = index;

    [].forEach.call(links, function (link, i) {
      link.classList.toggle('active', i === index);
    });
    var cat = items[index].getAttribute('data-cat');
    [].forEach.call(catLinks, function (link) {
      link.classList.toggle('active', link.getAttribute('href') === '#cat-' + cat);
    });

    // keep the active entry visible inside the scrollable contents box
    var link = links[index];
    if (link.offsetTop < toc.scrollTop + 40 || link.offsetTop > toc.scrollTop + toc.clientHeight - 60) {
      toc.scrollTop = link.offsetTop - toc.clientHeight / 2;
    }
  }

  $(window).on('scroll resize', function () {
    if (!ticking) {
      ticking = true;
      requestAnimationFrame(updateActive);
    }
  });
  updateActive();

  // Mobile "Jump to a condition" select
  var jump = document.getElementById('trtJump');
  if (jump) {
    jump.addEventListener('change', function () {
      if (!this.value) return;
      window.nlTrack('select_content', { content_type: 'treatment', item_id: this.value });
      window.location.hash = this.value;
    });
  }

  // Arriving from another page (e.g. index.php -> treatments.php#sciatica):
  // re-align once the page loader has gone, in case anything above the
  // section shifted while loading. :target styling highlights the section.
  function alignToHash() {
    var id = decodeURIComponent(window.location.hash.slice(1));
    var target = id && document.getElementById(id);
    if (!target) return;
    setTimeout(function () {
      target.scrollIntoView({ block: 'start' });
    }, 650);
  }
  // "load" may already have fired on fast / cached loads
  if (document.readyState === 'complete') {
    alignToHash();
  } else {
    $(window).on('load', alignToHash);
  }
});

// Stat counters: [data-count-to="26"] counts up from 0 when scrolled into view
$(function () {
  var counters = document.querySelectorAll('[data-count-to]');
  if (!counters.length) return;
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function run(el) {
    var target = parseInt(el.getAttribute('data-count-to'), 10) || 0;
    if (reduceMotion) {
      el.textContent = target;
      return;
    }
    var duration = 1400;
    var start = null;
    function step(now) {
      if (start === null) start = now;
      var p = Math.min((now - start) / duration, 1);
      // ease-out cubic so the count settles gently
      el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  if (!('IntersectionObserver' in window)) {
    counters.forEach(run);
    return;
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        run(entry.target);
        io.unobserve(entry.target);
      }
    });
  }, { rootMargin: '0px 0px -15% 0px' });
  counters.forEach(function (el) { io.observe(el); });
});

// Categories carousel
var categoriesSwiper = new Swiper('.categoriesSwiper', {
  slidesPerView: 2,
  spaceBetween: 14,
  loop: true,
  speed: 700,
  autoplay: {
    delay: 2800,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  pagination: {
    el: '.categories-section .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.category-swiper-next',
    prevEl: '.category-swiper-prev',
  },
  breakpoints: {
    480: {
      slidesPerView: 2,
      spaceBetween: 16,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 18,
    },
    900: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 22,
    },
    1400: {
      slidesPerView: 6,
      spaceBetween: 24,
    },
  },
});

var swiper = new Swiper('.swiper-testimonials-home', {
      slidesPerView: 1,
      spaceBetween: 10,
	   autoplay: {
        delay: 5000,
        disableOnInteraction: true,
      },
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
      }
    });
// Custom Marquee JS for immediate repeat and pause on hover
document.addEventListener('DOMContentLoaded', function() {
  var marquee = document.querySelector('.custom-marquee');
  if (marquee) {
    // Duplicate content for seamless loop
    marquee.innerHTML += marquee.innerHTML;
  }
});

     var swiper = new Swiper(".mySwiper-hero", {
      slidesPerView: 1,
      spaceBetween: 2,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".hero-swiper-next",
        prevEl: ".hero-swiper-prev",
      },
      loop: true,
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    });


    var swiper = new Swiper(".mySwiper-hero-right", {
      spaceBetween: 30,
       autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      effect: "fade",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });



// Header: collapse the top info bar once the page is scrolled, leaving
// just the compact nav sticky at the top.
// Collapsing shrinks the sticky header's own height, which shifts the
// page content and scroll position right at the same threshold that
// triggers the collapse - a single trigger point flickers on/off in a
// loop. A gap between the collapse/expand thresholds (hysteresis) stops
// that: once collapsed, only scrolling back up past a lower point
// re-expands it, so the shrink itself can never retrigger the toggle.
$(function () {
  const $header = $(".site-header");
  let isScrolled = false;
  function toggleHeaderClass() {
    const scrollTop = $(window).scrollTop();
    if (!isScrolled && scrollTop > 80) {
      isScrolled = true;
      $header.addClass("is-scrolled");
    } else if (isScrolled && scrollTop < 40) {
      isScrolled = false;
      $header.removeClass("is-scrolled");
    }
  }
  $(window).on('scroll', toggleHeaderClass);
  toggleHeaderClass(); // Run on page load
  
  // Initialize AOS with premium settings
  if (typeof AOS !== 'undefined') {
    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    AOS.init({
      duration: 800,
      once: true,
      offset: 60,
      easing: 'ease-out-cubic',
      anchorPlacement: 'top-bottom',
      disable: prefersReducedMotion
    });
    // images/fonts finishing late shift the layout, so re-measure once everything has loaded
    $(window).on('load', function () { AOS.refresh(); });
  }

  // Scroll progress bar (one rAF-throttled listener)
  var progressBar = document.getElementById('scrollProgress');
  if (progressBar) {
    var progressTicking = false;
    var updateProgress = function () {
      var doc = document.documentElement;
      var max = (doc.scrollHeight - window.innerHeight) || 1;
      var ratio = Math.min(1, Math.max(0, (window.pageYOffset || doc.scrollTop) / max));
      progressBar.style.webkitTransform = 'scaleX(' + ratio + ')';
      progressBar.style.transform = 'scaleX(' + ratio + ')';
      progressTicking = false;
    };
    var raf = window.requestAnimationFrame || function (cb) { return setTimeout(cb, 16); };
    $(window).on('scroll resize', function () {
      if (!progressTicking) {
        progressTicking = true;
        raf(updateProgress);
      }
    });
    updateProgress();
  }

  // Scroll-triggered number counter animation
  function animateCounters() {
    var counters = document.querySelectorAll('.safety-col .number');
    var observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var target = parseInt(el.textContent);
          var count = 0;
          var increment = 1;
          var timer = setInterval(function() {
            count += increment;
            el.textContent = count < 10 ? '0' + count : count;
            if (count >= target) {
              clearInterval(timer);
              el.textContent = target < 10 ? '0' + target : target;
            }
          }, 150);
          observer.unobserve(el);
        }
      });
    }, { threshold: 0.5 });
    counters.forEach(function(counter) {
      observer.observe(counter);
    });
  }
  animateCounters();

  // Subtle parallax for decorative icons on scroll
  $(window).on('scroll', function() {
    var scrollTop = $(window).scrollTop();
    $('.whovr01icon').css('transform', 'translateY(' + (scrollTop * 0.04) + 'px)');
    $('.whovr02icon').css('transform', 'translateY(' + (scrollTop * -0.03) + 'px)');
    $('.reachicon01').css('transform', 'translateY(' + (scrollTop * 0.05) + 'px) rotate(' + (scrollTop * 0.02) + 'deg)');
    $('.reachicon02').css('transform', 'translateY(' + (scrollTop * -0.04) + 'px) rotate(' + (scrollTop * -0.015) + 'deg)');
    $('.zoneicon01').css('transform', 'translateY(' + (scrollTop * 0.03) + 'px)');
  });
});
// Only handle mobile: remove styles on resize to mobile
$(function () {
  function handleDropdownMobile() {
    if (window.innerWidth <= 1199) { // drawer menu below xl (see $nav-desktop)
      $(".navbar-nav .dropdown").off('mouseenter mouseleave');
      $(".navbar-nav .dropdown-menu").removeAttr('style');
    }
  }
  handleDropdownMobile();
  $(window).on('resize', handleDropdownMobile);
});


//on click move to browser top
$(document).ready(function () {
  var $movetop = $("#movetop");

  $(window).scroll(function () {
    $movetop.toggleClass("is-visible", $(this).scrollTop() > 400);
  });

  //click event to smooth-scroll to top
  $movetop.click(function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
});

//swiper home banmner
var swiper = new Swiper(".homeSwiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 1200,
  // effect: "cube",
  // cubeEffect: {
  //   slideShadows: false,
  // },
  // effect: "flip",
  // flipEffect: {
  //   slideShadows: false,
  // },
  // Boolean: true,
  parallax: true,
  autoplay: {
    delay: 8000,
    disableOnInteraction: true,
  },
  loop: true,
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Testimonials carousel (12 slides, smooth continuous loop)
var testimonialsSwiper = new Swiper(".testimonials-swiper", {
  slidesPerView: 1,
  spaceBetween: 24,
  loop: true,
  speed: 700,
  grabCursor: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  pagination: {
    el: ".testimonials-section .swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".testimonials-section .swiper-button-next",
    prevEl: ".testimonials-section .swiper-button-prev",
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 28,
    },
  },
});

//speakers
var swiper = new Swiper(".swiper-speakers", {
  slidesPerView: 1,
  spaceBetween: 10,
  // loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: true,
  },
  // init: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 10,
    },
    1500: {
      slidesPerView: 7,
      spaceBetween: 10,
    },
  },
});

(function () {
  function hidePageLoader() {
    setTimeout(function () {
      var loader = document.getElementById("load");
      if (loader) loader.classList.add("is-hidden");
    }, 500);
  }
  // If the document already finished loading by the time this script runs
  // (common on fast/cached loads), "complete" has already fired and
  // onreadystatechange would never trigger — hide the loader right away.
  if (document.readyState === "complete") {
    hidePageLoader();
  } else {
    document.onreadystatechange = function () {
      if (document.readyState === "complete") {
        hidePageLoader();
      }
    };
  }
})();


// Mobile category drawer (off-canvas)
$(function () {
  var $toggle = $('#menuToggle');
  var $drawer = $('#mobileCategoryDrawer');
  var $backdrop = $('#mobileDrawerBackdrop');
  var $closeBtn = $('#mobileDrawerClose');
  if (!$toggle.length || !$drawer.length) return;

  function openDrawer() {
    $drawer.addClass('is-active').attr('aria-hidden', 'false');
    $backdrop.addClass('is-active');
    $toggle.addClass('is-active').attr('aria-expanded', 'true');
    $('body').addClass('drawer-open');
  }

  function closeDrawer() {
    $drawer.removeClass('is-active').attr('aria-hidden', 'true');
    $backdrop.removeClass('is-active');
    $toggle.removeClass('is-active').attr('aria-expanded', 'false');
    $('body').removeClass('drawer-open');
  }

  $toggle.on('click', function () {
    if ($drawer.hasClass('is-active')) {
      closeDrawer();
    } else {
      openDrawer();
    }
  });

  $closeBtn.on('click', closeDrawer);
  $backdrop.on('click', closeDrawer);

  $(document).on('keyup', function (e) {
    if (e.key === 'Escape') closeDrawer();
  });
});

// Tab Products - desktop tabs / mobile accordion
$(function () {
  var $tabProducts = $('.tab-products');
  if (!$tabProducts.length) return;

  function setActiveTab(target) {
    $tabProducts.attr('data-active', target);
    $tabProducts.find('.tab-group').removeClass('is-current');
    $tabProducts.find('.tab-group[data-category="' + target + '"]').addClass('is-current');
  }

  // Desktop tabs
  setActiveTab($tabProducts.attr('data-active') || 'all');

  $tabProducts.on('click', '.tab-btn', function () {
    var target = $(this).data('target');
    $(this).addClass('is-active').siblings('.tab-btn').removeClass('is-active');
    setActiveTab(target);
  });

  // Mobile accordion (single-open)
  $tabProducts.on('click', '.accordion-header', function () {
    var $group = $(this).closest('.tab-group');
    var isOpen = $group.hasClass('is-open');
    $group.siblings('.tab-group').removeClass('is-open');
    $group.toggleClass('is-open', !isOpen);
  });
});

// Header search modal - autocomplete with product catalog, auto-populated on open
$(function () {
  var products = [
    { name: "Floral Party Wear Dress", category: "Dresses" },
    { name: "Emerald Green Casual Dress", category: "Dresses" },
    { name: "Designer Anarkali Dress", category: "Dresses" },
    { name: "Indo-Western Fusion Dress", category: "Dresses" },
    { name: "Ivory Wedding Gown", category: "Dresses" },
    { name: "Chiffon A-Line Dress", category: "Dresses" },
    { name: "Sequin Evening Gown", category: "Dresses" },
    { name: "Cotton Summer Dress", category: "Dresses" },
    { name: "Georgette Office Wear Dress", category: "Dresses" },
    { name: "Kanjivaram Silk Saree", category: "Sarees" },
    { name: "Banarasi Wedding Saree", category: "Sarees" },
    { name: "Chanderi Cotton Saree", category: "Sarees" },
    { name: "Bandhani Printed Saree", category: "Sarees" },
    { name: "Designer Georgette Saree", category: "Sarees" },
    { name: "Bridal Red Silk Saree", category: "Sarees" },
    { name: "Pastel Chiffon Saree", category: "Sarees" },
    { name: "Handloom Cotton Saree", category: "Sarees" },
    { name: "Festive Printed Saree", category: "Sarees" },
    { name: "Kundan Bridal Necklace Set", category: "Jewelleries" },
    { name: "Temple Gold Earrings", category: "Jewelleries" },
    { name: "Antique Silver Bangles", category: "Jewelleries" },
    { name: "Fashion Statement Rings", category: "Jewelleries" },
    { name: "Pearl Drop Earrings", category: "Jewelleries" },
    { name: "Polki Choker Necklace", category: "Jewelleries" },
    { name: "Meenakari Jhumka Earrings", category: "Jewelleries" }
  ];

  var $input = $('#headerSearchInput');
  var $box = $('#searchSuggestions');
  var $modal = $('#searchModal');
  var activeIndex = -1;

  if (!$input.length || !$box.length) return;

  function escapeRegExp(str) {
    return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  }

  function renderList(list, query) {
    $box.empty();
    activeIndex = -1;

    if (!list.length) {
      $box.append('<div class="no-results">No products found</div>');
      $box.addClass('active');
      return;
    }

    if (!query) {
      $box.append('<div class="suggestion-label">All Products (' + list.length + ')</div>');
    } else {
      $box.append('<div class="suggestion-label">' + list.length + ' result' + (list.length === 1 ? '' : 's') + '</div>');
    }

    list.forEach(function (p) {
      var label = p.name;
      if (query) {
        var re = new RegExp('(' + escapeRegExp(query) + ')', 'ig');
        label = p.name.replace(re, '<strong>$1</strong>');
      }
      var $item = $(
        '<div class="suggestion-item">' +
          '<svg class="suggestion-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/><path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>' +
          '<span class="item-name">' + label + '</span>' +
          '<span class="item-category">' + p.category + '</span>' +
        '</div>'
      );
      $item.attr('data-name', p.name);
      $box.append($item);
    });

    $box.addClass('active');
  }

  function filterProducts(val) {
    var q = val.toLowerCase();
    return products.filter(function (p) {
      return p.name.toLowerCase().indexOf(q) !== -1 || p.category.toLowerCase().indexOf(q) !== -1;
    });
  }

  function refresh() {
    var val = $input.val().trim();
    if (!val) {
      renderList(products, '');
    } else {
      renderList(filterProducts(val), val);
    }
  }

  $input.on('focus input', refresh);

  $box.on('click', '.suggestion-item', function () {
    $input.val($(this).attr('data-name'));
    refresh();
  });

  $input.on('keydown', function (e) {
    var $items = $box.find('.suggestion-item');
    if (!$items.length) return;

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      activeIndex = (activeIndex + 1) % $items.length;
      $items.removeClass('active-item').eq(activeIndex).addClass('active-item');
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      activeIndex = (activeIndex - 1 + $items.length) % $items.length;
      $items.removeClass('active-item').eq(activeIndex).addClass('active-item');
    } else if (e.key === 'Enter') {
      if (activeIndex > -1) {
        e.preventDefault();
        $items.eq(activeIndex).trigger('click');
      }
    }
  });

  // Reset on open/close: the product list stays hidden until the user
  // clicks into the field or starts typing (see the 'focus input' handler above).
  if ($modal.length) {
    $modal.on('shown.bs.modal', function () {
      $input.val('');
      $box.empty().removeClass('active');
    });
    $modal.on('hidden.bs.modal', function () {
      $input.val('');
      $box.empty().removeClass('active');
    });
  }
});

// Load download links only when user scrolls near them
document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const link = entry.target;
        link.href = link.dataset.src;
        observer.unobserve(link);
      }
    });
  });

  document.querySelectorAll('[data-src]').forEach(el => {
    observer.observe(el);
  });
});

// Footer copyright year
document.addEventListener('DOMContentLoaded', function () {
  var yearEl = document.getElementById('footerYear');
  if (yearEl) yearEl.textContent = new Date().getFullYear();
});

// Contact form: client-side validation + AJAX submit to contact-submit.php
// (the server re-validates everything with the same rules)
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('contactForm');
  if (!form) return;

  var alertBox = document.getElementById('contactAlert');
  var submitBtn = document.getElementById('contactSubmit');
  var counter = document.getElementById('ctCount');

  var rules = {
    name: function (v) {
      if (!v) return 'Please enter your name.';
      if (v.length < 2 || v.length > 80 || !/^[A-Za-zÀ-ɏऀ-෿][A-Za-zÀ-ɏऀ-෿\s.'-]*$/.test(v)) return 'Please enter a valid name (letters only, 2-80 characters).';
    },
    phone: function (v) {
      if (!v) return 'Please enter your mobile number.';
      var digits = v.replace(/[\s().-]/g, '').replace(/^(?:\+?91|0)(?=\d{10}$)/, '');
      if (!/^[6-9]\d{9}$/.test(digits)) return 'Please enter a valid 10 digit mobile number.';
    },
    email: function (v) {
      // optional
      if (v && (v.length > 120 || !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v))) return 'Please enter a valid email address, or leave it empty.';
    },
    subject: function (v) {
      if (!v) return 'Please select a subject.';
    },
    message: function (v) {
      if (!v) return 'Please enter your message.';
      if (v.length < 10) return 'Please write at least 10 characters.';
      if (v.length > 1000) return 'Please keep your message under 1000 characters.';
    },
    consent: function (v) {
      if (!v) return 'Please agree so we can contact you.';
    }
  };

  function valueOf(name) {
    var input = form.elements[name];
    return input.type === 'checkbox' ? (input.checked ? '1' : '') : input.value.trim();
  }

  function showError(name, message) {
    var input = form.elements[name];
    var out = form.querySelector('[data-error-for="' + name + '"]');
    if (input) {
      input.classList.toggle('is-invalid', !!message);
      input.setAttribute('aria-invalid', message ? 'true' : 'false');
    }
    if (out) out.textContent = message || '';
  }

  function validateField(name) {
    var message = rules[name](valueOf(name)) || '';
    showError(name, message);
    return !message;
  }

  function showAlert(type, message) {
    alertBox.className = 'contact-alert contact-alert-' + type;
    alertBox.textContent = message;
    alertBox.hidden = false;
  }

  function updateCount() {
    if (counter) counter.textContent = form.elements.message.value.length;
  }

  Object.keys(rules).forEach(function (name) {
    var input = form.elements[name];
    input.addEventListener('blur', function () { if (input.type !== 'checkbox') validateField(name); });
    input.addEventListener('change', function () { validateField(name); });
    input.addEventListener('input', function () {
      if (input.classList.contains('is-invalid')) validateField(name);
    });
  });

  // keep only digits and common separators in the mobile field
  form.elements.phone.addEventListener('input', function () {
    this.value = this.value.replace(/[^\d+\s-]/g, '');
  });
  form.elements.message.addEventListener('input', updateCount);

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    alertBox.hidden = true;

    var firstInvalid = null;
    Object.keys(rules).forEach(function (name) {
      if (!validateField(name) && !firstInvalid) firstInvalid = form.elements[name];
    });
    if (firstInvalid) {
      firstInvalid.focus();
      return;
    }

    submitBtn.disabled = true;
    submitBtn.classList.add('is-busy');
    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data.status === 'success') {
          window.nlTrack('generate_lead', { form_name: 'contact', subject: form.elements.subject.value });
          form.reset();
          updateCount();
          Object.keys(rules).forEach(function (name) { showError(name, ''); });
        } else if (data.errors) {
          Object.keys(data.errors).forEach(function (name) { showError(name, data.errors[name]); });
        }
        showAlert(data.status === 'success' ? 'success' : 'error', data.message || 'Something went wrong. Please try again.');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      })
      .catch(function () {
        showAlert('error', 'Network error. Please check your connection and try again.');
      })
      .finally(function () {
        submitBtn.disabled = false;
        submitBtn.classList.remove('is-busy');
      });
  });
});

// Free appointment page: booking form validation, open-day / time-slot checks
// and AJAX submit to appointment.php (the server re-validates everything)
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('bookForm');
  if (!form) return;

  var alertBox = document.getElementById('bookAlert');
  var submitBtn = document.getElementById('bookSubmit');
  var openDays = form.getAttribute('data-open-days').split(',');
  var dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var slotItems = form.querySelectorAll('.ap-choice--time .ap-choice__item');

  // "2026-10-12" -> "Monday" (parsed as a local date, no timezone shift)
  function weekday(value) {
    var p = value.split('-');
    return p.length === 3 ? dayNames[new Date(+p[0], p[1] - 1, +p[2]).getDay()] : '';
  }

  var rules = {
    patient: function (v) {
      if (!v) return 'Please choose who the appointment is for.';
    },
    name: function (v) {
      if (!v) return 'Please enter the patient name.';
      if (v.length < 2 || v.length > 80 || !/^[A-Za-zÀ-ɏऀ-෿][A-Za-zÀ-ɏऀ-෿\s.'-]*$/.test(v)) return 'Please enter a valid name (letters only, 2-80 characters).';
    },
    phone: function (v) {
      if (!v) return 'Please enter your mobile number.';
      var digits = v.replace(/[\s().-]/g, '').replace(/^(?:\+?91|0)(?=\d{10}$)/, '');
      if (!/^[6-9]\d{9}$/.test(digits)) return 'Please enter a valid 10 digit mobile number.';
    },
    treatment: function (v) {
      if (!v) return 'Please select a condition or treatment.';
    },
    city: function (v) {
      if (!v) return 'Please select your city.';
    },
    date: function (v) {
      if (!v) return 'Please choose your preferred date.';
      var input = form.elements.date;
      if (v < input.min || v > input.max) return 'Please choose a date within the next 60 days.';
      if (openDays.indexOf(weekday(v)) === -1) return 'The clinic is closed on that day. Please choose another date.';
    },
    slot: function (v) {
      if (!v) return 'Please choose a preferred time.';
    },
    email: function (v) {
      if (v && (v.length > 120 || !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v))) return 'Please enter a valid email address, or leave it empty.';
    },
    consent: function (v) {
      if (!v) return 'Please agree so we can contact you.';
    }
  };

  function field(name) {
    return form.elements[name];
  }

  function valueOf(name) {
    var input = field(name);
    if (input.type === 'checkbox') return input.checked ? '1' : '';
    return (input.value || '').trim(); // RadioNodeList.value for radio groups
  }

  // element that gets the red outline: the input, or the radio group box
  function target(name) {
    var input = field(name);
    return input.length && !input.tagName ? input[0].closest('.ap-choice') : input;
  }

  function showError(name, message) {
    var el = target(name);
    var out = form.querySelector('[data-error-for="' + name + '"]');
    if (el) {
      el.classList.toggle('is-invalid', !!message);
      if (el.tagName) el.setAttribute('aria-invalid', message ? 'true' : 'false');
    }
    if (out) out.textContent = message || '';
  }

  function validateField(name) {
    var message = rules[name](valueOf(name)) || '';
    showError(name, message);
    return !message;
  }

  function showAlert(type, message) {
    alertBox.className = 'contact-alert contact-alert-' + type;
    alertBox.textContent = message;
    alertBox.hidden = false;
  }

  // Grey out the times the clinic is closed on the chosen day (e.g. Sunday evening)
  function syncSlots() {
    var day = weekday(field('date').value);
    Array.prototype.forEach.call(slotItems, function (item) {
      var available = !day || item.getAttribute('data-days').split(',').indexOf(day) !== -1;
      var radio = item.querySelector('input');
      radio.disabled = !available;
      item.classList.toggle('is-disabled', !available);
      if (!available && radio.checked) radio.checked = false;
    });
  }

  Object.keys(rules).forEach(function (name) {
    var input = field(name);
    var inputs = input.length && !input.tagName ? Array.prototype.slice.call(input) : [input];
    inputs.forEach(function (el) {
      el.addEventListener('change', function () { validateField(name); });
      if (el.type !== 'radio' && el.type !== 'checkbox') {
        el.addEventListener('blur', function () { validateField(name); });
        el.addEventListener('input', function () {
          if (el.classList.contains('is-invalid')) validateField(name);
        });
      }
    });
  });

  field('date').addEventListener('change', syncSlots);
  field('phone').addEventListener('input', function () {
    this.value = this.value.replace(/[^\d+\s-]/g, '');
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    alertBox.hidden = true;

    var firstInvalid = null;
    Object.keys(rules).forEach(function (name) {
      if (!validateField(name) && !firstInvalid) {
        var input = field(name);
        firstInvalid = input.length && !input.tagName ? input[0] : input;
      }
    });
    if (firstInvalid) {
      firstInvalid.focus();
      return;
    }

    submitBtn.disabled = true;
    submitBtn.classList.add('is-busy');
    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data.status === 'success') {
          window.nlTrack('generate_lead', {
            form_name: 'free_appointment',
            treatment: field('treatment').value,
            city: field('city').value
          });
          form.reset();
          syncSlots();
          Object.keys(rules).forEach(function (name) { showError(name, ''); });
        } else if (data.errors) {
          Object.keys(data.errors).forEach(function (name) { showError(name, data.errors[name]); });
        }
        showAlert(data.status === 'success' ? 'success' : 'error', data.message || 'Something went wrong. Please try again.');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      })
      .catch(function () {
        showAlert('error', 'Network error. Please check your connection and try again.');
      })
      .finally(function () {
        submitBtn.disabled = false;
        submitBtn.classList.remove('is-busy');
      });
  });
});

// Contact page: highlight today in the timings and show open / closed (clinic time, IST)
document.addEventListener('DOMContentLoaded', function () {
  var list = document.getElementById('ctHours');
  var badge = document.getElementById('ctStatus');
  if (!list || !badge) return;

  var now;
  try {
    var parts = {};
    new Intl.DateTimeFormat('en-GB', {
      timeZone: 'Asia/Kolkata', weekday: 'long', hour: '2-digit', minute: '2-digit', hourCycle: 'h23'
    }).formatToParts(new Date()).forEach(function (p) { parts[p.type] = p.value; });
    now = { day: parts.weekday, minutes: parseInt(parts.hour, 10) * 60 + parseInt(parts.minute, 10) };
  } catch (err) {
    return; // very old browser: just show the table
  }

  function toMinutes(hhmm) {
    var t = hhmm.split(':');
    return parseInt(t[0], 10) * 60 + parseInt(t[1], 10);
  }

  var row = list.querySelector('[data-day="' + now.day + '"]');
  if (!row) return;
  row.classList.add('is-today');

  var open = row.getAttribute('data-slots').split(',').filter(Boolean).some(function (slot) {
    var range = slot.split('-');
    return now.minutes >= toMinutes(range[0]) && now.minutes < toMinutes(range[1]);
  });
  badge.textContent = open ? 'Open now' : 'Closed now';
  badge.classList.add(open ? 'is-open' : 'is-closed');
  badge.hidden = false;
});

// Free consultation form: client-side validation + AJAX submit (the server re-validates everything)
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('apptForm');
  if (!form) return;

  var alertBox = document.getElementById('apptAlert');
  var submitBtn = document.getElementById('apptSubmit');

  var rules = {
    name: function (v) {
      if (!v) return 'Please enter the patient name.';
      if (v.length < 2 || v.length > 80 || !/^[A-Za-zÀ-ɏऀ-෿][A-Za-zÀ-ɏऀ-෿\s.'-]*$/.test(v)) return 'Please enter a valid name (letters only, 2-80 characters).';
    },
    phone: function (v) {
      if (!v) return 'Please enter your mobile number.';
      var digits = v.replace(/[\s().-]/g, '').replace(/^(?:\+?91|0)(?=\d{10}$)/, '');
      if (!/^[6-9]\d{9}$/.test(digits)) return 'Please enter a valid 10 digit mobile number.';
    },
    city: function (v) {
      if (!v) return 'Please select your city.';
    },
    treatment: function (v) {
      if (!v) return 'Please select a disease or treatment.';
    }
  };

  function showError(name, message) {
    var input = form.elements[name];
    var out = form.querySelector('[data-error-for="' + name + '"]');
    if (input) input.classList.toggle('is-invalid', !!message);
    if (out) out.textContent = message || '';
  }

  function validateField(name) {
    var message = rules[name](form.elements[name].value.trim()) || '';
    showError(name, message);
    return !message;
  }

  function showAlert(type, message) {
    alertBox.className = 'contact-alert contact-alert-' + type;
    alertBox.textContent = message;
    alertBox.hidden = false;
  }

  Object.keys(rules).forEach(function (name) {
    var input = form.elements[name];
    input.addEventListener('blur', function () { validateField(name); });
    input.addEventListener('input', function () {
      if (input.classList.contains('is-invalid')) validateField(name);
    });
    input.addEventListener('change', function () { validateField(name); });
  });

  // keep only digits and common separators in the mobile field
  form.elements.phone.addEventListener('input', function () {
    this.value = this.value.replace(/[^\d+\s-]/g, '');
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    alertBox.hidden = true;

    var firstInvalid = null;
    Object.keys(rules).forEach(function (name) {
      if (!validateField(name) && !firstInvalid) firstInvalid = form.elements[name];
    });
    if (firstInvalid) {
      firstInvalid.focus();
      return;
    }

    submitBtn.disabled = true;
    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data.status === 'success') {
          // GA4 key event; read the choices before reset() clears them
          window.nlTrack('generate_lead', {
            form_name: 'free_consultation',
            treatment: form.elements.treatment.value,
            city: form.elements.city.value
          });
          form.reset();
          Object.keys(rules).forEach(function (name) { showError(name, ''); });
        } else if (data.errors) {
          Object.keys(data.errors).forEach(function (name) { showError(name, data.errors[name]); });
        }
        showAlert(data.status === 'success' ? 'success' : 'error', data.message || 'Something went wrong. Please try again.');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      })
      .catch(function () {
        showAlert('error', 'Network error. Please check your connection and try again.');
      })
      .finally(function () { submitBtn.disabled = false; });
  });
});

// Accordions: opening one FAQ item closes every other open item on the page
document.addEventListener('toggle', function (e) {
  var item = e.target;
  if (!item.matches || !item.matches('details.faq-item') || !item.open) return;
  document.querySelectorAll('details.faq-item[open]').forEach(function (other) {
    if (other !== item) other.open = false;
  });
}, true);

// Footer accordions: Quick Links / Our Services collapse on mobile only, one open at a time
document.addEventListener('DOMContentLoaded', function () {
  var footer = document.querySelector('.site-footer');
  var cols = footer ? footer.querySelectorAll('.footer-acc') : [];
  if (!cols.length) return;

  var mobile = window.matchMedia('(max-width: 575.98px)');
  footer.classList.add('acc-ready');

  function setState(col, open) {
    col.classList.toggle('is-open', open);
    col.querySelector('.footer-acc-btn').setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  function sync() {
    Array.prototype.forEach.call(cols, function (col) {
      var btn = col.querySelector('.footer-acc-btn');
      btn.disabled = !mobile.matches;
      if (mobile.matches) {
        setState(col, col.classList.contains('is-open'));
      } else {
        col.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  }

  Array.prototype.forEach.call(cols, function (col) {
    col.querySelector('.footer-acc-btn').addEventListener('click', function () {
      if (!mobile.matches) return;
      var willOpen = !col.classList.contains('is-open');
      Array.prototype.forEach.call(cols, function (c) { setState(c, false); });
      setState(col, willOpen);
    });
  });

  if (mobile.addEventListener) {
    mobile.addEventListener('change', sync);
  } else {
    mobile.addListener(sync);
  }
  sync();
});

// Searchable dropdowns: every form <select> gets a search box. The native <select> stays in the DOM
// (hidden) so form submission, validation and reset keep working.
document.addEventListener('DOMContentLoaded', function () {
  var openInstance = null;

  function enhance(select) {
    var placeholder = null;
    var items = [];
    Array.prototype.forEach.call(select.options, function (o) {
      if (o.disabled || o.value === '') {
        if (!placeholder) placeholder = o;
      } else {
        items.push(o);
      }
    });

    var trigger = document.createElement('button');
    trigger.type = 'button';
    trigger.className = select.className.replace(/\bis-invalid\b/g, '').trim() + ' ss-trigger';
    trigger.setAttribute('aria-haspopup', 'listbox');
    trigger.setAttribute('aria-expanded', 'false');
    var valueEl = document.createElement('span');
    valueEl.className = 'ss-value';
    trigger.appendChild(valueEl);

    select.classList.add('ss-native');
    select.setAttribute('tabindex', '-1');
    select.setAttribute('aria-hidden', 'true');
    select.parentNode.insertBefore(trigger, select.nextSibling);

    var panel = document.createElement('div');
    panel.className = 'ss-panel';
    panel.hidden = true;
    var searchWrap = document.createElement('div');
    searchWrap.className = 'ss-search-wrap';
    var search = document.createElement('input');
    search.type = 'search';
    search.className = 'ss-search';
    search.placeholder = 'Search...';
    search.autocomplete = 'off';
    search.setAttribute('aria-label', 'Search options');
    searchWrap.appendChild(search);
    var list = document.createElement('ul');
    list.className = 'ss-list';
    list.setAttribute('role', 'listbox');
    var empty = document.createElement('div');
    empty.className = 'ss-empty';
    empty.textContent = 'No results found';
    empty.hidden = true;
    panel.appendChild(searchWrap);
    panel.appendChild(list);
    panel.appendChild(empty);
    document.body.appendChild(panel);

    var rows = items.map(function (o) {
      var li = document.createElement('li');
      li.setAttribute('role', 'option');
      li.textContent = o.text;
      li.addEventListener('mousedown', function (e) { e.preventDefault(); });
      li.addEventListener('click', function () { choose(o); });
      list.appendChild(li);
      return { option: o, el: li, text: o.text.toLowerCase() };
    });
    var visible = rows.slice();
    var active = -1;

    function refresh() {
      var sel = select.options[select.selectedIndex];
      var isPlaceholder = !sel || sel === placeholder || sel.disabled || sel.value === '';
      valueEl.textContent = isPlaceholder ? (placeholder ? placeholder.text : 'Select') : sel.text;
      trigger.classList.toggle('ss-placeholder', isPlaceholder);
      trigger.classList.toggle('is-invalid', select.classList.contains('is-invalid'));
      rows.forEach(function (r) {
        var on = !isPlaceholder && r.option === sel;
        r.el.classList.toggle('is-selected', on);
        r.el.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      var label = select.getAttribute('aria-label');
      if (label) trigger.setAttribute('aria-label', label + ': ' + valueEl.textContent);
    }

    function position() {
      var rect = trigger.getBoundingClientRect();
      var scrollX = window.pageXOffset || document.documentElement.scrollLeft;
      var scrollY = window.pageYOffset || document.documentElement.scrollTop;
      panel.style.width = rect.width + 'px';
      panel.style.left = (rect.left + scrollX) + 'px';
      var height = panel.offsetHeight;
      var below = window.innerHeight - rect.bottom;
      var flip = below < height + 8 && rect.top > below;
      panel.style.top = (flip ? rect.top + scrollY - height - 4 : rect.bottom + scrollY + 4) + 'px';
    }

    function setActive(i, scroll) {
      if (active > -1 && visible[active]) visible[active].el.classList.remove('is-active');
      active = i;
      if (active > -1 && visible[active]) {
        visible[active].el.classList.add('is-active');
        if (scroll) {
          var el = visible[active].el;
          if (el.offsetTop < list.scrollTop) {
            list.scrollTop = el.offsetTop;
          } else if (el.offsetTop + el.offsetHeight > list.scrollTop + list.clientHeight) {
            list.scrollTop = el.offsetTop + el.offsetHeight - list.clientHeight;
          }
        }
      }
    }

    function filter(term) {
      term = term.trim().toLowerCase();
      visible = [];
      rows.forEach(function (r) {
        var show = !term || r.text.indexOf(term) !== -1;
        r.el.hidden = !show;
        if (show) visible.push(r);
      });
      empty.hidden = visible.length > 0;
      var selectedAt = -1;
      visible.forEach(function (r, i) { if (r.el.classList.contains('is-selected')) selectedAt = i; });
      position();
      setActive(visible.length ? (selectedAt > -1 ? selectedAt : 0) : -1, true);
    }

    function open() {
      if (openInstance && openInstance !== api) openInstance.close(false);
      panel.hidden = false;
      position();
      trigger.setAttribute('aria-expanded', 'true');
      search.value = '';
      filter('');
      search.focus({ preventScroll: true });
      openInstance = api;
    }

    function close(returnFocus) {
      if (panel.hidden) return;
      panel.hidden = true;
      trigger.setAttribute('aria-expanded', 'false');
      if (openInstance === api) openInstance = null;
      if (returnFocus) trigger.focus();
    }

    function choose(option) {
      select.selectedIndex = option.index;
      refresh();
      close(true);
      select.dispatchEvent(new Event('change', { bubbles: true }));
    }

    var api = { close: close, panel: panel, trigger: trigger, position: position };

    trigger.addEventListener('click', function () { panel.hidden ? open() : close(false); });
    trigger.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
        e.preventDefault();
        if (panel.hidden) open();
      }
    });
    search.addEventListener('input', function () { filter(search.value); });
    search.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        if (visible.length) setActive((active + 1) % visible.length, true);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        if (visible.length) setActive((active - 1 + visible.length) % visible.length, true);
      } else if (e.key === 'Enter') {
        e.preventDefault();
        if (active > -1 && visible[active]) choose(visible[active].option);
      } else if (e.key === 'Escape') {
        e.preventDefault();
        close(true);
      } else if (e.key === 'Tab') {
        close(false);
      }
    });

    select.addEventListener('focus', function () { trigger.focus(); });
    select.addEventListener('change', refresh);
    if (select.form) {
      select.form.addEventListener('reset', function () { setTimeout(refresh, 0); });
    }
    if (window.MutationObserver) {
      new MutationObserver(refresh).observe(select, { attributes: true, attributeFilter: ['class'] });
    }
    refresh();
  }

  document.addEventListener('mousedown', function (e) {
    if (!openInstance) return;
    if (openInstance.panel.contains(e.target) || openInstance.trigger.contains(e.target)) return;
    openInstance.close(false);
  });
  var lastWidth = window.innerWidth;
  window.addEventListener('resize', function () {
    if (window.innerWidth === lastWidth) return;
    lastWidth = window.innerWidth;
    if (openInstance) openInstance.close(false);
  });

  Array.prototype.forEach.call(document.querySelectorAll('select.hero-form-control, select.contact-input'), enhance);
});
