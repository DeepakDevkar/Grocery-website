<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Place Your Order</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #f8f9fa, #e0f7fa);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .order-container {
      background: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 400px;
      text-align: center;
      position: relative;
      transition: all 0.4s ease;
    }

    .order-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .qr-code {
      margin-bottom: 25px;
    }

    .order-form input[type="text"],
    .order-form input[type="tel"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .order-form button {
      width: 100%;
      padding: 12px;
      background-color: #00bcd4;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 15px;
    }

    .order-form button:hover {
      background-color: #0097a7;
    }

    .success-message {
      display: none;
      flex-direction: column;
      align-items: center;
      animation: fadeIn 0.5s ease forwards;
    }

    .checkmark {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #4CAF50;
      margin: 20px auto;
      animation: pop 0.5s ease-out forwards;
    }

    .checkmark svg {
      width: 40px;
      height: 40px;
      stroke: white;
      stroke-width: 4;
      fill: none;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: draw 0.5s 0.3s ease forwards;
    }

    @keyframes draw {
      to {
        stroke-dashoffset: 0;
      }
    }

    @keyframes pop {
      0% {
        transform: scale(0);
      }
      100% {
        transform: scale(1);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <div class="order-container" id="orderBox">
    <h2>Place Your Order</h2>

    <div class="qr-code">
      <!-- Replace this with your actual QR code path -->
      <img src="uploads/scanner.jpg" alt="QR Code" width="200">
    </div>

    <form class="order-form" id="orderForm">
      <input type="text" name="address" placeholder="Enter your address" required>
      <input type="tel" name="mobile" placeholder="Enter your mobile number" pattern="[0-9]{10}" required>
      <button type="submit">Place Order</button>
    </form>

    <div class="success-message" id="successMsg">
      <div class="checkmark">
        <svg viewBox="0 0 52 52">
          <path d="M14 27 l10 10 l20 -20"></path>
        </svg>
      </div>
      <h3 style="color: #4CAF50;">Order Placed Successfully!</h3>
    </div>
  </div>

  <script>
    const form = document.getElementById('orderForm');
    const success = document.getElementById('successMsg');

    form.addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent actual form submission

      form.style.display = "none";
      success.style.display = "flex";

      // Redirect to testing.php after 2.5 seconds
      setTimeout(() => {
        window.location.href = "testing.php";
      }, 2500);
    });
  </script>

</body>
</html>
