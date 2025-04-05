<!-- Include this at the top of your HTML file -->
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Change if needed
$dbname = "gro";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch only the required fields
$sql = "SELECT id, name, price, image FROM products ORDER BY id ";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $products[] = $row;


  }
}
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Project</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    


    <style>
    #orderNowBtn {
        display: none;
        margin: 20px;
        padding: 10px 20px;
        background-color: green;
        color: white;
        border: none;
        cursor: pointer;
    }

    .cart-icon {
        font-size: 20px;
        cursor: pointer;
        padding: 10px;
        background: #f0f0f0;
        display: inline-block;
    }
</style>






</head>
<body>
<!-- header section starts  -->
<header class="header">

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Grocery </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">features</a>
        <a href="#products">products</a>
        <a href="#new-products">New products</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"  style="display: none;"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
          <!-- Plus button for adding a new product -->
            <div class="fas fa-plus" id="add-product-btn">
        </div>
        <div class="fas fa-user" id="login-btn"  style="display: none;"></div>
       
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart" id="shopping-cart">
         <!-- Order Now Button -->
 
</div>
      
    <!-- Cart items will be dynamically inserted here -->
      <!-- Cart items will be dynamically inserted here -->
   <!-- Cart Section -->
<section class="shopping-cart" id="shopping-cart" style="display: none;">
  <h1 class="heading">Your <span>Cart</span></h1>
  
  <!-- Container for cart items -->
  <div id="shopping-cart" class="cart-items"></div>
  
  <!-- Total price block (will be updated via JS) -->
  <div id="cart-total" class="cart-total" style="display: none;"></div>

  <div id='order-now' style="display: none;">
  <form action="testing.php" method="post">
       <button type="submit" class="btn" style="margin-top: 10px;">Order Now</button>
   </form>
</div>

</section>








    <form action="" class="login-form">
        <h3>login now</h3>
        <input type="email" placeholder="your email" class="box">
        <input type="password" placeholder="your password" class="box">
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="#">create now</a></p>
        <input type="submit" value="login now" class="btn">
    </form>


</header>
<!-- header section ends -->
<!-- Modal to Add Product -->
<!-- Modal to Add Product -->
<div id="product-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Add New Product</h2>

        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <label for="product-name">Product Name:</label>
            <input type="text" id="product-name" name="product-name" required>

            <label for="product-price">Product Price:</label>
            <input type="number" id="product-price" name="product-price" required>

            <label for="product-image">Product Image:</label>
            <input type="file" id="product-image" name="product-image" required>

            <input type="submit" value="Add Product">
        </form>
    </div>
</div>




<!-- home section starts  -->
<section class="home" id="home">
    <div class="content">
        <h3>fresh and <span>organic</span> products for your</h3>
        <p>Organica is where early adopters and innovation sockers find lively, imaginative tech before it hits the mainstream.</p>
        <a href="#" class="btn">shop now</a>
    </div>
</section>
<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/feature-img-1.png" alt="">
            <h3>fresh and organic</h3>
            <p>Fresh vegetables and fruits in cheap price.</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/feature-img-2.png" alt="">
            <h3>free delivery</h3>
            <p>We always do fast delivery on our customers.</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/feature-img-3.png" alt="">
            <h3>easy payments</h3>
            <p>It is very easy to pay on our website, you can pay easily.</p>
            <a href="#" class="btn">read more</a>
        </div>

    </div>

</section>

<!-- features section ends -->

<!-- products section starts  -->
<section class="products" id="products">

    <h1 class="heading"> our <span>products</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box" data-id="1" data-name="fresh orange" data-price="4.99">
                <img src="image/product-1.png" alt="">
                <h3>fresh orange</h3>
                <div class="price"> $4.99/- </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="#" class="btn add-to-cart">add to cart</a>
            </div>

            <div class="swiper-slide box" data-id="2" data-name="fresh onion" data-price="4.99">
                <img src="image/product-2.png" alt="">
                <h3>fresh onion</h3>
                <div class="price"> $4.99/- </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="#" class="btn add-to-cart">add to cart</a>
            </div>


            <div class="swiper-slide box" data-id="3" data-name="fresh potato" data-price="4.99-10.99">
                <img src="image/product-5.png" alt="">
                <h3>fresh potato</h3>
                <div class="price"> $4.99/- - 10.99/- </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="#" class="btn add-to-cart">add to cart</a>
            </div>

            <div class="swiper-slide box" data-id="3" data-name="fresh avocado" data-price="4.99-10.99">
                <img src="image/product-6.png" alt="">
                <h3>fresh avocado</h3>
                <div class="price"> $4.99/- - 10.99/- </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="#" class="btn add-to-cart">add to cart</a>
            </div>

            <!-- Add more products here -->
        </div>
    </div>
</section>
<!-- products section ends -->


