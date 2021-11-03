<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SWD
 */

?>

<div class="hidden-cart">
    <div class="hidden-cart__cart">
        <div class="hidden-cart__spinner">
            <img src="<?php echo get_template_directory_uri() . '/img/ajax-loader.gif' ?>" alt="spinner">
        </div>
    </div>
    <div class="hidden-cart__overlay toggle-cart-popup"></div>
    <button class="toggle-cart-popup close-cart-popup"><img
                src="<?php echo get_template_directory_uri() . '/img/close_white.svg' ?>" alt="close popup"/></button>
</div>

<footer id="colophon" class="site-footer">
    <section class="sec">
        <div class="site-info box">
            <div class="site-info__item site-info__logo-wrapper">
                <img src="" alt="logo">
                <?php get_template_part('component-phones');?>
            </div>
            <div class="site-info__item">
                <a class="top-header__link" href="">office@dveriswd.com</a>
                <?php get_template_part('component-socials');?>
            </div>
            <div class="site-info__item">
                <button>Стать дилером</button>
            </div>
            <div class="site-info__item"></div>
            <div class="site-info__item">
                <div class="site-info__title">Юридическая информация</div>
                <div class="site-info__text">
                    Общество с ограниченной ответственностью "СВД"<br/>
                    ИНН: 7814786234 КПП: 781401001<br/>
                    ОКПО: 47156241 БИК: 044525411<br/>
                    Рассчетный счет: 40702810600000000000<br/>
                    Фактический адрес	105066, Москва, ул. Ольховская, д.4, стр.2<br/>
                    e-mail:	сайт@домен.ru<br/>
                </div>
            </div>
            <div class="site-info__item">
                <div class="site-info__title">Компаниям</div>
                <div class="site-info__text"></div>
            </div>
            <div class="site-info__item">
                <div class="site-info__title">Розничным покупателям</div>
                <div class="site-info__text"></div>
            </div>
            <div class="site-info__item">
                <div class="site-info__title">Контакты</div>
                <div class="site-info__text"></div>
            </div>
        </div><!-- .site-info -->
        <div class="copyright box">
            <div class="copyright__item"><a href="/privacy-policy/">Политика конфиденциальности</a></div>
            <div class="copyright__item">© Copyright by <a href="https://up-lab.ru/">Up Marketing Lab</a> for SteelWoodDoors, 2021</div>
            <div class="copyright__item">Все права защищены</div>
            <div class="copyright__item"></div>
        </div>
    </section>
</footer><!-- #colophon -->
</div><!-- #page -->

<script>
    jQuery('body').on('change', '.qty', function () { // поле с количеством имеет класс .qty
        setTimeout(function () {
            jQuery('[name="update_cart"]').trigger('click');
        }, 600);
    });

    jQuery('body').on('click', '.quantity-button.inc, .quantity-button.dec', function () { // элементы инкремента/декремента
        setTimeout(function () {
            jQuery('[name="update_cart"]').trigger('click');
        }, 600);
    });
</script>
<script>

    /*Slick slider
    ---------------------------------*/
    jQuery(document).ready(function () {
        jQuery('.front-page-slider').slick({
            lazyLoad: 'progressive',
            adaptiveHeight: true
        });
    });


    /*Read more
    ---------------------------------*/
    jQuery(document).on('click', '.read-more__toggle', function (e) {
        e.target.closest('.with-read-more').classList.toggle('active');
        if (e.target.closest('.with-read-more').classList.contains('active')) {
            jQuery(this).html('Скрыть');
        } else {
            jQuery(this).html('Читать далее...');
        }
    })


    /*Slow scrolling
    ---------------------------------*/
    jQuery("a.scroll-to").on("click", function (e) {
        e.preventDefault();
        var anchor = jQuery(this).attr('href');
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor).offset().top - 0
        }, 600);
    });


    /*WC add to cart
    ---------------------------------*/
    // jQuery(document).on('click', '.add_to_cart_button', function(e){
    //     e.preventDefault();
    //     jQuery.ajax(
    //         {	method: 'Post',
    //             url: ajaxUrl.url,
    //             data: {
    //                 action: 'ql_woocommerce_ajax_add_to_cart',
    //                 product_id: e.target.dataset.product_id,
    //             }
    //         },
    //     ).then(
    //         (res) => {
    //             console.log(res)
    //         }
    //     )
    //     console.log(e.target.dataset.product_id)
    // })
    // jQuery( document.body ).on( 'added_to_cart', function(e){
    //     console.log('EVENT: added_to_cart');
    // });

    jQuery('body').on('added_to_cart', function () {
        jQuery('.hidden-cart').addClass('active');
        cartRequest().then(
            (res) => {
                jQuery('.hidden-cart__cart').html(res);
            }
        )
    });
    jQuery(document).on('click', '.toggle-cart-popup', function (e) {
        jQuery('.hidden-cart').toggleClass('active');
    })
    function cartRequest () {
        return jQuery.ajax(
            {
                method: 'Post',
                url: ajaxUrl.url,
                data: {
                    action: 'return_cart',
                }
            },
        )
    }

</script>

<?php wp_footer(); ?>

</body>
</html>
