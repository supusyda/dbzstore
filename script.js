$(document).ready(function () {
  const imgslide = document.querySelectorAll(".slider-container img");
  console.log(imgslide);
  let index = 0;
  const imglength = imgslide.length;
  const slide = document.querySelector(".slider-container");
  const dot = document.querySelectorAll(".dot");
  console.log(dot[1]);
  imgslide.forEach(function (img, index) {
    img.style.left = index * 100 + "%";
    dot[index].addEventListener("click", function () {
      changeslide(index);
    });
  });

  setInterval(function () {
    index++;
    if (index >= imglength) {
      index = 0;
    }
    changeslide(index);
  }, 3000);
  function changeslide(index) {
    slide.style.left = "-" + index * 100 + "%";
    dotActive = $(".active");
    dotActive.removeClass("active");
    dot[index].classList.add("active");
  }
  // $(window).scroll(function () {
  //   const x = $(window).offset();
  //   console.log(x);
  // });
  $(window).scroll(function () {
    var x = $(window).scrollTop();
    if (x > 0) {
      $("#header").addClass("sticky");
    } else {
      $("#header").removeClass("sticky");
    }
  });
  ////////////////////////////////////////////////////////////////////////////////;
  const sidebar = document.querySelectorAll(".categories-left-li");
  sidebar.forEach(function (item, index) {
    item.addEventListener("click", function () {
      item.classList.toggle("display");
    });
  });
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  const detailbut = document.querySelector(".detail");
  const historybut = document.querySelector(".history");
  const desContent = document.querySelectorAll(".desContent-detail");
  detailbut.addEventListener("click", function () {
    desContent[0].style.display = "block";
    desContent[1].style.display = "none";
    desContent[2].style.display = "none";
  });
  historybut.addEventListener("click", function () {
    desContent[0].style.display = "none";
    desContent[1].style.display = "block";
    desContent[2].style.display = "none";
  });
  const showMore = document.querySelector(".charInfo-content-right-bottom-des");
  const showButton = document.querySelector(".showcontent");
  showButton.addEventListener("click", function () {
    showMore.classList.toggle("displayB");
  });
  const bigPicture = document.querySelector(
    ".charInfo-content-left-bigImg img"
  );
  const smallPicture = document.querySelectorAll(
    ".charInfo-content-left-smallImg img"
  );
  smallPicture.forEach(function (img, index) {
    img.addEventListener("click", function () {
      bigPicture.src = img.src;
    });
  });
  //////////////////login and register////////////////////////////////////////
  $("#eye").click(function () {
    $(this).toggleClass("open");
    $(this).children("i").toggleClass(" fa-eye-slash fa-eye");
    if ($(this).hasClass("open")) {
      $(this).prev().attr("type", "text");
    } else {
      $(this).prev().attr("type", "password");
    }
  });
});
