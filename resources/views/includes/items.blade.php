<ul>
    @foreach ($items as $index => $item)
    <li class="card">
        <img src="{{ $item['thumb'] }}" alt="">
        <h4>{{ $item['series'] }}</h4>
        <a href="{{ url("/items/$index") }}"></a>
    </li>
    @endforeach
</ul>

<style>
  section#products {
    background: #202020;
    padding: 15px 0 55px 0;
  }
  
  #products .container {
    position: relative;
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
  
  #products .container,
  #products ul {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
  }
  
  #products li {
    position: relative;
    padding: 20px 5px 0 5px;
    flex-basis: calc(100% / 6.5);
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  #products li img {
    width: 100%;
    height: calc(100vw / 6.5);
    object-fit: cover;
    object-position: top;
    po
  }
  
  #products li h4 {
    text-align: center;
    padding-top: 10px;
    font-size: 11px;
    color: white;
    text-transform: uppercase;
  }

  #products li a {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: calc(100vw / 6.5);
  }
  
  #products button {
    padding: 7.5px 12.5px;
    background-color: #0c7cec;
    color: white;
    border: none;
    font-weight: bold;
  }
  
  #products button:first-of-type {
    position: absolute;
    top: -30px;
    left: 0;
    font-size: 14px;
  }
  
  #products button:nth-of-type(2) {
    position: absolute;
    bottom: -42.5px;
    left: 50%;
    transform: translateX(-50%);
    padding: 5px 30px;
    font-size: 10px;
    align-self: center;
  }
  
  section#links {
    background: #0c7cec;
    padding: 40px 0;
    position: relative;
    z-index: 2;
  }
  
  #links .container {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  #links ul {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  #links ul > li {
    padding: 0 20px;
  }
  
  #links li > a {
    font-size: 10px;
    color: white;
    text-transform: uppercase;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  #links li img {
    width: auto;
    margin-right: 10px;
  }
  
  #links li img:not(li:nth-of-type(5) img) {
    height: 40px;
  }
  
  #links li:nth-of-type(5) img {
    height: 25px;
  }
  
</style>