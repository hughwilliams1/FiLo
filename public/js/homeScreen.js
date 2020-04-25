function openTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Function that uses CSS colours to make the sting a colour.
// If not a colour then returns false due to the colour object not
// being created so it won't match the original string.
$(document).ready(function() {
  document.getElementById("colour").addEventListener('change', function() {
    var s = new Option().style;
    s.color = this.value;
    if (s.color !== '') {
      this.setCustomValidity("");
    } else {
      this.setCustomValidity("Please enter a valid colour");
    }
  });
});

// If a .clickale class is clicked then find the next .more-info and
// quickly switch it to be being shown.
$(document).ready(function() {
  $('.clickable').click(function() {
    $(this).next('.more-info').slideToggle('fast');
  });
});

// If the date is set to today then set the max for the time to be
// <= the current time.
$(document).ready(function() {
  document.getElementById("founddate").addEventListener('change', function() {
    var input = this.value;
    var dateSelected = new Date(input);
    var today = new Date();
    if(dateSelected.toDateString() == today.toDateString()) {
      document.getElementById("foundtime").max = today.getHours() + ":" + today.getMinutes();
    } else {
      document.getElementById("foundtime").max = "23:59";
    }
  });
});
