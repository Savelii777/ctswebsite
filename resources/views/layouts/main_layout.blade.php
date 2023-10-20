<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/header__logo.png') }}" type="image/png">
    <title>КТС</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <!-- Styles -->
    <style>

        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>
<body class="antialiased">
@yield('content')
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{mix('/js/app.js')}}"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
    var buttons = document.getElementsByClassName("btn-default");
// Проходимся по каждой кнопке и добавляем слушатель клика
for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function(event) {
    // Создаем элемент div для красного квадрата
    var redSquare = document.createElement("div");

    // Добавляем стили для красного квадрата
    redSquare.style.width = "20px";
    redSquare.style.height = "35px";
    redSquare.style.backgroundColor = "#6b7fe3";
    redSquare.style.position = "absolute";
    redSquare.style.top = "0px";
    redSquare.style.left = "33px";
    redSquare.style.borderRadius = "0px 5px 5px 0px";
    var counter = 0;
var nameOfItem = $(this).parent().parent().prev().prev().prev().prev().text().trim();

// Access the jsonData array from local storage
var jsonData = JSON.parse(localStorage.getItem('jsonData'));

// Iterate through the array and check for matching names
for (var i = 0; i < jsonData.length; i++) {
  if (jsonData[i].title === nameOfItem) {
    counter = jsonData[i].quantity;
  }
}

redSquare.innerHTML += `${counter}`;


if(counter > 0)
    {

    }


    // Вставляем красный квадрат после кнопки
    this.append(redSquare);
  });
//   buttons[i].addEventListener("load", function() {
//     // Создаем элемент div для красного квадрата
//     var redSquare = document.createElement("div");

//     // Добавляем стили для красного квадрата
//     redSquare.style.width = "20px";
//     redSquare.style.height = "35px";
//     redSquare.style.backgroundColor = "#6b7fe3";
//     redSquare.style.position = "absolute";
//     redSquare.style.top = "0px";
//     redSquare.style.left = "33px";
//     redSquare.style.borderRadius = "0px 5px 5px 0px";

//     var counter = 0;
// var nameOfItem = $(this).parent().parent().prev().prev().prev().prev().text().trim();

// // Access the jsonData array from local storage
// var jsonData = JSON.parse(localStorage.getItem('jsonData'));

// // Iterate through the array and check for matching names
// for (var i = 0; i < jsonData.length; i++) {
//   if (jsonData[i].title === nameOfItem) {
//     counter = jsonData[i].quantity;
//   }
// }

// console.log(counter);
// redSquare.innerHTML += `${counter}`;


