<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="{{ asset('/css/habitacion.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
    <!-- Barra de Navegación -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="Logo" class="logo-image">
                HUPV
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Hoteles</a></li>
                <li><a href="#informacion">Sobre nosotros</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>
        

    <!-- Encabezado Principal -->
    <section class="hero">
        <div class="slider">
            <div class="slide" style="background-image: url('img/hotel.png');">
                <h1>Experience Luxury Beyond Ordinary</h1>
                <p>Book your dream stay today!</p>
                <button>Explore</button>
            </div>
            <div class="slide" style="background-image: url('img/hotel5.jpg');">
                <h1>Relax and Unwind</h1>
                <p>Find your perfect getaway</p>
                <button>Discover More</button>
            </div>
            <div class="slide" style="background-image: url('img/hotel3.jpg');">
                <h1>Relax and Unwind</h1>
                <p>Find your perfect getaway</p>
                <button>Discover More</button>
            </div>
            <div class="slide" style="background-image: url('img/hotel2.jpg');">
                <h1>Relax and Unwind</h1>
                <p>Find your perfect getaway</p>
                <button>Discover More</button>
            </div>
        </div>
    </section>

      <!-- Encabezado segundo de fechas -->  
    <section id="booking-form">
        <div class="booking-container">
            <h2>BOOK YOUR ROOMS</h2>
            <form>
                <div class="form-group">
                    <label for="arrival">ARRIVAL</label>
                    <input type="date" id="arrival">
                </div>
                <div class="form-group">
                    <label for="departure">DEPARTURE</label>
                    <input type="date" id="departure">
                </div>
                <div class="form-group">
                    <label for="rooms">1 ROOM</label>
                    <select id="rooms">
                        <option>1 Room</option>
                        <option>2 Rooms</option>
                        <option>3 Rooms</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="adults">1 ADULT</label>
                    <select id="adults">
                        <option>1 Adult</option>
                        <option>2 Adults</option>
                        <option>3 Adults</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="children">0 CHILD</label>
                    <select id="children">
                        <option>0 Child</option>
                        <option>1 Child</option>
                        <option>2 Children</option>
                    </select>
                </div>
                <button type="submit">BOOK</button>
            </form>
        </div>
    </section>

    <!-- Sección de Habitaciones -->
    <section id="rooms" class="rooms">
        <div class="section-title">
            <h2>Welcome to Hotel</h2>
            <p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum.</p>
        </div>
        <div class="room-grid">
            <!-- Habitaciones -->

            <div class="room">
                <div class="room-image" style="background-image: url('img/h2.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
            <div class="room">
                <div class="room-image" style="background-image: url('img/h3.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
    
            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>

            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>


            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>


            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>


            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>


            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>


            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>


            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
        </div>
</section>

   

        <!-- Pie de página -->
<footer class="footer">
    <div class="footer-top">
        <div class="contact-info">
            <p>CALL US</p>
            <span>123 456 7890</span>
        </div>
        <div class="contact-info">
            <p>EMAIL US</p>
            <span>info@HUPV.com</span>
        </div>
        <div class="newsletter">
            <p>ENTER ID FOR NEWSLETTER</p>
            <input type="text" placeholder="Your Email">
            <button>GO</button>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-column">
            <h3>HUPV</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consectetur tincidunt dolor.</p>
            <p>St Amsterdam Finland, United States of AKY16 8PN</p>
        </div>
        <div class="footer-column">
            <h3>QUICK LINKS</h3>
            <ul>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Food & Drinks</a></li>
                <li><a href="#">Beach Venues</a></li>
                <li><a href="#">Amenities</a></li>
                <li><a href="#">Noordwijk</a></li>
                <li><a href="#">Wellness</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>WE ARE GLOBAL</h3>
            <img src="img/map.jpg" alt="World Map">
        </div>
    </div>
    <div class="footer-copyright">
        <p>&copy; 2015 HUPV. All rights reserved.</p>
    </div>
</footer>


    <!-- Vincula el script aquí -->
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
