<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Parking Registration</title>
  <link rel="stylesheet" href="./imports/tailwind.min.css">
  <script src="./imports/script.js"></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <style>
    @font-face {
      font-family: 'FH-Oscar';
      src: url('./assets/fonts/FH-Oscar.otf');
    }

    .heading {
      font-family: 'FH-Oscar';
    }
  </style>
  <script>
    
    function generateQRCodeAndDownload() {
      var textInput = document.getElementById("vehicle-registration");
      var qrcodeDiv = document.getElementById("qrcode");

      var data = textInput.value;

      if (data.trim() === "") {
        alert("Please enter some text.");
        return;
      }

      var qrcode = new QRCode(qrcodeDiv, {
        text: data,
        width: 128,
        height: 128,
      });

      var qrCodeDataURL = qrcodeDiv.querySelector("canvas").toDataURL("image/png");

      var tempLink = document.createElement("a");
      tempLink.href = qrCodeDataURL;
      tempLink.download = `${data}.png`;

      tempLink.click();
      document.getElementById("registration-form").submit();
    }
  </script>
</head>

<body>
  <div class="min-h-screen flex flex-row items-center">
    <!-- Left Side -->
    <div class="w-1/2 relative">
      <img src="./assets/register.jpg" alt="Car Parking" class="w-full h-full object-cover">
      <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-start items-center bg-black bg-opacity-50 mt-12 p-12">
        <h2 class="text-white text-5xl font-bold heading tracking-wider underline">
          Smart Car Parking
        </h2>
        <p class="text-white text-xl font-medium">Register Your Car Now</p>
      </div>
    </div>
    <div class="bg-white w-1/2">
      <div class="flex px-12 items-center justify-between">
        <br>
        <h1 class="text-3xl font-semibold text-gray-700 ml-16">Register</h1>
        <a href="index.php" class="btn btn-primary-outline px-4 py-2 rounded-md text-blue-600 font-semibold border border-blue-600 hover:text-white hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Scan/Login</a>
      </div>
      <small class="text-red-500" id="error-message"></small>
      <div id="qrcode" hidden>
      </div>
      <form action="auth/register.php" method="POST" id="registration-form" class="p-12">
        <div class="grid grid-cols-2 gap-4">
          <!-- First Column -->
          <div>
            <div class="mb-4">
              <label for="first-name" class="block text-gray-600 font-semibold">First Name*</label>
              <input type="text" id="first-name" name="first-name" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="John">
            </div>

            <div class="mb-4">
              <label for="vehicle-registration" class="block text-gray-600 font-semibold">Vehicle Registration
                Number*</label>
              <input type="text" id="vehicle-registration" name="vehicle-registration" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="TN-01-AB-1234" maxlength="13" minlength="13" oninput="addHyphens(this)">
            </div>
            <div class="mb-4">
              <label for="email" class="block text-gray-600 font-semibold">Email Address*</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="johnsmith@gmail.com" onblur="validateEmail(this)">
            </div>
            <div class="mb-4">
              <label for="phone-number" class="block text-gray-600 font-semibold">Phone Number*</label>
              <input type="tel" id="phone-number" name="phone-number" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="9876543210" maxlength="10" minlength="10" oninput="onlyNumbers(this)">
            </div>
          </div>

          <!-- Second Column -->
          <div>
            <div class="mb-4">
              <label for="last-name" class="block text-gray-600 font-semibold">Last Name*</label>
              <input type="text" id="last-name" name="last-name" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="Smith">
            </div>
            <div class="mb-4">
              <label for="pincode" class="block text-gray-600 font-semibold">Pincode*</label>
              <input type="text" id="pincode" name="pincode" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="600028" maxlength="6" minlength="6" oninput="onlyNumbers(this)">
            </div>
            <div class="mb-4">
              <label for="confirm-email" class="block text-gray-600 font-semibold">Confirm Email Address*</label>
              <input type="email" id="confirm-email" name="confirm-email" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required placeholder="johnsmith@gmail.com" onblur="confirmEmail(this, document.getElementById('email'))">
            </div>
            <div class="mb-4">
              <label class="block text-gray-600 font-semibold">Preferred Mode of Communication*</label>
              <div class="flex">
                <label class="inline-flex items-center mr-6">
                  <input type="checkbox" name="communication-mode[]" value="phone" class="form-checkbox h-4 w-4 text-blue-500">
                  <span class="ml-2 text-gray-700">Phone</span>
                </label>
                <label class="inline-flex items-center">
                  <input type="checkbox" name="communication-mode[]" value="email" class="form-checkbox h-4 w-4 text-blue-500">
                  <span class="ml-2 text-gray-700">Email</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-600 font-semibold">Password*</label>
          <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="confirm-password" class="block text-gray-600 font-semibold">Confirm Password*</label>
          <input type="password" id="confirm-password" name="confirm-password" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required onblur="confirmPassword(this, document.getElementById('password'))">
        </div>
        <div class="flex items-center justify-between">
          <button type="button" id="generate-qr-code" onclick="generateQRCodeAndDownload()"
          class="rounded-md text-white font-semibold bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Register</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>