//     // Вставляем красный квадрат после кнопки
//     this.append(redSquare);
//   });
}
$(document).ready(function() {

  var buttons = document.getElementsByClassName("btn-default");

  for (var i = 0; i < buttons.length; i++) {
    // Создаем элемент div для красного квадрата
    var redSquare = document.createElement("div");

    // Добавляем стили для красного квадрата
    redSquare.style.width = "20px";
    redSquare.style.height = "35px";
    redSquare.style.backgroundColor = "#6b7fe3";
    redSquare.style.position = "absolute";
    redSquare.style.top = "0px";
    redSquare.style.left = "33px";
    redSquare.style.borderRadius = "0px 5px 5px 0px";

    var counter = 0;

    var nameOfItem = $(buttons[i]).parent().parent().prev().prev().prev().prev().text().trim();

    // Access the jsonData array from local storage
    var jsonData = JSON.parse(localStorage.getItem('jsonData'));

    // Iterate through the array and check for matching names
    for (var j = 0; j < jsonData.length; j++) {
      if (jsonData[j].title === nameOfItem) {
        counter = jsonData[j].quantity;
      }
    }

    redSquare.innerHTML += `${counter}`;
  if(counter > 0)
    {
        redSquare.style.backgroundColor = "green";
        buttons[i].style.backgroundColor = "green";
    }
    // Вставляем красный квадрат после кнопки
    buttons[i].append(redSquare);
  }
});
    window.addEventListener("load", function () {
        let elem = document.querySelector('#history-button');
        if (window.history.length > 2) {
            elem.addEventListener('click', () => {
                history.back();
            })

            elem.classList.remove("history-hide");
        }
    });
    const change = (elementId, minValue, maxValue, increment) => {
    const inputElement = document.getElementById(elementId);
    const currentValue = parseInt(inputElement.value);




    // Проверяем, чтобы значение оставалось в пределах минимального и максимального значения
    if (currentValue + increment >= minValue && currentValue + increment <= maxValue) {
      inputElement.value = currentValue + increment;
    }
  };
  function recalculateCart() {

var items = JSON.parse(localStorage.getItem('jsonData'));

// Проверяем, есть ли элементы в массиве
if (!items || items.length === 0) {
  return 0; // Если массив пуст, возвращаем 0
}

var total = 0;

// Проходимся по каждому элементу массива
for (var i = 0; i < items.length; i++) {
  var item = items[i];

  // Проверяем, есть ли поля "price" и "quantity" в объекте
  if (item.hasOwnProperty('price') && item.hasOwnProperty('quantity')) {
    // Умножаем цену на количество и добавляем к общей сумме
    total += item.price * item.quantity;
  }
}
var roundedTotalSum = total.toFixed(2);

var cartSubtotalElement = document.getElementById('cart-subtotal');
cartSubtotalElement.textContent = `${roundedTotalSum} ₽`;
}
function downloadToExcel() {
  // Получение данных из localStorage
  const jsonData = localStorage.getItem('jsonData');

  // Проверка наличия данных
  if (!jsonData) {
    console.error('No data found in localStorage');
    return;
  }

  try {
      const data = JSON.parse(jsonData);
      const nameOfCustomerDiv = document.querySelector(".person__item > div");
      const nameOfCustomer = nameOfCustomerDiv.textContent.trim();

      const personItems = document.querySelectorAll(".person__item");
      const secondPersonItem = personItems[1];

          const phoneNumberDiv = secondPersonItem.querySelector("div");

          const phoneNumber = phoneNumberDiv.textContent.trim();

          console.log("Номер телефона:", phoneNumber);

// Заголовки столбцов
      const headers = ["Название", "Цена (шт)", "Количество", "Всего"];

// Вычисление суммы столбца "Всего"
      const totalSum = data.reduce((sum, item) => sum + (item.price * item.quantity), 0);

// Создание новой книги Excel
      const workbook = XLSX.utils.book_new();

// Преобразование данных в двумерный массив, включая заголовки
      const dataWithHeaders = [headers, ...data.map(item => [item.title, item.price, item.quantity, item.price * item.quantity])];

// Добавление строки "Итого"
      dataWithHeaders.push(["Итого", "", "", totalSum]);

// Добавление строки с ФИО и значением
      dataWithHeaders.push(["ФИО", nameOfCustomer, "", ""]);
      dataWithHeaders.push(["Телефон", phoneNumber, "", ""]);

// Создание нового листа в книге с данными и заголовками
      const worksheet = XLSX.utils.aoa_to_sheet(dataWithHeaders);

// Добавление листа в книгу
      XLSX.utils.book_append_sheet(workbook, worksheet, 'Данные');

// Преобразование книги в бинарный формат
      const excelBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

// Создание Blob из бинарных данных
      const blob = new Blob([excelBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

// Создание ссылки для скачивания файла
      const url = URL.createObjectURL(blob);

// Создание ссылки на скачивание файла
      const link = document.createElement('a');
      link.href = url;
      link.download = 'Заказ.xlsx';

// Добавление ссылки на страницу и эмуляция клика для скачивания файла
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);


  } catch (error) {
    console.error('Error exporting data to Excel:', error);
  }
}

async function sendDataToServer() {

  var data = localStorage.getItem('jsonData');

    const nameOfCustomerDiv = document.querySelector(".person__item > div");
    const nameOfCustomer = nameOfCustomerDiv.textContent.trim();

    const personItems = document.querySelectorAll(".person__item");
    const secondPersonItem = personItems[1];

    const phoneNumberDiv = secondPersonItem.querySelector("div");

    const phoneNumber = phoneNumberDiv.textContent.trim();


  // Получение CSRF-токена из мета-тега
  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Создание промиса для выполнения AJAX-запроса
  return new Promise(function(resolve, reject) {
    fetch('/order', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken, // Добавление CSRF-токена в заголовок
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE',
        'Access-Control-Allow-Headers': 'Content-Type'
      },
      body: JSON.stringify({ data: data })
    })
    .then(response => {
      if (response.ok) {
        resolve(response.text());
      } else {
        reject(response.statusText);
      }
    })
    .then(alert("Заказ успешно создан"))
    .catch(error => {
      reject(error);
    });
  });
}


  function updateJsonData(nameOfClass, priceOfItem, nameOfItem) {
    console.log(jsonData)
  // Получаем значение из инпута
  var inputValue = document.getElementById(nameOfClass).value;

  // Создаем новый объект с переданными данными
    var newItem = {
        title: nameOfItem,
        price: priceOfItem,
        quantity: inputValue,
        total: priceOfItem * inputValue
    };
    if (jsonData === null) {
        jsonData = [];
    }

    var existingItem = jsonData.find(function(item) {
    return item.title === newItem.title;
});

if (existingItem) {
    // Если элемент уже существует, прибавляем его quantity к quantity нового элемента
    existingItem.quantity = (Number(existingItem.quantity) + Number(newItem.quantity))+"";

}else{
    jsonData.push(newItem);

}
    // Добавляем новый объект в jsonData

  var html = "<tbody style='max-height:10px'>";

    html +=
      '<tr class="cart-item" style="max-height:10px" >' +
      "        <td style='max-height:10px; max-width:50px; font-size:12px; overflow:hidden;   white-space: nowrap;'>" +
      "          " +
      newItem.title +
      "        </td>" +
      "        <td style='max-height:10px; max-width:10px'>$" +
      newItem.price +
      "</td>" +
      "        <td style='max-height:10px; max-width:5px'>" +
      '          <input class="input is-primary cart-item-qty" style="" type="number" min="1" value="' +
      newItem.quantity +
      '" data-price="' +
      newItem.price +
      '">' +
      "        </td>" +
      '        <td style="max-height:10px; max-width:10px" class="cart-item-total">$' +
      newItem.total +
      "</td>" +
      "        <td style=' max-height:10px; max-width:20px'>" +
        '          <a style="cursor: pointer; width: max-content; margin-right: -100px" class="button is-small"><svg fill="#f00707" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 482.428 482.429" xml:space="preserve" stroke="#f00707"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098 c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117 h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828 C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879 C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096 c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266 c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979 V115.744z"></path> <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z"></path> <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z"></path> <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07 c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z"></path> </g> </g> </g></svg></a>' +
      "        </td>" +
      "      </tr>";
  html += "</tbody>";
  $(".shopping-cart").append(html);

  var items = jsonData;

// Проверяем, есть ли элементы в массиве
if (!items || items.length === 0) {
  return 0; // Если массив пуст, возвращаем 0
}

var total = 0;

// Проходимся по каждому элементу массива
for (var i = 0; i < items.length; i++) {
  var item = items[i];

  // Проверяем, есть ли поля "price" и "quantity" в объекте
  if (item.hasOwnProperty('price') && item.hasOwnProperty('quantity')) {
    // Умножаем цену на количество и добавляем к общей сумме
    total += item.price * item.quantity;
  }
}
var roundedTotalSum = total.toFixed(2);

console.log(roundedTotalSum+"kkk")
var cartSubtotalElement = document.getElementById('cart-subtotal');
cartSubtotalElement.textContent = roundedTotalSum;





$(".button").click(function() {
var parent = $(this)
  .parent()
  .parent();
var totalPrice = $(this).parent().prev().text();
var quantityOfItems = $(this).parent().prev().prev().find('input').val();
var priceOfItem = $(this).parent().prev().prev().prev().text();
var nameOfItem = $(this).parent().prev().prev().prev().prev().text().trim();
parent.remove();
// Получаем текущий список элементов из localStorage
var cartItems = JSON.parse(localStorage.getItem("jsonData")) || [];

// Удаляем элемент из списка
cartItems = cartItems.filter(function(item) {
  return item.title.trim() !== nameOfItem;
});

// Обновляем список элементов в localStorage
localStorage.setItem("jsonData", JSON.stringify(cartItems));

recalculateCart();


// var cartSubtotalElement = document.getElementById('cart-subtotal');

// var total = cartSubtotalElement.textContent;

// var roundedTotalSum = total.toFixed(2);

// roundedTotalSum = float(roundedTotalSum) - (float(priceOfItem) * float(quantityOfItems))
// cartSubtotalElement.textContent = roundedTotalSum;

});



  // Сохраняем обновленный jsonData в localStorage
  localStorage.setItem('jsonData', JSON.stringify(jsonData));

  // Выводим обновленный jsonData в консоль для проверки
  console.log(jsonData);
//   sendDataToServer()
//   .then(function(response) {
//     console.log(response); // Обработка успешного ответа от сервера
//   })
//   .catch(function(error) {
//     console.error(error); // Обработка ошибки
//   });
}



