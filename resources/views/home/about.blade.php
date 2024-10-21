<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.style') <!-- Include your styles, if any -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <title>About Us</title>
</head>

<body>
    <div class="hero_area">
        <!-- start header section -->
        @include('home.header')
        <!-- end header section -->

        <section class="about_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>About Us</h2>
                </div>
                <p>
                    Welcome to HomeFurniture! We are dedicated to providing high-quality wooden furniture that combines style and functionality. 
                    Our mission is to create pieces that enhance your living spaces and reflect your personal style. 
                    With a passion for craftsmanship and attention to detail, we take pride in every item we offer.
                </p>
                <p>
                    Our team believes that furniture is more than just a functional element in your home; 
                    it's an essential part of your lifestyle. We carefully curate our collections to ensure that each piece is not only beautiful but also durable and sustainable.
                </p>
                <p>
                    Thank you for choosing HomeFurniture. We look forward to helping you find the perfect pieces for your home!
                </p>
            </div>
        </section>

        @include('home.footer') <!-- Include your footer -->
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
