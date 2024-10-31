<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Be-Benz</title>
    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Background div -->
    <div class="background" style="background-image: url('assets/Asset-15.png')"></div>
    <main>
        <!-- Navbar -->
        <nav class="navbar">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="{{route('lineup')}}">LINE UP</a></li>
                <li><a href="{{route('package')}}">PACKAGE</a></li>
                <li><a href="{{route('aboutus')}}">ABOUTUS</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
            </ul>
        </nav>

        {{-- --HOME-- --}}
        {{-- Jababeka --}}
        <img src="assets/Asset-9.png" alt="Descriptive alt text" class="content-image-head">

        {{-- BE-BENZ --}}
        <img src="assets/Asset-23.png" alt="Descriptive alt text" class="content-image-mid">

        {{-- DATE --}}
        <img src="assets/Asset-10.png" alt="Descriptive alt text" class="content-image-mid2">

        <!-- BUTTON -->
        <div class="button-container">
            <a href="{{ route('order.create') }}">
                <button class="button-primary">BUY TICKETS</button>
            </a>
            <a href="{{route('faq')}}">
                <button class="button-secondary">FAQ</button>
            </a>
        </div>


        {{-- --LINEUP SECTION-- --}}
        {{-- LINEUP TEXT --}}
        <img src="assets/Asset-17.png" alt="Descriptive alt text" class="content-image-lineuptext">
        {{-- VIEWALL TEXT --}}
        <img src="assets/Asset-18.png" alt="Descriptive alt text" class="content-image-viewalltext">
        <!-- Scrollable Image Container -->
        <div class="scroll-container">
            <img src="assets/Asset-19.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/Asset-19.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/Asset-19.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/Asset-19.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/Asset-19.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/Asset-19.png" alt="Descriptive alt text" class="content-image-lineup">
        </div>


        <!-- Countdown Section -->
        <img src="assets/Asset-17.png" alt="Descriptive alt text" class="content-image-countdown">
        <div class="countdown-container">
            <div class="countdown-item"><span id="days">00</span> Days</div>
            <div class="countdown-item"><span id="hours">00</span> Hours</div>
            <div class="countdown-item"><span id="minutes">00</span> Minutes</div>
            <div class="countdown-item"><span id="seconds">00</span> Seconds</div>
        </div>
    </main>
    <script>
        // Set the event date
        const eventDate = new Date('2025-01-10T23:59:59').getTime();

        // Update the countdown every second
        const countdownInterval = setInterval(() => {
            const now = new Date().getTime();
            const timeLeft = eventDate - now;

            // Calculate days, hours, minutes, and seconds
            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            // Display the results
            document.getElementById('days').innerText = days;
            document.getElementById('hours').innerText = hours;
            document.getElementById('minutes').innerText = minutes;
            document.getElementById('seconds').innerText = seconds;

            // If the countdown is over, stop the timer
            if (timeLeft < 0) {
                clearInterval(countdownInterval);
                document.querySelector('.countdown-container').innerText = 'Event Started!';
            }
        }, 1000);
    </script>
</body>

</html>