var jsonData = JSON.parse(localStorage.getItem('jsonData'));

$(function() {
  var html = "<tbody style='max-height:10px;'>";
  $.each(jsonData, function() {
    html +=
    '<tr class="cart-item" style="max-height:10px">' +
      "        <td style='max-height:10px; max-width:50px; font-size:12px; overflow:hidden;   white-space: nowrap;'>" +
      "          " +
      this.title +
      "        </td>" +
      "        <td style='max-height:10px;max-width:10px'>" +
      this.price.toFixed(2) +
      " ₽</td>" +
      "        <td style='max-height:10px;max-width:5px'>" +
      '          <input class="input is-primary cart-item-qty" style="" type="number" min="1" value="' +
      this.quantity +
      '" data-price="' +
      this.price.toFixed(2) +
      '">' +
      "        </td>" +
      '        <td style="max-height:10px;max-width:10px" class="cart-item-total">' +
      this.total.toFixed(2)*this.quantity +
      " ₽</td>" +
      "        <td style='max-height:10px;max-width:20px'>" +
      '          <a style="cursor: pointer; width: max-content; margin-right: -100px" class="button is-small"><svg fill="#f00707" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 482.428 482.429" xml:space="preserve" stroke="#f00707"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098 c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117 h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828 C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879 C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096 c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266 c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979 V115.744z"></path> <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z"></path> <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z"></path> <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07 c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z"></path> </g> </g> </g></svg></a>' +
      "        </td>" +
      "      </tr>";
  });
  html += "</tbody>";
  $(".shopping-cart").append(html);

  recalculateCart();

  $(".button").click(function() {
  var parent = $(this)
    .parent()
    .parent();
  var totalPrice = $(this).parent().prev().text();
  var quantityOfItems = $(this).parent().prev().prev().find('input').val();
  var priceOfItem = $(this).parent().prev().prev().prev().text();
  var nameOfItem = $(this).parent().prev().prev().prev().prev().text().trim();
  parent.remove();
  // Получаем текущий список элементов из localStorage
  var cartItems = JSON.parse(localStorage.getItem("jsonData")) || [];

  // Удаляем элемент из списка
  cartItems = cartItems.filter(function(item) {
    return item.title.trim() !== nameOfItem;
  });

  // Обновляем список элементов в localStorage
  localStorage.setItem("jsonData", JSON.stringify(cartItems));

  recalculateCart();
});


});

</script>
</body>
</html>
