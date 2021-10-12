{{-- Create una pagina di dettaglio per visualizzare tutte le informazioni di un fumetto.
Definite quindi una rotta che avrà un parametro per poter visualizzare dinamicamente tutte le pagine di dettaglio.
Infine, fate sì che cliccando sulla card di un fumetto si possa accedere alla relativa pagina di dettaglio.
Bonus:
Aggiungete e stilate la classe active alla giusta voce del menu --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $item['title'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.min.css"
        integrity="sha512-q0LpKnEKG/pAf1qi1SAyX0lCNnrlJDjAvsyaygu07x8OF4CEOpQhBnYiFW6YDUnOOcyAEiEYlV4S9vEc6akTEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      /* Generics */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        width: 100vw;
        height: 100vh;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
      }
      ul {
        list-style-type: none;
      }

      a {
        text-decoration: none;
      }

      /* Utils */
      .container {
        max-width: 900px;
        height: 100%;
        margin: 0 auto;
      }

      /* Header */
      #dc-power-visa {
        background: #0c7cec;
        color: white;
        font-size: 10px;
        height: 20px;
        width: 100%;
        line-height: 20px;
      }
      #dc-power-visa .container {
        display: flex;
        justify-content: flex-end;
      }

      #dc-power-visa .container span:first-of-type {
        padding: 0 40px;
      }

      header img {
        width: 55px;
        height: auto;
      }

      #main-menu.container {
        height: 80px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      header nav {
        display: inline-flex;
      }
      header nav ul {
        display: flex;
        align-items: center;
      }
      header nav ul > li {
        margin-left: 20px;
        font-size: 11px;
        font-weight: bold;
      }
      header nav ul > li.select,
      header nav ul > li.search {
        color: #4b4b4b;
      }
      header nav ul > li.select > span {
        margin-left: 5px;
        color: #0c7cec;
      }
      header nav ul > li.search {
        margin-left: 40px;
        padding: 0 0 2px 40px;
        border-bottom: 2px solid #0c7cec;
      }
      header nav ul > li > a {
        padding: 30px 0;
        text-transform: uppercase;
        color: #4b4b4b;
      }
      header nav ul > li > a.active {
        color: #0c7cec;
        border-bottom: 4px solid #0c7cec;
      }

      /* Jumbotron */
      div.jumbotron {
        min-height: 290px;
        padding: 0;
        margin: 0;
        border: none;
        position: relative;
      }

      .jumbotron img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
      }

      /* Items section */
      ul {
        list-style-type: none;
      }

      a {
        text-decoration: none;
      }

      .blue-row {
        height: 50px;
        background-color: #0c7cec;
      }

      .blue-row .container {
        position: relative;
      }
      .item-img {
        width: 130px;
        top: -160px;
        left: 0;
        font-size: 14px;
        z-index: 4;
        position: absolute;
        border: 2px solid black
      }

      .item-section {
        padding: 40px 0;
      }

      .item-section .container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
      }

      .item-section h3 {
        text-transform: uppercase;
        color: rgb(28, 41, 82);
      }

      .green-box {
        margin: 15px 0;
        width: 100%;
        height: 40px;
        background-color: rgb(58, 170, 58);
        font-size: 14px;
        display: flex;
        align-items: center;
      }

      .green-box div {
        height: 100%;
        border: 1px solid rgb(97, 96, 96);
        display: flex;
        align-items: center;
      }

      .green-box div:first-of-type {
        padding: 0 20px;
        width: 70%;
        justify-content: space-between;
      }

      .green-box div:nth-of-type(2) {
        width: 30%;
        justify-content: center;
        text-decoration: underline;
      }

      .green-box span,
      .green-box a {
        color: rgb(224, 220, 220);
      }

      span.light-green {
        color: rgb(137, 235, 57);
      }

      .item-description {
        color: rgb(78, 78, 78);
      }

      .gray-section {
        padding: 20px 0 50px 0;
        background: #e5e9ec;
      }

      .gray-section .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .gray-section #talent,
      .gray-section #specs {
        width: 47.5%;
        min-height: 200px;
      }

      .gray-section #talent div,
      .gray-section #specs div {
        padding: 7.5px 0;
        color: rgb(78, 78, 78);
        border-bottom: 1px solid rgb(211, 208, 208);
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .gray-section h4,
      .gray-section h5 {
        color: rgb(28, 41, 82);
      }

      .gray-section h4 {
        padding-bottom: 17.5px;
        border-bottom: 1px solid rgb(211, 208, 208);
        font-size: 17.5px;
      }

      section#links {
        background: #bebebe;
        position: relative;
        z-index: 2;
        border: 1px solid rgb(159, 160, 161);
      }

      #links .container {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      #links ul {
        height: 70px;
        display: flex;
        align-items: center;
      }

      #links ul>li {
        padding: 5px 15px;
        height: 100%;
        vertical-align: middle;
        border-left: 1px solid rgb(146, 144, 144);
        border-right: 1px solid rgb(146, 144, 144);
      }

      #links ul>li>a {
        font-size: 10px;
        text-transform: uppercase;
        font-weight: bold;
        color: rgb(240, 236, 236);
        display: flex;
        justify-content: space-between;
        align-items: center;
          
      }

      #links li a img {
        width: 30px;
        margin-left: 15px;
      }
            
      /* Footer */
      footer {
        display: flex;
        flex-direction: column;
      }

      footer > section:first-of-type {
        position: relative;
        height: 250px;
      }

      footer section:first-of-type > .container {
        position: relative;
        display: flex;
        flex-direction: row;
      }

      .lists {
        padding: 30px 0 40px 0;
        display: flex;
      }

      footer section:first-of-type ul {
        margin-right: 30px;
        z-index: 1;
      }

      footer section:first-of-type ul li h4 {
        margin-bottom: 10px;
        font-size: 13px;
        color: white;
        text-transform: uppercase;
      }

      footer section:first-of-type ul li:not(li:first-of-type) {
        line-height: 12px;
      }

      footer ul li a {
        font-size: 10px;
        color: grey;
      }

      footer > section:first-of-type > img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-fit: cover;
        object-position: center;
        object-position: center;
      }

      footer section:first-of-type img {
        position: absolute;
        height: 380px;
        top: -65px;
        right: 0;
        z-index: 1;
      }

      /* section 2 */
      footer > section:nth-of-type(2) {
        height: 80px;
        width: 100%;
        z-index: 2;
        background: #363636;
      }

      footer section:nth-of-type(2) ul {
        display: flex;
        align-items: center;
      }

      footer section:nth-of-type(2) ul h4 {
        margin-right: 15px;
        color: #0c7cec;
        font-size: 13px;
        font-weight: bold;
      }

      footer section:nth-of-type(2) ul > li > a {
        margin: 5px;
      }

      footer section:nth-of-type(2) ul > li > a > img {
        height: 25px;
        width: auto;
      }

      footer section:nth-of-type(2) > .container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      footer section:nth-of-type(2) button {
        padding: 7.5px;
        border: 2px solid #0c7cec;
        background: transparent;
        font-size: 12px;
        color: white;
      }
    </style>
