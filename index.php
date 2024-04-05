<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjot World</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        header, nav, footer {
            background-color: #333;
            color: #fff;
            padding: 1.5rem 0;
            text-align: center;
        }

        nav {
            background-color: #444;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1rem;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #f8f8f8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .articles {
            flex: 1;
            margin-right: 1.5rem;
        }

        .features {
            flex: 1;
            margin-left: 1.5rem;
        }

        .article,
        .feature {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
            position: relative;
        }

        .article:hover,
        .feature:hover {
            transform: translateY(-5px);
        }

        .article img,
        .feature img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        .article-content,
        .feature-content {
            padding: 1.5rem;
        }

        .article-content h3,
        .feature-content h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #444;
        }

        .article-content p,
        .feature-content p {
            color: #666;
            line-height: 1.8;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            font-size: 1rem;
        }

        .banner {
            background-image: linear-gradient(to bottom right, #4e54c8, #8f94fb);
            background-size: cover;
            background-position: center;
            height: 300px;
            position: relative;
            border-bottom: 8px solid #333;
            overflow: hidden;
        }

        .banner-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-align: center;
            width: 100%;
            z-index: 1;
        }

        .banner-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .banner-content p {
            font-size: 1.2rem;
            font-weight: 300;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .banner-overlay::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            border: 2px solid #fff;
            border-radius: 50%;
            animation: pulse 2s linear infinite;
        }

        @keyframes pulse {
            0% {
                transform: translate(-50%, -50%) scale(0.8);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.2);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="banner">
            <div class="banner-content">
                <h1>Welcome to Harjot World</h1>
                <p>Explore the latest articles, news, and insights on various topics.</p>
            </div>
            <div class="banner-overlay"></div>
        </div>
    </header>
    
    <div class="container">
        <div class="articles">
            <h2>About Us</h2>
            <p>Harjot World is a platform dedicated to providing insightful articles on a wide range of topics. From technology and science to arts and culture, we strive to bring you engaging content that enriches your knowledge and fuels your curiosity.</p>
            <p>Our team of writers and contributors are passionate about sharing valuable information and perspectives with our readers. We believe in the power of knowledge to inspire, educate, and empower individuals around the world.</p>
            <h2>Recent Articles</h2>
            <?php
                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "press1";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch articles from the database
                $sql = "SELECT * FROM articles";
                $result = $conn->query($sql);

                // Display articles
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="article">';
                        echo '<img src="' . $row['image_url'] . '" alt="' . $row['title'] . '">';
                        echo '<div class="article-content">';
                        echo '<h3>' . $row['title'] . '</h3>';
                        echo '<p>' . $row['description'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No articles found.";
                }

                // Close connection
                $conn->close();
            ?>
        </div>
        <div class="features">
            <h2>Featured Articles</h2>
            <!-- Featured article 1 -->
            <div class="feature">
                <h3>Article Title 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit condimentum, rhoncus lorem ut, luctus velit.</p>
            </div>
            <!-- Featured article 2 -->
            <div class="feature">
                <h3>Article Title 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit condimentum, rhoncus lorem ut, luctus velit.</p>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; Harjot.202106443..  All Rights Reserved.</p>
    </footer>
</body>
</html>