var bookbtn = document.getElementById('bookbtn2');
var modalOverlay = document.querySelector('.modal-overlay');

var book = document.querySelector('.booking-widget');
bookbtn.addEventListener('click', function(){
    book.style.display = "block";
    modalOverlay.style.display = 'block';
});

function closeModal() {
    modalOverlay.style.display = 'none';
    book.style.display = 'none';
}
modalOverlay.addEventListener('click', closeModal);
modal.addEventListener('click', function(event) {
    event.stopPropagation();
});

