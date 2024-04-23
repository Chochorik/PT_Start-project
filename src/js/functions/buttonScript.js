const $button = document.getElementById("button1"),
      $container = document.getElementById("demo");

let count = 0;

$button.addEventListener('click', function (e) {
  e.preventDefault();

  count++;

  if (count % 2 === 0) { //проверка на четность
    $container.innerHTML = ''
  } else {
    const $img = document.createElement('img');
    $img.classList.add('js-practice__image');

    $img.src = "https://flomaster.top/o/uploads/posts/2023-10/1698122401_flomaster-top-p-multyashnie-lyagushki-milie-risunki-pinter-1.jpg";

    $container.append($img);
  }
})
