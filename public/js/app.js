/* сохраняем текстовое поле в переменную text */
var text = document.getElementById("inputText");

/* сохраняем кнопку в переменную btn */
var btn = document.getElementById("copyText");

/* вызываем функцию при нажатии на кнопку */
btn.onclick = function() {
  text.select();
  document.execCommand("copy");
}
