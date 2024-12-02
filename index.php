<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>File Upload SaaS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Ensure full-page height layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>
<body class="bg-black text-white">

<!-- Header -->
<header class="bg-gray-900 py-4 shadow">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Uploadify</h1>
        <nav>
            <a class="px-4 py-2 hover:underline text-gray-300" href="#">Home</a>
            <a class="px-4 py-2 hover:underline text-gray-300" href="#">Features</a>
            <a class="px-4 py-2 hover:underline text-gray-300" href="#">Pricing</a>
            <a class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" href="#">Login</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-4 py-16">
    <!-- Upload Section -->
    <div class="bg-gray-800 shadow-lg rounded-lg p-8 max-w-lg mx-auto">
        <h2 class="text-3xl font-semibold text-center mb-6">Upload Your Files</h2>
        <p class="text-gray-400 text-center mb-8">Easily upload and share your files securely in just a few clicks.</p>
        <form action="<?php $_SERVER['PHP_SELF']?>" class="space-y-4" method="POST" enctype="multipart/form-data">
            <div>
                <label class="block text-sm font-medium text-gray-300">Select File</label>
                <input class="block w-full text-sm text-gray-300 bg-gray-700 border border-gray-600 rounded-lg p-2 mt-1" name="file"
                       type="file">
            </div>
            <button class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700" type="submit">
                Upload
            </button>
        </form>
    </div>
</main>

<!-- Call to Action -->
<section class="bg-blue-600 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h3 class="text-2xl font-semibold">Ready to start sharing?</h3>
        <p class="mt-2 text-lg">Sign up today and enjoy our secure, fast file sharing features.</p>
        <a class="inline-block mt-4 bg-white text-blue-600 px-6 py-2 rounded-lg hover:bg-gray-100" href="#">Get
            Started</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-4">
    <div class="container mx-auto px-4 text-center">
        <p>&copy; 2024 Uploadify. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
<?php

$uploadedFile = $_FILES['file'];
$info         = pathinfo($uploadedFile['name']);
echo "<pre>";
print_r($uploadedFile);
echo "</pre>";
echo "<br>";
echo "<pre>";
print_r($info);
echo "</pre>";
