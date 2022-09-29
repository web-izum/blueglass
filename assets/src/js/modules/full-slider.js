import Swiper, {Autoplay, Navigation, Pagination, EffectCreative, Lazy} from "swiper";
Swiper.use([Pagination, Navigation, Autoplay, EffectCreative, Lazy]);

const fullSlider = (swiperBlock) => {

    let swiper = new Swiper(swiperBlock, {
        lazy: true,
        slidesPerView: 1,
        effect: "creative",
        creativeEffect: {
            prev: {
                shadow: true,
                translate: ["-20%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
            },
        },
        navigation: {
            nextEl: swiperBlock + "__nav-button_next",
            prevEl: swiperBlock + "__nav-button_prev",
        },
        pagination: {
            el: swiperBlock + '__pagination',
            type: 'custom',
            renderCustom: function (swiper, current, total) {
                if (total > 1) {
                    let paginationHTML = '';
                    let paginationEl = swiper.params.pagination.el.replace('.', '');

                    for (let i = 1; i < (total + 1); i++) {
                        let currentClass = (i === current) ? paginationEl + '-progress-item_current' : '';
                        paginationHTML += '<span class="' + paginationEl + '-progress-item ' + ' ' + currentClass + '"></span>';
                    }

                    current < 10 ? current = '0' + current : current;
                    total < 10 ? total = '0' + total : total;

                    return '<span class="' + paginationEl + '-current">' + current + '</span>' +
                           '<span class="' + paginationEl + '-progress">' + paginationHTML + '</span>' +
                           '<span class="' + paginationEl + '-total">' + total + '</span>';
                }
                return '';
            }
        }
    })
}

export default fullSlider;