document.addEventListener('DOMContentLoaded', function () {
  var navToggle = document.getElementById('nav-toggle');
  var nav = document.querySelector('.nav');

  navToggle.addEventListener('change', function () {
    if (this.checked) {
      nav.style.transform = 'scale(1,1)';
      setTimeout(function () {
        var links = nav.getElementsByTagName('a');
        for (var i = 0; i < links.length; i++) {
          links[i].style.opacity = '1';
        }
      }, 400);
    } else {
      var links = nav.getElementsByTagName('a');
      for (var i = 0; i < links.length; i++) {
        links[i].style.opacity = '0';
      }
      setTimeout(function () {
        nav.style.transform = 'scale(1,0)';
      }, 250);
    }
  });
});
