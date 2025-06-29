@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative flex flex-col items-center justify-center min-h-screen text-center px-4 pt-24 overflow-hidden bg-gradient-to-br from-blue-900 to-black text-white">
        <img src="/images/personal.png" alt="Jans's Photo" class="rounded-full border-4 border-white shadow-lg mb-6 w-40 h-40 object-cover hover:scale-105 transition-transform duration-300">
        <h1 class="text-5xl font-extrabold mb-2">Hi, I'm <span class="text-blue-400">Jans Fahrel</span></h1>
        <p class="text-xl mb-6 opacity-90">Fullstack Developer & Back-End Engineer</p>
        <a href="#contact" class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-500 transition shadow-md transform hover:scale-105">Contact Me</a>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">About Me</h2>
        <p class="text-lg text-gray-700 leading-relaxed mb-4">
            I'm a passionate developer who enjoys crafting elegant solutions to complex problems. With hands-on experience in PHP, Laravel, Tailwind, and modern JavaScript, I strive to deliver quality websites and applications.
        </p>
        <p class="text-lg text-gray-700 leading-relaxed">
            In my free time, I explore new frameworks and contribute to open-source projects.
        </p>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 max-w-6xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-gray-900 mb-10">Projects</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Project card -->
            <div class="bg-white shadow-md rounded-xl p-6 hover:scale-105 transition-transform">
                <img src="https://via.placeholder.com/300x200" alt="Project 1" class="rounded-md mb-4 w-full">
                <h3 class="text-2xl font-semibold mb-2">Project One</h3>
                <p class="text-gray-600 mb-4">A short description of this awesome project.</p>
                <a href="#" class="text-blue-500 hover:text-blue-400">View Details →</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Contact</h2>
        <p class="text-gray-600 mb-8">Reach out to me on the platforms below or chat directly using the bubble icon.</p>
        <div class="flex space-x-6 justify-center text-2xl mb-8">
            <a href="https://www.linkedin.com/in/jansfahrel" class="text-blue-500 hover:text-blue-400">LinkedIn</a>
            <a href="https://github.com/jansfahrel" class="text-blue-500 hover:text-blue-400">GitHub</a>
            <a href="https://www.instagram.com/fahrelllls" class="text-blue-500 hover:text-blue-400">Instagram</a>
        </div>
    </section>
@endsection
