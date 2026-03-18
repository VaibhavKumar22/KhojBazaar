<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KhojBazaar - Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('indianstreet.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .search-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .category-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .category-card:hover {
            transform: translateY(-5px);
        }
        .business-card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .business-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">KhojBazaar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Businesses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="search-box">
                <h2>Find Local Businesses Near You</h2>
                <form class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Search for businesses or products">
                    <input type="text" class="form-control" placeholder="Enter your location">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Popular Categories</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card category-card text-center p-4">
                        <i class="fas fa-utensils fa-3x mb-3 text-primary"></i>
                        <h5>Restaurants</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card category-card text-center p-4">
                        <i class="fas fa-shopping-bag fa-3x mb-3 text-primary"></i>
                        <h5>Retail</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card category-card text-center p-4">
                        <i class="fas fa-cut fa-3x mb-3 text-primary"></i>
                        <h5>Services</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card category-card text-center p-4">
                        <i class="fas fa-graduation-cap fa-3x mb-3 text-primary"></i>
                        <h5>Education</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Businesses -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Featured Businesses</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card business-card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Business">
                        <div class="card-body">
                            <h5 class="card-title">Business Name</h5>
                            <p class="card-text">Short description of the business and what they offer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Category</span>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repeat similar cards for more businesses -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About KhojBazaar</h5>
                    <p>Connecting local businesses with customers in your area.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Businesses</a></li>
                        <li><a href="#" class="text-white">Categories</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>Email: info@khojbazaar.com</p>
                    <p>Phone: +91 1234567890</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 

