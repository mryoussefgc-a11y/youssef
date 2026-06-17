/* =========================================================================
   LittleEase UK — theme.js
   Vanilla JS only. The single behaviour this page needs is the FAQ accordion:
     - only one panel open at a time
     - smooth max-height transition (CSS handles the easing)
     - correct aria-expanded state management for assistive tech
   ========================================================================= */
(function () {
  "use strict";

  function initFaq() {
    var triggers = document.querySelectorAll(".faq__trigger");
    if (!triggers.length) return;

    function closePanel(trigger) {
      var panel = document.getElementById(trigger.getAttribute("aria-controls"));
      trigger.setAttribute("aria-expanded", "false");
      if (panel) panel.style.maxHeight = null;
    }

    function openPanel(trigger) {
      var panel = document.getElementById(trigger.getAttribute("aria-controls"));
      trigger.setAttribute("aria-expanded", "true");
      // Set to the panel's natural height so the CSS transition has a target.
      if (panel) panel.style.maxHeight = panel.scrollHeight + "px";
    }

    triggers.forEach(function (trigger) {
      trigger.addEventListener("click", function () {
        var isOpen = trigger.getAttribute("aria-expanded") === "true";

        // Close every panel first (one-open-at-a-time behaviour).
        triggers.forEach(closePanel);

        // If this one was closed, open it.
        if (!isOpen) openPanel(trigger);
      });
    });

    // Keep an open panel sized correctly if the viewport reflows.
    window.addEventListener("resize", function () {
      triggers.forEach(function (trigger) {
        if (trigger.getAttribute("aria-expanded") === "true") {
          var panel = document.getElementById(trigger.getAttribute("aria-controls"));
          if (panel) panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initFaq);
  } else {
    initFaq();
  }
})();
