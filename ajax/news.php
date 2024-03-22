<?php
header('Content-Type: application/json');

ob_start();?>
    <a
        class="index-news__item" href="#"><span class="index-news__img"><img
                src="./upload/images/content/index-news/2.jpg" alt="lorem"></span><span
            class="index-news__wrap"><span
                class="index-news__date">29 января 2024</span><span
                class="index-news__desc">Инфляция в России в январе 2024 года и прогноз ключевой ставки по месяцам</span></span></a><a
    class="index-news__item" href="#"><span class="index-news__img"><img
            src="./upload/images/content/index-news/3.jpg" alt="lorem"></span><span
        class="index-news__wrap"><span
            class="index-news__date">29 января 2024</span><span
            class="index-news__desc">Тренд или новая реальность? Рынок криптовалют</span></span></a><a
    class="index-news__item" href="#"><span class="index-news__img"><img
            src="./upload/images/content/index-news/4.jpg" alt="lorem"></span><span
        class="index-news__wrap"><span
            class="index-news__date">29 января 2024</span><span
            class="index-news__desc">Курс юаня к рублю и к доллару: что влияло на котировки в январе 2024 года</span></span></a><a
    class="index-news__item" href="#"><span class="index-news__img"><img
            src="./upload/images/content/index-news/2.jpg" alt="lorem"></span><span
        class="index-news__wrap"><span
            class="index-news__date">29 января 2024</span><span
            class="index-news__desc">Инфляция в России в январе 2024 года и прогноз ключевой ставки по месяцам</span></span></a><a
    class="index-news__item" href="#"><span class="index-news__img"><img
            src="./upload/images/content/index-news/3.jpg" alt="lorem"></span><span
        class="index-news__wrap"><span
            class="index-news__date">29 января 2024</span><span
            class="index-news__desc">Тренд или новая реальность? Рынок криптовалют</span></span></a><a
    class="index-news__item" href="#"><span class="index-news__img"><img
            src="./upload/images/content/index-news/4.jpg" alt="lorem"></span><span
        class="index-news__wrap"><span
            class="index-news__date">29 января 2024</span><span
            class="index-news__desc">Курс юаня к рублю и к доллару: что влияло на котировки в январе 2024 года</span></span></a>
<? $html = ob_get_clean();

echo json_encode(array(
    'html'=> $html,
    'status' => true
));
exit();