<!-- new products section starts -->



 <section class="products" id="new-products">
  <h1 class="heading">New <span>Products</span></h1>

  <!-- Swiper wrapper outside loop to group all slides -->
  <div class="swiper product-slider">
    <div class="swiper-wrapper" id="new-products-wrapper">
      <?php foreach ($products as $product): ?>
        <div class="swiper-slide box">
          <div class="product">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                 alt="<?php echo htmlspecialchars($product['name']); ?>" 
                 onerror="this.onerror=null; this.src='images/placeholder.png';">
            
            <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
            <p class="product-price">₹<?php echo htmlspecialchars($product['price']); ?></p>

            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Swiper Navigation (optional) -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>




 <!-- new products section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="image/pic-1.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>john</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-2.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>Juliyana</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-3.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>Jonathon</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-4.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>Oliveya</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- review section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/blog-1.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st oct, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Organica Is Where Early Adopters And Innovation Sockers Find Lively, Imaginative Tech Before It Hits The Mainstream.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-2.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st oct, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Organica Is Where Early Adopters And Innovation Sockers Find Lively, Imaginative Tech Before It Hits The Mainstream.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-3.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st oct, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Organica Is Where Early Adopters And Innovation Sockers Find Lively, Imaginative Tech Before It Hits The Mainstream.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->
<!-- shopping cart section starts -->
<!-- Here, the cart will display dynamically -->
<!-- footer section starts  -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3> Grocery <i class="fas fa-shopping-basket"></i> </h3>
            <p> This is our basic website to order our daily required products, We can keep improving its features.</p>
        </div>
    </div>
</section>
<!-- footer section ends -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>



<script>
    const cart = [];
    const cartItemsContainer = document.getElementById("shopping-cart");
    const totalPriceContainer = document.createElement("div"); // Create a div to hold the total
    totalPriceContainer.classList.add("cart-total");

    // Attach total price element right below cart items container
    cartItemsContainer.insertAdjacentElement("afterend", totalPriceContainer);

    // Add to cart functionality
    document.querySelectorAll(".products .add-to-cart").forEach(button => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const product = event.target.closest(".box");
            const id = product.getAttribute("data-id");
            const name = product.getAttribute("data-name");
            const price = parseFloat(product.getAttribute("data-price"));
            const order=product.getAttribute("order-now");

            cart.push({ id, name, price,product });
            updateCartUI();
        });
    });

    function updateCartUI() {
        cartItemsContainer.innerHTML = ''; // Clear current items
        let totalPrice = 0;

        cart.forEach(item => {
            const cartItemElement = document.createElement("div");
            cartItemElement.classList.add("box");
            cartItemElement.innerHTML = `
                <i class="fas fa-trash" onclick="removeItemFromCart('${item.id}')"></i>
                <div class="content">
                    <h3>${item.name}</h3>
                    <span class="price">₹${item.price.toFixed(2)}</span>
                    
                   
   
                </div>
            `;
            totalPrice += item.price;
            cartItemsContainer.appendChild(cartItemElement);
        });

        totalPriceContainer.innerHTML = `
            <h3  padding: 1rem 0;">
                Total: ₹${totalPrice.toFixed(2)}
                </h3>
                 <h6 padding: 1rem 0;">
                <form action="place_order.php" method="post">
       <button type="submit" class="btn" style="margin-top: 5px;">Order Now</button>
   </form>
            </h6>
             
        `;
    }

    function removeItemFromCart(itemId) {
        const updatedCart = cart.filter(item => item.id !== itemId);
        cart.length = 0;
        cart.push(...updatedCart);
        updateCartUI();
    }

    
    
    // Modal logic (no changes)
    const addProductBtn = document.getElementById("add-product-btn");
    const productModal = document.getElementById("product-modal");
    const closeBtn = document.querySelector(".close-btn");
    const productForm = document.getElementById("product-form");

    addProductBtn?.addEventListener("click", () => {
        productModal.style.display = "flex";
    });

    closeBtn?.addEventListener("click", () => {
        productModal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === productModal) {
            productModal.style.display = "none";
        }
    });
</script>






<script>

    // Handle form submission (with AJAX to submit the form data)
    productForm.addEventListener("submit", function(event) {
        event.preventDefault();

        // Create FormData object to send form data including the image
        const formData = new FormData(productForm);

        // Make an AJAX request to submit the form data
        fetch("add_product.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show the response message from PHP

            if (data.includes('Product added successfully')) {
                // Get product data from the form
                const productName = document.getElementById("product-name").value;
                const productPrice = parseFloat(document.getElementById("product-price").value);
                const productImage = document.getElementById("product-image").files[0]; // Get the image file

                // Create a URL for the image (using FileReader to convert image to base64 for display)
                const reader = new FileReader();
                reader.onloadend = function() {
                    const productImageUrl = reader.result; // Base64 image URL

                    // Create the new product element
                    const newProduct = document.createElement("div");
                    newProduct.classList.add("swiper-slide", "box");
                    newProduct.setAttribute("data-name", productName);
                    newProduct.setAttribute("data-price", productPrice);
                    
                    newProduct.innerHTML = `
                        <img src="${productImageUrl}" alt="${productName}">
                        <h3>${productName}</h3>
                        <div class="price">$${productPrice.toFixed(2)}/-</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <a href="#" class="btn add-to-cart">add to cart</a>
                    `;

                    // Append the new product to the swiper-wrapper
                    document.querySelector(".swiper-wrapper").appendChild(newProduct);

                    // Reset the form
                    productForm.reset();

                    // Close the modal
                    productModal.style.display = "none";
                };

                // If there's an image, read it
                if (productImage) {
                    reader.readAsDataURL(productImage); // Convert image to base64
                }
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
</script>





</script>







</body>
</html>
