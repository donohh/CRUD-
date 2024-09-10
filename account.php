<?php
    require_once "connectdb.php";   
    $query = mysqli_query($connection, "SELECT * FROM `culinary_blog`");    
    $items = mysqli_fetch_all($query);  

    $queryCategories = mysqli_query($connection, "SELECT * FROM `categories`");    
    $categories = mysqli_fetch_all($queryCategories);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        :root {
            --tangerine-color: rgba(244, 142, 40, 1);
            --white-color: rgba(255, 255, 255, 1);
            --black-color: rgba(0, 0, 0, 1);
            --gray-color: rgba(182, 182, 182, 1);        
            --light-tangerine-color: rgba(245, 221, 196, 1);   
        }

        body {
            font-family: "Montserrat", sans-serif;
            background-color: var(--white-color);
        }

        ul {
            list-style: none;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 11%;
            background-color: var(--white-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }

        .search {
            display: flex;
            flex-direction: row;
            position: relative;
            width: auto;
            height: 50px;
            margin: 0 15% 0 0;
        }

        .search a {    
            position: relative;
            left: -50px;
        }

        .search .search-input {
            height: 100%;
            width: 225px;
            color: black;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            background: transparent;
            border: none;
        }

        .search a img {
            width: 35px;
            height: 35px;
            align-self: center;
            left: 4px;
            position: relative;
        }

        .logo {
            width: 94px;
            height: 56px;
            position: relative;
            text-decoration: none;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 55px;
        }

        .navbar a {           
            font-size: 18px;
            color: var(--black-color);
            text-decoration: none;
            font-weight: 600;
            line-height: 21.94px;
            transition: .3s;
        }

        .home {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10.5%;
        }

        .home-content {
            max-width: 620px
        }

        .home-content h1 {
            position: relative;
            font-size: 93px;
            font-weight: 700;
            margin: 5px 0 5px 0;
        }

        .home-content span {
            color: var(--tangerine-color);
        }

        .home-content p {
            font-size: 18px;
            font-weight: 500;
        }

        .home-content .btn-box {
            display: flex;
            gap: 25px;
            position: relative;
            width: 400px;
            height: auto;
            margin: 7.5% 0 0 0;
        }

        .btn-box a {
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 50px;
            background: var(--tangerine-color);
            border: 2px solid var(--tangerine-color);
            border-radius: 22px;
            font-size: 16px;
            font-weight: 700;
            color: var(--white-color);
            text-decoration: none;
            letter-spacing: 1px;
            z-index: 1;
            overflow: hidden;
            transition: .5s;
        }

        .btn-box img {
            width: 30px;
            height: 30px;
            margin: 5%;
        }

        .btn-box a:nth-child(2) {
            width: 200px;
            background: transparent;
            border: 2px solid transparent;
            color: var(--black-color);
        }

        .product {
            display: flex;
            flex-direction: column;
        }

        .product form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2.5%;
        }

        .product select {
            display: inline-flex;
            width: 150px;
            height: 30px;
            background: var(--white-color);
            border: 1px solid var(--black-color);
            border-radius: 12.5px;
        }

        .product button {
            position: relative;
            height: 30px;
            background: var(--tangerine-color);
            border: 1px solid var(--tangerine-color);
            border-radius: 12.5px;
            color: var(--white-color);
            letter-spacing: 1px;
            left: 10px;
        }

        .product .culinaryBlogsAll {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-template-rows: auto auto;
            gap: 5px;
            margin: 0 20px 0 20px;
        }

        .culinaryBlogOne {
            background-color: var(--white-color);
            width: 485px;
            height: 485px;
            border-radius: 35px;
        }

        .culinaryBlogOne h4 {
            font-size: 26px;
            font-weight: 700;
            line-height: 31.69px;
            margin: 10px 0 0 10%;
        }

        .culinaryBlogOne p {
            display: flex;
            justify-content: end;
            margin: 10px 17% 0 0;
            font-size: 18px;
            font-weight: 500;
            line-height: 21.94px;
        }

        .culinaryBlogOne .rating {
            display: flex;
            align-items: center;
            font-size: 13px;
            font-weight: 400;
            line-height: 15.85px;
        }   

        .culinaryBlogOne img {
            width: 100%;
            height: 333px;
            border-top-left-radius: 35px;
            border-top-right-radius: 35px;
        }

        .culinaryBlogOne .information {
            display: grid;
            grid-template-columns: auto auto;
            grid-template-rows: auto auto;
            padding: 0;
            height: auto;
        }

        .culinaryBlogOne .buttons {
            grid-row: 2;
            margin: 15px 0 0 10%;
        }

        

        .culinaryBlogOne .buttonCulinaryBlog {
            width: 135px;
            height: 44px;
            border: none;
            border-radius: 35px;
            padding: 14px 29px 14px 29px;
            color: var(--white-color);
            background-color: var(--tangerine-color);
        }

        .title-product {
            position: relative;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .title-product span {
            font-size: 18px;
            font-weight: 500;
            color: var(--tangerine-color);
        }

        .title-product h1 {
            margin: 5px 0 3% 0;
            font-size: 36px;
            font-weight: 700;
            color: var(--black-color);
        }

        .footer {
            display: flex;
            margin: 10% 0;
            width: 100%;
            height: 100vh;
            position: relative;
            gap: 7.5%;
        }

        .footer .company-info {
            width: 400px;
        }

        .footer .company-info img {
            width: 181px;
            height: 108px;
        }

        .footer .company-info p {
            font-size: 18px;
            font-weight: 500;
            line-height: 21.94px;
            color: var(--gray-color);
        }

        .footer .social-buttons {
            display: flex;
            flex-direction: row;
            gap: 15px;
        }

        .footer .social-buttons .fa {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            width: 42px;
            height: 42px;
            font-size: 23px;
            text-decoration: none;
            background-color: var(--light-tangerine-color);
            color: var(--tangerine-color);
        }

        .footer .right-bar ul {
            padding: 0;
        }

        .footer .right-bar h4 {
            font-size: 26px;
            font-weight: 700;
            line-height: 31.69px;
        }

        .footer .right-bar p, a {
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            line-height: 21.94px;
            color: var(--gray-color);
        }


        .footer .right-bar {
            display: flex;
            gap: 75px;
        }
    </style>
    <title>Кулинарный сайт</title>
</head>
<body>
    <header class="header">
        <a class="logo" href="#"><img src="images/Logo.png" alt="Logo"></a>
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">Menu</a>
            <a href="#">Service</a>
            <a href="#">Shope</a>
            <a href="profile.php">Profile</a>
        </nav>
        <form action="" method="get">
            <div class="search">
                <button type="submit"><img src="images/Cart.png" alt=""></button>
                <input type="text" name="search" class="search-input" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; }?>" placeholder="Search">               
            </div>
        </form>
    </header>

    <section class="home">
        <div class="home-content">
            <h1>The Fastest</h1>
            <h1>Delivery</h1>
            <h1>In <span>Your City</span></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, <br> sed proin amet a vestibulum enim volutpat lacus. Volutpat arcu sit <br> sed tortor etiam volutpat ipsum.</p>
            <div class="btn-box">
                <a href="#">Order Now</a>
                <a href="#"><img src="images/Polygon.png" alt="">Order Process</a>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="title-product">
            <span>Блюда</span>
            <h1>Самые популярные блюда</h1>
        </div>

        <form action="" method="get">
            <select name="sort_cost" class="form-control">
                <option value="default" <?php if (isset($_GET['sort_cost']) && $_GET['sort_cost'] == "default") { echo "selected"; } ?>>По умолчанию</option>
                <option value="asc" <?php if (isset($_GET['sort_cost']) && $_GET['sort_cost'] == "asc") { echo "selected"; } ?>>По возрастанию</option>
                <option value="desc" <?php if (isset($_GET['sort_cost']) && $_GET['sort_cost'] == "desc") { echo "selected"; } ?>>По убыванию</option>
            </select>           
            <button type="submit">Сортировка</button>
        </form>

        <form action="" method="get">
            <select name="filter_category" class="form-control">
                <?php   
                    foreach ($categories as $category) {
                        ?>
                            <option value="<?=$category[0]?>" <?php if(isset($_GET['filter_category']) && $_GET['filter_category'] == $category[0]) { echo "selected"; }?>><?=$category[1]?></option>
                        <?php
                    }
                ?>
            </select>
            <button type="submit">Фильтрация</button>
        </form>
        
        <form action="add.php" method="post">
            <a class="buttonCulinaryBlog" type="submit" href="add.php">Добавить</a>
        </form>

        <div class="culinaryBlogsAll">           
            <?php
                if(isset($_GET['search'])) {
                    $filter = $_GET['search'];
                    $querySearch = mysqli_query($connection, "SELECT * FROM `culinary_blog` WHERE `BlogName` LIKE '$filter%';");
                    $itemsSearch = mysqli_fetch_all($querySearch);
                   
                    foreach ($itemsSearch as $item) {
                        ?>
                        <div class="culinaryBlogOne">
                            <img class="image" src="images/<?=$item[3]?>" alt="">
                            <div class="information">
                                <h4><?=$item[1]?></h4>
                                <p class="rating"><?=$item[4]?>.0</p>
                                <p>$<?=$item[5]?>.00</p>
                                <div class="buttons">  
                                    <a type="submit" class="buttonCulinaryBlog" href="delete.php?id=<?=$item[0]?>">Delete</a>    
                                    <a type="submit" class="buttonCulinaryBlog" href="update.php?id=<?=$item[0]?>" >Change</a>       
                                </div>  
                            </div>  
                        </div>
                        <?php
                    } 
                }    
                elseif (isset($_GET['sort_cost'])) {
                    $script = "";
                    if ($_GET['sort_cost'] == "asc") {
                        $script = "SELECT * FROM `culinary_blog` ORDER BY `Cost` ASC;";
                    } elseif ($_GET['sort_cost'] == "desc") {
                        $script = "SELECT * FROM `culinary_blog` ORDER BY `Cost` DESC;";
                    } elseif ($_GET['sort_cost'] == "default") {
                        $script = "SELECT * FROM `culinary_blog`;";
                    }  
                    $queryOrderBy = mysqli_query($connection, $script);
                    $sortingItems = mysqli_fetch_all($queryOrderBy);

                    foreach ($sortingItems as $item) {
                        ?>
                        <div class="culinaryBlogOne">
                            <img class="image" src="images/<?=$item[3]?>" alt="">
                            <div class="information">
                                <h4><?=$item[1]?></h4>
                                <p class="rating"><?=$item[4]?>.0</p>
                                <p>$<?=$item[5]?>.00</p>
                                <div class="buttons">  
                                    <a type="submit" class="buttonCulinaryBlog" href="delete.php?id=<?=$item[0]?>">Delete</a>    
                                    <a type="submit" class="buttonCulinaryBlog" href="update.php?id=<?=$item[0]?>">Change</a>                                                 
                                </div>  
                            </div>  
                        </div>
                    <?php
                    }
                }  
                elseif (isset($_GET['filter_category'])) {
                    $id = 0;
                    foreach ($categories as $category) {
                        if ($_GET['filter_category'] == $category[1]) {
                            $id = $category[0];
                        }                     
                    }
                    $queryFilter = mysqli_query($connection, "SELECT * FROM `culinary_blog` WHERE `IDCategory` = '$id';");
                    $filterItems = mysqli_fetch_all($queryFilter);
                    foreach ($filterItems as $item) {
                        ?>
                        <div class="culinaryBlogOne">
                            <img class="image" src="images/<?=$item[3]?>" alt="">
                            <div class="information">
                                <h4><?=$item[1]?></h4>
                                <p class="rating"><?=$item[4]?>.0</p>
                                <p>$<?=$item[5]?>.00</p>
                                <div class="buttons">  
                                    <a type="submit" class="buttonCulinaryBlog" href="delete.php?id=<?=$item[0]?>">Delete</a>    
                                    <a type="submit" class="buttonCulinaryBlog" href="update.php?id=<?=$item[0]?>" >Change</a>                                                 
                                </div>  
                            </div>  
                        </div>
                    <?php
                    }
                }
                elseif (isset($_GET['filter_category']) && isset($_GET['sort_cost'])) {
                    $script = "";
                    if ($_GET['sort_cost'] == "asc") {
                        $script = "ASC";
                    } elseif ($_GET['sort_cost'] == "desc") {
                        $script = "DESC";
                    } elseif ($_GET['sort_cost'] == "default") {
                        $script = "";
                    }
                    $id = 0;
                    foreach ($categories as $category) {
                        if ($_GET['filter_category'] == $category[1]) {
                            $id = $category[0];
                        }                     
                    }
                    $queryFilter = mysqli_query($connection, "SELECT * FROM `culinary_blog` WHERE `IDCategory` = '$id' AND ORDER BY 'Cost' $script;");
                    $filterItems = mysqli_fetch_all($queryFilter);
                    foreach ($filterItems as $item) {
                            ?>
                            <div class="culinaryBlogOne">
                                <img class="image" src="images/<?=$item[3]?>" alt="">
                                <div class="information">
                                    <h4><?=$item[1]?></h4>
                                    <p class="rating"><?=$item[4]?>.0</p>
                                    <p>$<?=$item[5]?>.00</p>
                                    <div class="buttons">  
                                        <a type="submit" class="buttonCulinaryBlog" href="delete.php?id=<?=$item[0]?>">Delete</a>    
                                        <a type="submit" class="buttonCulinaryBlog" href="update.php?id=<?=$item[0]?>">Change</a>                                                 
                                    </div>  
                                </div>  
                            </div>
                        <?php
                    }
                }
                else {                              
                    foreach ($items as $item) {
                        ?>
                        <div class="culinaryBlogOne">
                            <img class="image" src="images/<?=$item[3]?>" alt="">
                            <div class="information">
                                <h4><?=$item[1]?></h4>
                                <p class="rating"><?=$item[4]?>.0</p>
                                <p>$<?=$item[5]?>.00</p>
                                <div class="buttons">  
                                    <a type="submit" class="buttonCulinaryBlog" href="delete.php?id=<?=$item[0]?>">Delete</a>    
                                    <a type="submit" class="buttonCulinaryBlog" href="update.php?id=<?=$item[0]?>">Change</a>       
                                </div>  
                            </div>  
                        </div>
                        <?php
                    }                       
                }
            ?>
        </div> 
 
        <div class="btn-product">
            <a href="#">See More Product</a>
        </div>
    </section>

    <section class="services">
        <div class="title-services">
            <span>Сервисы</span>
            <h1>Зачем выбирать нашу любимую еду</h1>
        </div>
        <div class="container">
            <span><img src="images/Food1.png" alt=""></span>
            <h1>Качественная еда</h1>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasur and prasising pain was bron.</p>
        </div>
        <div class="container">
            <span><img src="images/Food2.png" alt=""></span>
            <h1>Здоровая еда еда</h1>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasur and prasising pain was bron.</p>
        </div>
        <div class="container">
            <span><img src="images/Delivery.png" alt=""></span>
            <h1>Быстрая доставка</h1>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasur and prasising pain was bron.</p>
        </div>
    </section>

    <footer class="footer">
        <div class="company-info">
            <img src="images/Logo.png" alt="Logo">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo libero viverra dapibus odio sit malesuada in quis. Arcu tristique elementum viverra integer id.</p>
            <div class="social-buttons">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </div>

        <div class="right-bar">
            <div class="opening-restaurant">
                <h4>Opening Restaurant</h4>
                <ul>
                    <li><p>Sat-Wet: 09:00am-10:00PM</p></li>
                    <li><p>Thursdayt: 09:00am-11:00PM</p></li>
                    <li><p>Friday: 09:00am-8:00PM</p></li>
                </ul>
            </div>
            <div class="user-link">
                <h4>User Link</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Order Delivery</a></li>
                    <li><a href="#">Payment & Tex</a></li>
                    <li><a href="#">Terms of Services</a></li>
                </ul>
            </div>
            <div class="contact-us">
                <h4>Contact Us</h4>
                <ul>
                    <li><p>1234 Country Club Ave</p></li>
                    <li><p>NC 123456, London, UK</p></li>
                    <li><p>+0123 456 7891</p></li>
                </ul>
                <div class="input-email">
                    <input type="email" placeholder="Enter your email">
                    <button><img src="images/Vector.png" alt=""></button>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>