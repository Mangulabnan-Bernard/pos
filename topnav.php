<!-- Navigation Bar -->
<nav class="navbar">
    <div class="logo">Birdenstock</div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="guide.php">Guide</a></li>
        <li><a href="products.php">Items</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="#" onclick="openLogoutModal()" class="logout-btn">Logout</a></li>
    </ul>
</nav>
<!-- Include this part at the bottom of each page (before the closing </body>) -->

<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="modal">
    <div class="modal-content">
        <h3>Are you sure you want to logout?</h3>
        <button onclick="logout()">Yes</button>
        <button onclick="closeLogoutModal()">No</button>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
function openLogoutModal() {
    document.getElementById("logoutModal").style.display = "block";
}

function closeLogoutModal() {
    document.getElementById("logoutModal").style.display = "none";
}

function logout() {
    window.location.href = "index.php"; // Redirects to index.php after logout
}
</script>

<!-- Minimal CSS for Modal -->
<style>
/* Ensure modal stays on top and centered */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 9999; /* High z-index to avoid conflicts */
    text-align: center;
    padding-top: 20%;
}

/* Style for modal content */
.modal-content {
    background: white;
    padding: 20px;
    display: inline-block;
    border-radius: 5px;
    max-width: 400px; /* Limit modal width */
    width: 100%; /* Ensure it adapts to smaller screens */
}

/* Buttons style */
button {
    margin: 5px;
    padding: 10px;
    cursor: pointer;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3; /* Hover effect */
}
</style>
