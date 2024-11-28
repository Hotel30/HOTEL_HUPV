<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas de Hoteles</title>
    <link rel="stylesheet" href="{{ asset('/css/ofertas.css') }}">
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Ahorra 30% o más con los Precios para socios. Reserva antes del 4 dic.</h1>
            <p>Ofertas para estas fechas: <strong>del 10 ene. al 12 ene.</strong></p>
            <button class="btn">Ver todas las ofertas</button>
        </div>
    </section>
    <section class="hotels">
        <div class="hotel-card">
            <img src="img/hotel.png" alt="CHN Hotel Monterrey">
            <h3>CHN Hotel Monterrey Norte, Trademark Collection</h3>
            <p class="rating">7.6 <span>Buena</span> (1,025 opiniones)</p>
            <p class="price">
                MXN$1,540 <span class="old-price">MXN$2,200</span>
            </p>
            <p class="total">por noche<br>MXN$3,665 en total impuestos y cargos incluidos</p>
            <button class="btn">Accede a un Precio para socios</button>
        </div>
        <div class="hotel-card">
            <img src="img/hotel2.jpg" alt="Safi Royal Luxury Centro">
            <h3>Safi Royal Luxury Centro</h3>
            <p class="rating">8.4 <span>Muy buena</span> (1,586 opiniones)</p>
            <p class="price">
                MXN$1,542 <span class="old-price">MXN$3,465</span>
            </p>
            <p class="total">por noche<br>MXN$3,670 en total impuestos y cargos incluidos</p>
            <button class="btn">Accede a un Precio para socios</button>
        </div>
        <div class="hotel-card">
            <img src="img/hotel3.jpg" alt="Radisson Hotel Monterrey">
            <h3>Radisson Hotel Monterrey San Jeronimo</h3>
            <p class="rating">8.2 <span>Muy buena</span> (1,000 opiniones)</p>
            <p class="price">
                MXN$1,750 <span class="old-price">MXN$2,500</span>
            </p>
            <p class="total">por noche<br>MXN$4,165 en total impuestos y cargos incluidos</p>
            <button class="btn">Accede a un Precio para socios</button>
        </div>
        <div class="hotel-card">
            <img src="img/hotel5.jpg" alt="Krystal Grand Suites Insurgentes">
            <h3>Krystal Grand Suites Insurgentes</h3>
            <p class="rating">9.0 <span>Magnífica</span> (1,129 opiniones)</p>
            <p class="price">
                MXN$1,856 <span class="old-price">MXN$2,856</span>
            </p>
            <p class="total">por noche<br>MXN$4,436 en total impuestos y cargos incluidos</p>
            <button class="btn">Accede a un Precio para socios</button>
        </div>
    </section>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
