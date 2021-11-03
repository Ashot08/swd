<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SWD
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="front-page-slider">
            <div><img data-lazy="<?php  echo get_template_directory_uri() . '/img/front-page-slider/banner-1.png' ?>" src="<?php  echo get_template_directory_uri() . '/img/front-page-slider/banner-1.png' ?>" alt="slider slide" /></div>
            <div><img data-lazy="<?php  echo get_template_directory_uri() . '/img/front-page-slider/banner-2.png' ?>" src="" alt="slider slide" /></div>
            <div><img data-lazy="<?php  echo get_template_directory_uri() . '/img/front-page-slider/banner-3.png' ?>" src="" alt="slider slide" /></div>
            <div><img data-lazy="<?php  echo get_template_directory_uri() . '/img/front-page-slider/banner-4.png' ?>" src="" alt="slider slide" /></div>
        </div>
        <section id="about" class="sec">
            <div class="box">
                <h1>Компания SteelWoodDoors - производитель и оптовый поставщик дверей</h1>
                <div class="with-read-more">
                    <p>Компания SteelWoodDoors работает на рынке оптовых поставок дверей с 2012 года. За это время клиентами Компании стали крупнейшие застройщики Северо-Западного Федерального округа, Москвы и Московской области. Счастливые клиенты SteelWoodDoors: ПАО “Группа ЛСР”, ООО “ЦДС”, ООО "Главстрой-СПб специализированный застройщик", ООО “КВС Девелопмент” и многие другие.</p>
                    <p>Сотни тысяч дверей производства SteelWoodDoors успешно установлены в современных жилых комплексах и эксплуатируются, ежедневно доказывая свое высочайшее качество.</p>
                    <p>Сильная сторона Компании SteelWoodDoors и весомое отличие от конкурентов на рынке – это ГИБКОСТЬ и КЛИЕНТООРИЕНТИРОВАННОСТЬ. Мы всегда открыты к обсуждению условий оплаты, возможности отсрочки или рассрочки, сроков доставки и предлагаем Вам до пяти вариантов оплаты, чтобы в максимально сжатые сроки обеспечить Ваши строительные объекты дверями высочайшего качества.</p>
                    <p>Помимо производства дверей Компания SteelWoodDoors оказывает широкий спектр сопутствующих услуг: доставка, подъем на этаж, установка дверей любой сложности, а также демонтаж и утилизация старых дверных блоков.</p>
                    <p>Производство Компании SteelWoodDoors находится в п. Вартемяги, в часе езды от Петербурга. Мощное современное оборудование, большие площади и складские помещения позволяют выполнять заказы любой степени сложности точно в срок и по самым выгодным ценам.</p>
                    <p>Вся продукция Компании SteelWoodDoors имеет соответствующие сертификаты качества и паспорта. По результатам выходящего контроля технические характеристики дверей от SteelWoodDoors ПРЕВЫШАЮТ требования ГОСТ и ТУ на 20%.</p>
                    <a class="scroll-to" href="#about">
                        <button class="read-more__toggle">Читать далее...</button>
                    </a>
                </div>
            </div>
        </section>        <section id="about" class="sec">
            <div class="box what-we-do">
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/1_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Мощное производство дверей в Ленинградской области</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/4_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Современное оборудование, станки нового поколения</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/2_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Вся продукция имеет паспорта и сертификаты, соответствует ГОСТам</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/8_1_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Любые нестандартные запросы - "конек" компании SteelWoodDoors</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/3_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Гарантия максимально гибких условий поставки и самых выгодных цен</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/5_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Двери производства SteelWoodDoors выбирают крупнейшие застройщики России</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/6_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Компания SteelWoodDoors продоставляет весь спектр сопутствующих услуг</span>
                </div>
                <div class="what-we-do__item">
                    <img class="what-we-do__image" src="<?php  echo get_template_directory_uri() . '/img/front-page/7_icon.png' ?>" alt="image">
                    <span class="what-we-do__title">Команда компании SteelWoodDoors - высококлассные профессионалы</span>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();
