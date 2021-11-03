// const filterContent = jQuery('.store-products-container');
// const loadProducts =	function(e){
//     filterContent.animate({opacity: 0.5}, 300);
//     e.preventDefault();
//     let selectFilter = jQuery('.store-filter-select');
//     let slug = jQuery(this).data('slug');
//     let order = selectFilter.find('option:selected').data('order');
//     console.log(slug);
//     selectFilter.attr('data-slug', slug);
//     slug = selectFilter.attr('data-slug')
//
//     jQuery('.store-product-filter .tabs-nav__item').removeClass('ui-tabs-active');
//     jQuery('.tabs-nav__item-' + slug).addClass('ui-tabs-active');
//
//     requestStoreProducts(slug, order).then(
//         response => filterContent.html(response).animate({opacity: 1}, 300)
//     );
// }
//
// jQuery('.store-filter-select').on('change', function (e) {
//     var optionSelected = jQuery("option:selected", this);
//     var valueSelected = this.value;
//     loadProducts(e);
// });
// jQuery('.store-product-filter .tabs-nav__item').click(
//     loadProducts
// );
//
// function requestStoreProducts(slug, order='date'){
//     return (jQuery.ajax(
//         {	method: 'Post',
//             url: myAjaxUrl,
//             data: {
//                 action: 'refresh_store_filter',
//                 slug,
//                 order,
//             }
//         },
//     ));
// }



/*Search filter*/
const body = jQuery('body');
const input = jQuery('.hidden-search__input');

jQuery('.search-toggle').click(function () {
    jQuery('.hidden-search').toggleClass('active');
    if(body.hasClass('with-search')){
        body.removeClass('with-search');
        input.val('');
    }else{
        input.focus();
    }
});

jQuery( document ).on( "input", ".hidden-search__input", (e) => {
    searchQuery(e.target.value);

});
function searchQuery(query){
    const resultBlock = jQuery('.site-header__search-result');
    jQuery.ajax(
        {	method: 'Post',
            url: ajaxUrl.url,
            data: {
                action: 'refresh_products_filter',
                search_string: query,
            }
        },
    ).then(
        (res) => {
            res ? resultBlock.html(res) : resultBlock.html('Не найдено');
            if(!body.hasClass('with-search')){
                body.addClass('with-search');
            }
        }
    )
}

