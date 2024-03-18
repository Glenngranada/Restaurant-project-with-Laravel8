// barcode-scanner.js

// Get access to the camera and display the camera feed
navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
        var video = document.getElementById('video');
        video.srcObject = stream;
        video.play();
    })
    .catch(function(err) {
        console.error('Error accessing the camera:', err);
    });

// Initialize the barcode scanner library (e.g., QuaggaJS or Instascan)
// Add event listener to scan button
document.getElementById('scanButton').addEventListener('click', function() {
    // Call a function to start scanning
    startBarcodeScan();
});

function startBarcodeScan() {
    // Implement barcode scanning logic here
    // Example using QuaggaJS:
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#video')
        },
        decoder: {
            readers: ["ean_reader"] // Specify barcode type (EAN-13, UPC-A, etc.)
        }
    }, function(err) {
        if (err) {
            console.error('Error initializing Quagga:', err);
            return;
        }
        console.log('Quagga initialized successfully');
        Quagga.start();
        Quagga.onDetected(function(result) {
            // Handle detected barcode
            console.log('Barcode detected:', result.codeResult.code);
            // You can send the scanned barcode to the server via AJAX if needed
        });
    });
}
