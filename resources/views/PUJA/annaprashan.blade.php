@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annaprashan Sanskar Puja</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5; /* Light gray background */
        }
        .accordion-header {
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
        .accordion-header:hover {
            background-color: #e0e0e0;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .accordion-content.expanded {
            max-height: 500px; /* Adjust based on expected content height */
            transition: max-height 0.5s ease-in;
        }
        .rotate-45 {
            transform: rotate(45deg);
        }
        .transition-transform {
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="bg-white shadow-sm py-4 px-6 md:px-12 lg:px-24 flex items-center">
        <a href="#" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Go Back
        </a>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-md p-6 md:p-8 lg:p-10 flex flex-col lg:flex-row items-center lg:items-start gap-8 mb-8">
            <!-- Image Section -->
            <div class="lg:w-1/2 w-full flex justify-center">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Annaprashan+Puja" alt="Annaprashan Sanskar Puja" class="rounded-lg object-cover w-full h-auto max-h-96">
            </div>

            <!-- Text Content Section -->
            <div class="lg:w-1/2 w-full text-center lg:text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Book Pandit Online for Annaprashan Puja/First Food by Experienced Hindi Panditji</h1>
                <p class="text-gray-600 text-lg mb-4">Annaprashan Puja, also known as the First Food Ceremony, is a significant Hindu ritual marking a baby's transition from milk to solid food. It is believed to bless the child with health, prosperity, and a long life.</p>
                <p class="text-gray-700 font-medium mb-2"><strong>Location:</strong> At my home</p>
                <p class="text-green-600 font-semibold text-lg mb-6">2,000+ devotees have booked Pandit for Pujas online</p>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300 ease-in-out">
                    View Package
                </button>
            </div>
        </div>

        <!-- About Annaprashan Sanskar Puja Section -->
        <section class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-orange-600 mb-4">About Annaprashan Sanskar Puja</h2>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Introduction to Annaprashan Puja (अन्नप्राशन संस्कार पूजा)</h3>
            <p class="text-gray-700 leading-relaxed mb-4">Annaprashan (अन्नप्राशन संस्कार पूजा) is a Sanskrit word that means "Grain initiation or Rice feeding". This refers to introducing solid food for the baby for the first time. Usually done after the Namakarana and is considered very auspicious as the baby can have solid foods. The child is usually fed with very small quantities of Rice or Kheer.</p>
            <p class="text-gray-700 leading-relaxed">Annaprashan Puja, also known as the First Food Ceremony, is a significant Hindu ritual marking a baby's transition from milk to solid food. In India, Annaprashan Puja is celebrated with great enthusiasm and devotion. Finding verified and experienced pandits to conduct this auspicious ceremony is essential to ensure that all rituals are performed correctly and traditionally.</p>
        </section>

        <!-- Importance of Annaprashan Puja Section -->
        <section class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-orange-600 mb-4">Importance of Annaprashan Puja</h2>
            <p class="text-gray-700 leading-relaxed">The Annaprashan Ceremony holds deep cultural and religious significance. It is believed to bless the child with health, prosperity, and a long life. The ceremony includes various rituals that are performed to invoke divine blessings. Therefore, it is crucial to have an experienced pandit who understands the intricacies of the Annaprashan Puja Vidhi to ensure that every aspect of the ritual is carried out perfectly.</p>
        </section>

        <!-- Traditions and Cultural Significance Section -->
        <section class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-orange-600 mb-4">Traditions and Cultural Significance</h2>
            <p class="text-gray-700 leading-relaxed mb-4">The Annaprashan Ceremony holds deep cultural and religious significance. It is believed to bless the child with health, prosperity, and a long life. The ceremony includes various rituals that are performed to invoke divine blessings. Therefore, it is crucial to have an experienced pandit who understands the intricacies of the Annaprashan Puja Vidhi to ensure that every aspect of the ritual is carried out perfectly.</p>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Significance of Annaprashan Rituals</h3>
            <p class="text-gray-700 leading-relaxed">The rituals performed during the Annaprashan Puja are designed to invoke the blessings of various deities and ensure the child's well-being. From the selection of the first food to the prayers recited, each aspect of the ceremony holds deep symbolic meaning. The presence of experienced pandits ensures that these rituals are performed with utmost devotion and accuracy.</p>
        </section>

        <!-- Booking Verified Pandits Section -->
        <section class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-orange-600 mb-4">Booking Verified Pandits for Annaprashan Puja</h2>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Ensuring Authenticity</h3>
            <p class="text-gray-700 leading-relaxed mb-4">When booking a pandit for the Annaprashan Ceremony, it is important to verify their credentials. Look for pandits who have received formal training in Vedic rituals and have positive reviews from previous clients. Many online platforms offer profiles of verified pandits, making it easier to choose the right one for your ceremony.</p>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Benefits of Hiring Experienced Pandits</h3>
            <p class="text-gray-700 leading-relaxed mb-4">Experienced pandits bring a wealth of knowledge and expertise to the ceremony. They ensure that all rituals are performed correctly and can also provide valuable guidance on other aspects of the ceremony, such as selecting the right muhurat and arranging the puja items.</p>
            <p class="text-orange-600 font-semibold text-lg text-center mt-6">Note: To View The Cost Of Annaprashan Puja, Kindly Click On The "View Pricing And Packages" Button.</p>
        </section>

        <!-- Frequently Asked Questions Section -->
        <section class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-orange-600 text-center mb-6">Frequently Asked Questions</h2>

            <!-- FAQ Item 1 -->
            <div class="border-b border-gray-200 py-4">
                <div class="flex justify-between items-center accordion-header" data-target="faq-content-1">
                    <h3 class="text-lg font-medium text-gray-800">What is included in the pandit booking service?</h3>
                    <span class="text-gray-500 text-2xl font-bold plus-icon transition-transform">+</span>
                </div>
                <div id="faq-content-1" class="accordion-content px-2 pt-2 text-gray-700">
                    <p>Pooja Samagries like Haldi, Abeer, Gulal, Mango leaves, Tulasi, Darba, Kalash, Beetle Leaves, Beetle Nuts, Havan Sticks, Samidha, Havan Kund, Dravyas, Kapda, Ghee etc. will be brought by us. Yajaman has to keep house items like Vessels, Oil Lamps, Mats, Bowls, Chowki, Plates, Prasad, Photos etc you will be receiving a detailed to-do list after booking.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="border-b border-gray-200 py-4">
                <div class="flex justify-between items-center accordion-header" data-target="faq-content-2">
                    <h3 class="text-lg font-medium text-gray-800">What types of pujas can I book through MyPujaPandit?</h3>
                    <span class="text-gray-500 text-2xl font-bold plus-icon transition-transform">+</span>
                </div>
                <div id="faq-content-2" class="accordion-content px-2 pt-2 text-gray-700">
                    <p>You can book a wide range of pujas, including Grih Pravesh, Satyanarayan Puja, Bhoomi Puja, new office pooja, and more. We also offer personalized puja packages to suit specific needs.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="py-4">
                <div class="flex justify-between items-center accordion-header" data-target="faq-content-3">
                    <h3 class="text-lg font-medium text-gray-800">How do I book a pandit through MyPujaPandit?</h3>
                    <span class="text-gray-500 text-2xl font-bold plus-icon transition-transform">+</span>
                </div>
                <div id="faq-content-3" class="accordion-content px-2 pt-2 text-gray-700">
                    <p>Booking a pandit is simple. Select the desired puja from our list of services, choose a date and time. Complete the booking, and your pandit will arrive at the scheduled time with all necessary items.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Simple Footer (can be expanded if needed) -->
    <footer class="bg-gray-800 text-white py-4 text-center text-sm">
        <p>&copy; 2023 MyPujaPandit. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const targetId = header.dataset.target;
                    const content = document.getElementById(targetId);
                    const plusIcon = header.querySelector('.plus-icon');

                    if (content.classList.contains('expanded')) {
                        content.classList.remove('expanded');
                        plusIcon.classList.remove('rotate-45');
                    } else {
                        // Close all other open accordions
                        document.querySelectorAll('.accordion-content.expanded').forEach(openContent => {
                            openContent.classList.remove('expanded');
                            openContent.previousElementSibling.querySelector('.plus-icon').classList.remove('rotate-45');
                        });

                        content.classList.add('expanded');
                        plusIcon.classList.add('rotate-45');
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection