<?php
$data_fields = get_fields();
$title = $data_fields['faq_title'];
$subtitle = $data_fields['faq_subtitle'];
$faq_list = $data_fields['faq_list'];

if ($data_fields) : ?>
<section id="faq-block" class="acf-block-faq">
	<div class="container">
		<div class="acf-block-faq__row">
			<div class="acf-block-faq__col">
				<div class="acf-block-faq__header">
					<b class="acf-block-faq__subtitle">
						<?php echo $subtitle; ?>
					</b>
					<h2 class="acf-block-faq__title">
						<?php echo $title; ?>
					</h2>
				</div>
			</div>
			<div class="acf-block-faq__col">
				<ul class="acf-block-faq__list">
					<?php
					foreach ($faq_list as $item) : ?>
						<li class="acf-block-faq__item">
							<div class="acf-block-faq__item-question" aria-label="Open answer">
								<?php echo $item['question']; ?>
                                <i class="acf-block-faq__item-question-icon">
                                    <?php blueglass_the_theme_svg('add'); ?>
                                </i>
							</div>
							<div class="acf-block-faq__item-answer">
								<?php echo $item['answer']; ?>
							</div>
						</li>
					<?php
					endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- /.acf-block-faq -->
<?php
endif; ?>