@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MyPoojaPandit</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom gradient for buttons */
        .btn-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
        }
        .text-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Style for FAQ accordion */
        .faq-item {
            border-bottom: 1px solid #e5e7eb; /* gray-200 */
        }
        .faq-item:last-child {
            border-bottom: none;
        }
        .faq-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            cursor: pointer;
            font-weight: 600;
            color: #374151; /* gray-700 */
        }
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            padding-bottom: 0;
            color: #4b5563; /* gray-600 */
        }
        .faq-content.active {
            max-height: 200px; /* Adjust as needed */
            padding-bottom: 1rem;
        }
        .faq-icon {
            transition: transform 0.3s ease-out;
        }
        .faq-icon.rotate {
            transform: rotate(45deg);
        }
    </style>
</head>
<body class="bg-white text-gray-800">

    <!-- Header Section -->
    <header class="bg-white shadow-sm">
        
    </header>

    <!-- Contact Us Hero Section -->
    <section class="relative bg-cover bg-center h-[400px] flex items-center justify-center rounded-b-lg overflow-hidden" style="background-image: url('{{ asset('images/DURGA PUJA.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50 rounded-b-lg"></div>
        <div class="relative z-10 text-white text-center px-4 max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 rounded-lg">
                Contact Us
            </h1>
            <p class="text-lg md:text-xl rounded-lg">
                We're here to help! Reach out to us for any queries, support, or feedback.
            </p>
        </div>
    </section>

    <!-- Contact Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-8">
            <!-- Contact Information -->
            <div class="lg:w-1/2 bg-gray-900 text-white rounded-lg p-8 shadow-lg">
                <h2 class="text-3xl font-bold mb-6">Contact Information</h2>
                <p class="text-gray-300 mb-4">For Technical Support, Partnership, Grievances or any other enquiry call us via: (7AM to 10PM all days).</p>
                <p class="text-lg font-semibold mb-6">Speak directly with our team for instant puja bookings and personalized assistance.</p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300 mb-6">
                    Call Us Now
                </button>
                <p class="text-gray-300 mb-4">Have a question or need help booking a puja? Tap below to connect instantly with our team on WhatsApp.</p>
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300 mb-6">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                </button>
                <div class="flex items-start text-gray-300 mb-6">
                    <i class="fas fa-map-marker-alt text-xl mr-3 mt-1"></i>
                    <p>2nd floor, Leeavart Central, Patliputra, Patna</p>
                </div>
                <p class="text-gray-300 mb-6">We'd love to hear your feedback to help us improve your experience.</p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300 mb-8">
                    Submit Feedback
                </button>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-orange-500 text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-300 hover:text-orange-500 text-xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-orange-500 text-xl"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-gray-300 hover:text-orange-500 text-xl"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- Get in Touch Form -->
            <div class="lg:w-1/2 bg-orange-50 rounded-lg p-8 shadow-lg">
                <h2 class="text-3xl font-bold mb-6 text-gradient">Get in Touch</h2>
                <p class="text-gray-700 mb-8">We'd love to hear from you! Whether you have a question, need assistance with a puja, or want personalized spiritual guidance – we're just a message away.</p>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="firstName" class="block text-gray-700 text-sm font-semibold mb-2">First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Suraj" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label for="lastName" class="block text-gray-700 text-sm font-semibold mb-2">Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Kumar" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter The Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+91 7788996543" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div class="md:col-span-2">
                        <label for="message" class="block text-gray-700 text-sm font-semibold mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message...." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 resize-y"></textarea>
                    </div>
                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Frequently Asked Questions Section -->
    <section class="py-16 bg-orange-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-gradient text-center">Frequently Asked Questions</h2>
            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>What is kundali making, and how do I get one?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">Kundali making involves creating a birth chart based on your birth date, time, and place. It provides insights into your personality, future, and life events. You can get one by providing your birth details to our astrologers through our platform.</p>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>How do I contact customer support?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">You can contact our customer support via phone, WhatsApp, or by filling out the contact form on this page. Our team is available from 7 AM to 10 PM daily to assist you with any queries.</p>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>What if I have special requests or need a customized puja?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">We offer personalized puja services to cater to your specific needs. Please mention your special requests in the message section of the contact form, or discuss them directly with our team via call or WhatsApp.</p>
                    </div>
                </div>
                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>Can I cancel or reschedule a booking?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">Yes, you can cancel or reschedule your booking. Please refer to our terms and conditions or contact customer support for detailed information on our cancellation and rescheduling policy.</p>
                    </div>
                </div>
                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>What payment methods are accepted?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">We accept various secure payment methods, including credit/debit cards, net banking, and popular UPI apps. All transactions are processed securely through our payment gateway.</p>
                    </div>
                </div>
                <!-- FAQ Item 6 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>Can I book a pandit for an urgent puja?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">For urgent puja requirements, please contact us directly via phone or WhatsApp. We will do our best to arrange a verified pandit for you as quickly as possible.</p>
                    </div>
                </div>
                <!-- FAQ Item 7 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>Are the pandits on your platform verified?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">Yes, all pandits on MyPujaPandit are thoroughly vetted, experienced, and verified to ensure they perform authentic Vedic rituals with devotion and tradition.</p>
                    </div>
                </div>
                <!-- FAQ Item 8 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFAQ(this)">
                        <span>What is MyPujaPandit?</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p class="py-2">MyPujaPandit is your trusted online platform for booking verified and experienced pandits for all your religious ceremonies and spiritual guidance needs. We aim to bridge the gap between tradition and modern convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

    <script>
        function toggleFAQ(element) {
            const content = element.nextElementSibling;
            const icon = element.querySelector('.faq-icon');

            if (content.classList.contains('active')) {
                content.classList.remove('active');
                content.style.maxHeight = '0';
                icon.classList.remove('rotate');
            } else {
                // Close all other open FAQs
                document.querySelectorAll('.faq-content.active').forEach(item => {
                    item.style.maxHeight = '0';
                    item.classList.remove('active');
                    item.previousElementSibling.querySelector('.faq-icon').classList.remove('rotate');
                });

                // Open the clicked FAQ
                content.classList.add('active');
                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add('rotate');
            }
        }
    </script>

</body>
</html>
@endsection
