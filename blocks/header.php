<header class="container"> 
            <a class="logo" href="index.php">YatsukStore</a>
            <nav class= "header-info"> 
                <ul>
                    <li> <a href="index.php">Главная</a></li>
                    <li> <a href="catalog.php">Каталог</a></li>
                    <?php if(isset($_SESSION['user']['id'])): ?>

                        <?php if($userRole['role']): ?>
                            <li><a href="adminprofile.php">Личный кабинет</a></li>
                        <?php else: ?>
                            <li><a href="userprofile.php">Личный кабинет</a></li>
                        <?php endif; ?>

                    <?php else: ?>
                    <li><a href="auth.php">Войти</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            
            <nav class="header_nav">
                <ul class="header_nav_list">
                    <li> <a href="index.php">Главная</a></li>
                    <li> <a href="catalog.php">Каталог</a></li>
                    <?php if(isset($_SESSION['user']['id'])): ?>

                        <?php if($userRole['role']): ?>
                            <li><a href="adminprofile.php">Личный кабинет</a></li>
                        <?php else: ?>
                            <li><a href="userprofile.php">Личный кабинет</a></li>
                        <?php endif; ?>

                    <?php else: ?>
                    <li><a href="auth.php">Войти</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <button class="burger">
                <div class="burger__line"></div>
                <div class="burger__line"></div>
                <div class="burger__line"></div>
            </button>
</header>