<?php
$data_fields = get_fields();
$img_src = $data_fields['proposal_image']['sizes']['proposal-image'];
$img_alt = $data_fields['proposal_image']['alt'];
$img_title = $data_fields['proposal_image']['title'];
$img_size = [
    'width' => $data_fields['proposal_image']['sizes']['proposal-image-width'],
    'height' => $data_fields['proposal_image']['sizes']['proposal-image-height']
];
$title = $data_fields['proposal_header']['title'];
$subtitle = $data_fields['proposal_header']['subtitle'];
$information_list = $data_fields['proposal_information'];

if ($data_fields) : ?>
<section id="proposal-block" class="acf-block-proposal">
	<div class="container">
        <div class="acf-block-proposal__row">
            <div class="acf-block-proposal__col">
                <div class="acf-block-proposal__header">
                    <b class="acf-block-proposal__subtitle">
				        <?php echo $subtitle; ?>
                    </b>
                    <h2 class="acf-block-proposal__title">
				        <?php echo $title; ?>
                    </h2>
                </div>
                <ul class="acf-block-proposal__information-list">
			        <?php
			        $count_item = count($information_list);
			        $i = 0;
			        foreach ($information_list as $item) :
				        $i++;
				        $class_penultimate = $i == ($count_item - 1) ? 'acf-block-proposal__information-item_penultimate-child' : '';
				        ?>
                        <li class="acf-block-proposal__information-item <?php echo $class_penultimate ?>">
						<span class="acf-block-proposal__information-item-top">
                            <?php echo $item['top'] ?>
						</span>
                            <span class="acf-block-proposal__information-item-bottom">
                            <?php echo $item['bottom'] ?>
						</span>
                        </li>
			        <?php
			        endforeach; ?>
                </ul>
            </div>
            <div class="acf-block-proposal__col">
                <figure class="acf-block-proposal__img">
                    <img src="<?php echo $img_src; ?>"
                         alt="<?php echo $img_alt; ?>"
                         title="<?php echo $img_title; ?>"
                         width="<?php echo $img_size['width'];?>"
                         height="<?php echo $img_size['height'];?>">
                </figure>
            </div>
        </div>
	</div>
</section>
<!-- /.acf-block-proposal -->
<?php
endif; ?>