</head>

<body>
    <main>
        @include('includes.header')
        @include('includes.hero')
        <section id="products">
            <div class="blue-row">
                <div class="container">
                    <img class="item-img" src="{{ $item['thumb'] }}" alt="">
                </div>
            </div>
            <section class="item-section">
                <div class="container">
                    <h3>{{ $item['title'] }}</h3>
                    <div class="green-box">
                        <div>
                            <p><span class="light-green">U.S. Price: </span>
                                <span>{{ $item['price'] }}</span>
                            </p>
                            <span class="light-green">AVAILABLE</span>
                        </div>
                        <div>
                            <span><a href="">Check Availability</a></span>
                        </div>
                    </div>
                    <summary class="item-description">
                        {{ $item['description'] }}
                    </summary>
                </div>
            </section>
            <section class="gray-section">
                <div class="container">
                    <div id="talent">
                        <h4>Talent</h4>

                        <div>
                            <h5>Art by: </h5>
                            <p>
                            <ul>
                                @foreach ($item['artists'] as $artist)
                                    <li>
                                        <a href="">
                                            {{ $artist }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            </p>
                        </div>

                        <div>
                            <h5>Written by: </h5>
                            <ul>
                                @foreach ($item['writers'] as $writer)
                                    <li>
                                        <a href="">
                                            {{ $writer }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div id="specs">
                        <h4>Specs</h4>

                        <div>
                            <h5>Series: </h5>
                            <a href="">{{ $item['series'] }}</a>
                        </div>

                        <div>
                            <h5>U.S. Price: </h5>
                            <span>{{ $item['price'] }}</span>
                        </div>

                        <div>
                            <h5>On Sale Date: </h5>
                            <span>{{ $item['sale_date'] }}</span>
                        </div>

                    </div>
                </div>
            </section>
            </div>
        </section>
        <section id="links">
            <div class="container">
                <ul>
                    <li>
                        <a href="#">
                            <span>digital comics</span><img src="{{ asset('images/buy-comics-digital-comics.png') }}"
                                alt="" /></a>
                    </li>
                    <li>
                        <a href="#">
                            <span>dc merchandise</span><img src="{{ asset('images/buy-comics-merchandise.png') }}"
                                alt="" /></a>
                    </li>
                    <li>
                        <a href="#">
                            <span>subscription</span><img src="{{ asset('images/buy-comics-shop-locator.png') }}"
                                alt="" /></a>
                    </li>
                    <li>
                        <a href="#">
                            <span>comic shop locator</span><img
                                src="{{ asset('images/buy-comics-subscriptions.png') }}" alt="" /></a>
                    </li>
                    <li>
                        <a href="#">
                            <span>dc power visa</span><img src="{{ asset('images/buy-dc-power-visa.svg') }}"
                                alt="" /></a>
                    </li>
                </ul>
            </div>
        </section>
    </main>
    @include('includes.footer')
</body>

</html>
