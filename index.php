<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelEase - Your Ultimate Travel Companion</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">
    <!-- Navigation -->
    <nav class="bg-blue-900 fixed w-full z-20 top-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-3">
                <span class="self-center text-2xl font-bold text-white">TravelEase</span>
            </a>

            <!-- Mobile menu button -->
            <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <!-- Menu -->
            <div class="hidden w-full md:block md:w-auto">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="../Voyage-2.0/index.php" class="block py-2 pl-3 pr-4 text-blue-200 border-b-2 border-blue-200 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="../Voyage-2.0/pages/activities.php" class="block py-2 pl-3 pr-4 text-white hover:text-blue-200 md:p-0">Activities</a>
                    </li>
                </ul>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="../Voyage-2.0/autentification/login.php" class="text-white hover:text-blue-200 font-medium rounded-lg text-sm px-4 py-2">Login</a>
                <a href="../Voyage-2.0/autentification/signUp.php" class="text-blue-900 bg-white hover:bg-blue-100 font-medium rounded-lg text-sm px-4 py-2">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-900 to-blue-700 text-white pt-24">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-6xl">
                    Discover Your Next Adventure
                </h1>
                <p class="max-w-2xl mb-6 font-light text-blue-100 lg:mb-8 md:text-lg lg:text-xl">
                    Book your dream vacation with our smart and flexible booking system. Experience seamless travel planning like never before.
                </p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-blue-900 bg-white rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-blue-300">
                        Reserve Now
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white border border-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="../Voyage-2.0/imgs/pexels-catiamatos-984888.jpg" alt="Tropical beach view" class="rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section class="py-12 bg-white">
        <div class="max-w-screen-xl px-4 py-8 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-center text-blue-900">Popular Destinations</h2>
            <div class="grid gap-8 md:grid-cols-3">
                <!-- Destination 1 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="./imgs/pexels-aysegul-vatansever-2147556894-29890132.jpg" alt="Paris" class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-blue-900">
                        <h3 class="text-xl font-bold text-white">Paris, France</h3>
                        <p class="text-blue-100">The City of Lights</p>
                    </div>
                </div>
                <!-- Destination 2 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="./imgs/pexels-eberhardgross-19779494.jpg" alt="Bali" class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-blue-900">
                        <h3 class="text-xl font-bold text-white">Bali, Indonesia</h3>
                        <p class="text-blue-100">Island Paradise</p>
                    </div>
                </div>
                <!-- Destination 3 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="./imgs/pexels-clement-proust-363898785-14590086.jpg" alt="Tokyo" class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-blue-900">
                        <h3 class="text-xl font-bold text-white">Tokyo, Japan</h3>
                        <p class="text-blue-100">Modern Meets Traditional</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-blue-50 py-12">
        <div class="max-w-screen-xl px-4 py-8 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-center text-blue-900">Our Services</h2>
            <div class="grid gap-8 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="p-6 bg-white rounded-lg shadow-lg border-t-4 border-blue-600">
                    <img src="./imgs/pexels-jeffrey-czum-254391-2253445.jpg" alt="Flight icon" class="w-16 h-16 mb-4">
                    <h3 class="mb-2 text-xl font-bold text-blue-900">Flights</h3>
                    <p class="text-gray-600">Book your flights from a wide selection of airlines at competitive prices.</p>
                </div>
                <!-- Feature 2 -->
                <div class="p-6 bg-white rounded-lg shadow-lg border-t-4 border-blue-600">
                    <img src="./imgs/pexels-vince-2265876.jpg" alt="Hotel icon" class="w-16 h-16 mb-4">
                    <h3 class="mb-2 text-xl font-bold text-blue-900">Hotels</h3>
                    <p class="text-gray-600">Find the perfect accommodation for your stay, from budget to luxury.</p>
                </div>
                <!-- Feature 3 -->
                <div class="p-6 bg-white rounded-lg shadow-lg border-t-4 border-blue-600">
                    <img src="./imgs/pexels-marek-piwnicki-3907296-13922593.jpg" alt="Tour icon" class="w-16 h-16 mb-4">
                    <h3 class="mb-2 text-xl font-bold text-blue-900">Tours</h3>
                    <p class="text-gray-600">Discover guided tour packages for an unforgettable experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-900">
        <div class="max-w-screen-xl px-4 py-12 mx-auto">
            <div class="max-w-screen-md mx-auto text-center">
                <h2 class="mb-4 text-3xl font-extrabold text-white">Ready to Start Your Journey?</h2>
                <p class="mb-8 text-blue-100">Sign up now and get access to exclusive travel deals and personalized recommendations.</p>
                <a href="./autentification/signUp.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-blue-900 bg-white rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-blue-300">
                    Create an Account
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-950 text-white">
        <div class="max-w-screen-xl px-4 py-8 mx-auto">
            <div class="text-center">
                <span class="text-sm text-blue-200">© 2024 TravelEase™. All rights reserved.</span>
            </div>
        </div>
    </footer>
</body>
</html>