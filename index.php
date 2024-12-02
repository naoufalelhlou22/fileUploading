<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload SaaS</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<!-- Header -->
<header>
    <div class="container">
        <h1>Uploadify</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Features</a>
            <a href="#">Pricing</a>
            <a href="#" class="login">Login</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main>
    <div class="upload-section">
        <h2>Upload Your Files</h2>
        <p>Easily upload and share your files securely in just a few clicks.</p>
        <form action="handel.php" method="POST" enctype="multipart/form-data" >
            <label for="file">Select File</label>
            <input id="file" name="image" type="file" >
            <button type="submit">Upload</button>
        </form>
    </div>
</main>

<!-- Call to Action -->
<section class="call-to-action">
    <h3>Ready to start sharing?</h3>
    <p>Sign up today and enjoy our secure, fast file sharing features.</p>
    <a href="#">Get Started</a>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Uploadify. All rights reserved.</p>
</footer>

</body>
</html>
