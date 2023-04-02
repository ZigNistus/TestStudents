const result_mark = document.getElementById('result_mark')
const mark_text = result_mark.innerText;

console.log(mark_text)
if (mark_text === 'Ваша оценка: 5') {
    result_mark.classList.add('great');
}
else if (mark_text === 'Ваша оценка: 4') {
    result_mark.classList.add('good');
}
else if (mark_text === 'Ваша оценка: 3') {
    result_mark.classList.add('almost');
} else {
    result_mark.classList.add('bad');
}