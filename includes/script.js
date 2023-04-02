const popup__button = document.getElementById('popbtn')
const popup__button_close = document.getElementById('btn_close')

const popup = document.getElementById('popupactive')

popup__button.addEventListener('click', changeclass)
popup__button_close.addEventListener('click', changeclass)

function changeclass() {

    if (popup.classList.contains('active')) {
        popup.classList.remove('active')
    } else {
        popup.classList.add('active')
    }
}