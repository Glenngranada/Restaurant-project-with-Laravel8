<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <title>Barcode Scanner</title>
</head>
<body>
    <h1>Barcode Scanner</h1>
    <video id="video" width="300" height="200" autoplay></video>
    <button id="scanButton">Scan Barcode</button>
    <script src="{{ asset('js/barcode-scanner.js') }}"></script>
</body>
</html>