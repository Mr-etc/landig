<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/index.css">
    <script src="/assets/scripts/index.js"></script>
    <script src="/assets/scripts/validation.js"></script>
    <script src="/assets/scripts/scroll.js"></script>
</head>

<body>
    <header>
        <div class="header__container">
            <span class="logo white">LandingLogo</span>
            <ul class="listMenu">
                <li class="listMenu__item white"><a href="#main-section">Main</a></li>
                <li class="listMenu__item white"><a href="#about-section">About</a></li>
                <li class="listMenu__item white"><a href="#footer">Footer</a></li>
            </ul>
        </div>
    </header>
    <main>
        <section  class="main-section">
            <div id="main-section" class="main-section__container">
                <div class="mainInformation">
                    <div class="mainInformation_content">
                        <span class="mainInformation__header white">Study with us</span>
                        <span class="mainInformation__desc white">Moscow teachers develop an individual training program for each student, which depends on the knowledge and progress of the child in all basic subjects, as well as on personal preferences in sciences and abilities.</span>
                        <button class="button">Open form</button>
                    </div>
                    <form action="#" class="feedbackForm">
                        <span class="title">Write to us</span>
                        <div class="fields">
                            <input check="baseField" event="keyup" type="text" name="1" id="name" placeholder="Имя" value="name">
                            <input check="phone" event="keyup" type="text" name="2" id="phone" placeholder="Телефон" value="12313123123">
                            <input check="email" event="keyup" type="text" name="3" id="email" placeholder="Email" value="qwe@qwe.qwe">
                            <select check="select" event="change" name="4" id="gift">
                                <option value="22">Выберите подарок</option>
                                <?php
                                    require_once 'api/db.php';
                                    $db = new DB();
                                    $data = $db->query('SELECT * FROM `gifts`', 'assoc');
                                    foreach ($data as $item):
                                ?>
                                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="checkbox">
                                <label for="rules">Я согласен с политикой обработки персональных данных</label>
                                <input type="checkbox" name="5" id="rules">
                            </div>
                            <input onclick="feedbackFormClick()" class="button white" type="button" value="Submit">
                        </div>
                    </form>
                </div>

            </div>
        </section>
        <section id="about-section" class="about-section">
            <div class="about-section__container">
                <h2 class="about-section__header">About</h2>
                <div class="about-section__container col2">
                    <div class="aboutPhone"><img src="https://p1.hiclipart.com/preview/614/696/873/iphone-8-png-clipart.jpg" alt="aboutPhone"></div>
                    <div class="about-section__decription">
                        <span class="about-section__header blockHeader">Текст-рыба</span>
                        <p>С другой стороны укрепление и развитие структуры влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям. Равным образом начало повседневной работы по формированию позиции позволяет оценить значение модели развития. Идейные соображения высшего порядка, а также реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании системы обучения кадров, соответствует насущным потребностям. С другой стороны консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании систем массового участия.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer id="footer">
        <div class="footer__container">footer</div>
    </footer>
</body>

</html>