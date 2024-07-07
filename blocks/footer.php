<footer class="footer">
        <section class="ft-main">
            <div class="ft-main-item">
                <div class="ft-logo"> <h3>YatsukStore</h3></div>
                <p class="ft-text">&copy; Все права защищены</p>
            </div>

            <div class="ft-main-item">
                <h3 class="ft-title"> Навигация </h3>
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
            </div>
        </section>

    </footer>