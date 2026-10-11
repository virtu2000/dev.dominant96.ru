document.addEventListener('DOMContentLoaded', function() {
    const openPopupButtons = document.querySelectorAll('.open-popup-btn');
    const closePopupButtons = document.querySelectorAll('.close-popup-btn');
    const popups = document.querySelectorAll('.popup');

    // Функция для открытия popup
    function openPopup(popupId) {
        const popup = document.getElementById(popupId);
        if (popup) {
            popup.classList.add('active');
            console.log('open');
            // Запрещаем прокрутку body при открытом popup
            //document.body.style.overflow = 'hidden';
        }
    }

    // Функция для закрытия popup
    function closePopup(popup) {
        popup.classList.remove('active');
        console.log('close');
        // Разрешаем прокрутку body
        document.body.style.overflow = '';
    }

    // Обработчики для кнопок открытия
    openPopupButtons.forEach(button => {
        button.addEventListener('click', function() {
            const popupId = this.dataset.popupId;
            openPopup(popupId);
        });
    });

    // Обработчики для кнопок закрытия
    closePopupButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Получаем родительский элемент (popup)
            const popup = this.closest('.popup');
            if (popup) {
                closePopup(popup);
            }
        });
    });

    // Закрытие по клику вне popup
    popups.forEach(popup => {
        popup.addEventListener('click', function(event) {
            if (event.target === this) { // Если клик был именно на backdrop
                closePopup(this);
            }
        });
    });


    // Закрытие по нажатию клавиши Esc
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            popups.forEach(popup => {
                if (popup.classList.contains('active')) {
                    closePopup(popup);
                }
            });
        }
    });
});
jQuery(document).ready(function ($){
    jQuery('.mobile-menu-toggler').click(function(){
        jQuery(this).closest('header').toggleClass('opened').find('.mobile-menu').slideToggle('fast');
    });
    jQuery('.mobile-services-listing-category-opener').click(function(){
        jQuery(this).closest('.mobile-services-listing-category').toggleClass('opened').find('.mobile-services-listing-posts').slideToggle('fast');
    });
    $('.advantages-carousel, .reviews-carousel').owlCarousel({
        margin:10,
        nav:true,
        navText : ['<span class="btn-arr-left"></span>','<span class="btn-arr-right"></span>'],
        autoWidth: false,
        dots: false,
        navContainerClass: 'owl-nav',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            }
        }
    });
    jQuery('.tab-title').click(function(){
        if(!jQuery(this).hasClass('active')){
            jQuery('.reviews-tabs .active').removeClass('active');
            jQuery(this).addClass('active');
            jQuery(this).closest('.reviews-tabs').find('.tab-body[data-tab="' + jQuery(this).data('tab') + '"]').addClass('active');
        }

    });
    jQuery('.partners-show').click(function(){
            jQuery(this).closest('.partners').find('.partners-items').toggleClass('opened');
    });
    jQuery('.search-toggle, .mobile-search-toggler').click(function(){
        jQuery(this).closest('header').toggleClass('search-opened').find('.header-search').slideToggle('fast');
    });
    jQuery('.accordion-title').click(function(){
        jQuery(this).closest('.accordion-item').toggleClass('opened').find('.accordion-body').slideToggle('fast');
    });
    document.addEventListener( 'wpcf7submit', function( event ) {
    // document.addEventListener( 'wpcf7mailsent', function( event ) {
        jQuery('.wpcf7#' + event.detail.unitTag).closest('.popup-form').find('.popup-form-success').show();
      
        document.getElementById(event.detail.unitTag).querySelector('form').reset();

    }, false );
    //if($('.blog-item').length > 3){
        $('.blog-items').owlCarousel({
            margin:10,
            nav:true,
            navText : ['<span class="btn-arr-left"></span>','<span class="btn-arr-right"></span>'],
            autoWidth: false,
            dots: false,
            navContainerClass: 'owl-nav',
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                }
            }
        });
    //}

});
