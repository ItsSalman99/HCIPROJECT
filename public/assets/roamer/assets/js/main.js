$(document).ready(function () {
  //DataTable custom search field
  $(".myDataTable").DataTable({
    responsive: false,
    scrollX: false,
    searching: false,
    ordering: false,
    initComplete: function (settings, json) {
      $(".myDataTable").wrap(
        "<div class='hidden-datatable mb-5' style='overflow:auto; width:100%; position:relative;'></div>"
      );
    },
    // pageLength: 5,
    //   language: {
    //     sLengthMenu: "Show _MENU_",
    //   },

    // columnDefs: [{
    //   width: '100',
    //   targets: 0
    // }],
    pagingType: "full_numbers",
    language: {
      paginate: {
        first: "<i class='material-icons'>keyboard_double_arrow_left</i>",
        last: "<i class='material-icons'>keyboard_double_arrow_right</i>",
        next: "<i class='material-icons'>chevron_right</i>",
        previous: "<i class='material-icons'>chevron_left</i>",
      },
    },
  });

  // $("#custom-filter").on("input", function (e) {
  //   e.preventDefault();
  //   $("#datatable").DataTable().search($(this).val()).draw();
  // });
  // $("#filter-status-1").on("change", function () {
  //   $("#datatable").DataTable().search($(this).val()).draw("");
  // });
  // $("#filter-status-2").on("change", function () {
  //   $("#datatable").DataTable().search($(this).val()).draw("");
  // });
  /*===================================*
    01. LOADING JS
    /*===================================*/

  /*===================================*
        start window scroll
    /*===================================*/
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 250) {
      $("nav.navbar").addClass("nav-fixed");
    } else {
      $("nav.navbar").removeClass("nav-fixed");
    }
  });
  /*===================================*
            end window scroll
        /*===================================*/

  // ################### start select option #################

  var x, i, j, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("custom-select");
  for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
      /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function (e) {
        /*when an item is clicked, update the original select box,
                and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
      /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }

  function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
        except the current select box:*/
    var x,
      y,
      i,
      arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i);
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < x.length; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }

  document.addEventListener("click", closeAllSelect);

  // ################### end select option #################
});

// ################### start toggle menu button #################
window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});
// ################### end toggle menu button #################
// ################### start Bubble Chat #################
var aa = $(".bubble-chat-icon a").html();
$(".bubble-chat-icon a").click(function () {
  $(this).html(`<i class="bi bi-chevron-down"></i>`);
  // console.log(aa);

  $(".bubble-chat-container").attr("style", "z-index:11");
  $(".bubble-chat-container .bubble-chat-box").toggleClass(
    "show-bubble-container"
  );
});
$(".close-bubble-container").click(function () {
  $(".bubble-chat-container .bubble-chat-box").removeClass(
    "show-bubble-container"
  );
});
// $(".bubble-chat-icon a").html(`<i class="bi bi-chevron-down"></i>`).toggle();
//#################### Tooltip ##################
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

//#################### go back function ##################
function goBack() {
  window.history.back();
}
//######################## fancy box #######################

// Fancybox.bind("[data-fancybox]", {});

//##################### multidate picker ###########

jQuery(".reviewStartDate").datetimepicker({
  format: "Y/m/d",
  datepicker: true,
  onShow: function (ct) {
    this.setOptions({
      maxDate: jQuery(".reviewEndDate").val()
        ? jQuery(".reviewEndDate").val()
        : false,
    });
  },
  timepicker: false,
});
jQuery(".reviewEndDate").datetimepicker({
  format: "Y/m/d",
  datepicker: true,
  onShow: function (ct) {
    this.setOptions({
      minDate: jQuery(".reviewStartDate").val()
        ? jQuery(".reviewStartDate").val()
        : false,
    });
  },
  timepicker: false,
});
//############## password show hide ######################
$(".toggle-password").click(function () {
  $(this).toggleClass("bi-eye bi-eye-slash-fill");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
// ##################### ck editor ###########################
var allEditors = document.querySelectorAll(".editor");
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create(allEditors[i]);
}
