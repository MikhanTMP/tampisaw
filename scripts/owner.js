
//FOR OPENING AND CLOSING THE DIVS
/*Get the Divs*/
var profileDiv = document.querySelector(".my-profile");
var bookingsDiv = document.querySelector(".bookings");
var resortdiv = document.querySelector(".resort-info");
/*Get the Links from navbar*/
var profilesLink = document.getElementById("mp");
var bookingsLink = document.getElementById("bs");
var resortLink = document.getElementById('ri');

/*Open booking*/
bookingsLink.addEventListener("click", function(event) {
        bookingsDiv.style.display = "block";
        profileDiv.style.display = "none";
        resortdiv.style.display = "none";
});
/*Open My Profile*/
profilesLink.addEventListener("click", function(event) {
    bookingsDiv.style.display = "none";
    profileDiv.style.display = "block";
    resortdiv.style.display = "none";
});
/*Open Resort Info*/
resortLink.addEventListener("click", function(event) {
    bookingsDiv.style.display = "none";
    profileDiv.style.display = "none";
    resortdiv.style.display = "block";
});

$(document).ready(function() {
  // Add a click event listener to all items with class "item"
  $('.item').click(function() {
    // Remove "active" class from all items
    $('.item').removeClass('active');
    // Add "active" class to the clicked item
    $(this).addClass('active');
  });
});


var edit = document.getElementById('editbtn');
var editpage = document.querySelector('.edit-resort-info');
var cancel = document.getElementById('cancelbtn');
var addroom = document.getElementById('addroombtn');
var addroompages = document.getElementById("add-rooms");
edit.addEventListener ('click', function(){
 editpage.style.display = 'block';
}); 
addroom.addEventListener('click', function(){
    addroompages.style.display = 'block';
    editpage.style.display = 'none';
}); 
cancel.addEventListener ('click', function(){
    editpage.style.display = 'none';
    addroompage.style.display = 'none';
}); 

