<?php
$title = "Contact Us";
?>
<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Contact Us</h1>
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-8">
        <form method="POST" action="/contact">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Your Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Your Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Send Message</button>
        </form>
    </div>
</div>
