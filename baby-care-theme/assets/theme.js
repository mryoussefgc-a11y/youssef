// Bundle/variant selection on product page
document.addEventListener('change', function (e) {
  if (e.target && e.target.name === 'id') {
    document.querySelectorAll('.bundle').forEach(function (b) {
      b.classList.toggle('selected', b.querySelector('input').checked);
    });
  }
});

// Highlight default selected bundle on load
document.addEventListener('DOMContentLoaded', function () {
  var checked = document.querySelector('.bundle input:checked');
  if (checked) checked.closest('.bundle').classList.add('selected');

  // Gallery thumbnail switching
  document.querySelectorAll('.thumbs img').forEach(function (t) {
    t.addEventListener('click', function () {
      var main = document.querySelector('.main-img img');
      if (main) main.src = t.dataset.full || t.src;
    });
  });
});
