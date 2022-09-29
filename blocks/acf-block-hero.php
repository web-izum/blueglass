<?php
$data_fields = get_fields();

$slide_list = $data_fields['slides'];

if ($data_fields) : ?>

<section class="acf-block-hero swiper">
    <div class="acf-block-hero__wrapper swiper-wrapper">
        <?php
        foreach ($slide_list as $slide) :

            $image_id = $slide['image']['ID'] ?? '';
            $title = $slide['title'] ?? '';
            $subtitle = $slide['subtitle'] ?? '';
            $btn = $slide['button']; // :array ['text' => , 'link' => ]
            $information = $slide['information']; // array ?>

            <article class="acf-block-hero__slide swiper-slide">
                <div class="container">
                    <div class="acf-block-hero__content">
                        <h2 class="acf-block-hero__title">
                            <?php echo $title; ?>
                        </h2>
                        <p class="acf-block-hero__subtitle">
                            <?php echo $subtitle; ?>
                        </p>

                        <?php
                        if ($btn['text']) : ?>
                            <a class="acf-block-hero__btn" href="<?php echo $btn['link'] ?>">
                                <?php echo $btn['text']; ?>
                            </a>
                        <?php
                        else :
                            get_template_part( 'template-parts/elements/nav', 'widget', array( 'class_name' => 'acf-block-hero__nav-widget black' ) );
                        endif; ?>

                        <?php
                        if ($information) : ?>
                            <ul class="acf-block-hero__inf">
                                <?php
                                foreach ($information as $item) : ?>
                                    <li class="acf-block-hero__inf-item">
                                        <i><?php blueglass_the_theme_svg('checkmark'); ?></i>
                                        <?php echo $item['text']; ?>
                                    </li>
                                <?php
                                endforeach; ?>
                            </ul>
                        <?php
                        endif; ?>
                    </div>
                </div>
                <?php
                if ($image_id) : ?>
                <img class="acf-block-hero__bg swiper-lazy"
                     src="<?php echo wp_get_attachment_image_url($image_id, 'slider-xxl' ); ?>"
                     alt="<?php echo $slide['image']['alt']; ?>"
                     title="<?php echo $slide['image']['alt']; ?>"
                     sizes="100vw"
                     srcset=" <?php echo wp_get_attachment_image_url( $image_id, 'slider-mob' ); ?> 460w,
                              <?php echo wp_get_attachment_image_url( $image_id, 'slider-sm' ); ?>  576w,
                              <?php echo wp_get_attachment_image_url( $image_id, 'slider-lg' ); ?>  992w,
                              <?php echo wp_get_attachment_image_url( $image_id, 'slider-xl' ); ?>  1600w,
                              <?php echo wp_get_attachment_image_url( $image_id, 'slider-xxl' ); ?> 1920w">
                <?php
                endif;?>
            </article>
        <?php
        endforeach; ?>
    </div>

    <div class="container acf-block-hero__container">
        <div class="acf-block-hero__slider-nav">
            <div class="acf-block-hero__pagination"></div>
            <div class="acf-block-hero__nav-buttons">
                <div class="acf-block-hero__nav-button acf-block-hero__nav-button_prev">
				    <?php blueglass_the_theme_svg('prev'); ?>
                </div>
                <div class="acf-block-hero__nav-button acf-block-hero__nav-button_next">
				    <?php blueglass_the_theme_svg( 'next' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.acf-block-hero -->
<?php
endif; ?>