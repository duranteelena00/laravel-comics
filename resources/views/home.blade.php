{{-- Create un nuovo progetto Laravel e concentratevi sul layout: create un file di layout in cui inserire la struttura comune di tutte le pagine del sito web (tag head, tag body, ...) eventualmente includendo header e footer tramite due include. (senza preoccuparci di inserire le voci del menù dinamicamente)
Create poi una rotta per visualizzare la lista di tutti i fumetti recuperati da un file inserito nella cartella config e abbellite il tutto sfruttando Sass. --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - Comics</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    @include('includes.header')
    @include('includes.hero')
    <main>
        <section id="products">
            <div class="container">
                <button>CURRENT SERIES</button>
                @include('includes.items')
                <button>LOAD MORE</button>
            </div>
        </section>
        <section id="links">
            <div class="container">
                <ul>
                    <li>
                        <a href="#"><img src="{{ asset('images/buy-comics-digital-comics.png') }}" alt="" />
                            <span>digital comics</span></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('images/buy-comics-merchandise.png') }}" alt="" />
                            <span>dc merchandise</span></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('images/buy-comics-shop-locator.png') }}" alt="" />
                            <span>subscription</span></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('images/buy-comics-subscriptions.png') }}" alt="" />
                            <span>comic shop locator</span></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('images/buy-dc-power-visa.svg') }}" alt="" />
                            <span>dc power visa</span></a>
                    </li>
                </ul>
            </div>
        </section>
    </main>
    @include('includes.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

