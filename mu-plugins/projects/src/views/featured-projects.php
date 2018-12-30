<?php
namespace Knack\Projects;
use Samrap\Acf\Acf;

// start the loop
while ( $projects->have_posts() ) {

	// Tap into the projects post
	$projects->the_post();

	// Set upo Variables
	$image = Acf::field( 'featured_image_desktop' )->get();
	$description = Acf::field( 'short_description' )->get();
	$terms = wp_get_post_terms( get_the_id(), 'industry', array( 'fields' => 'names' ) );
	$services = wp_get_post_terms( get_the_id(), 'type', array( 'fields' => 'names' ) );
	$formatted_terms = implode( $terms, ', ' );
	$formatted_services = implode( $services, ', ' );
	$client_name = Acf::field( 'client_name' )->get();

	?>

	<div class="c-featured-project" style="background-image:url( <?= esc_url( $image['url'] ); ?> )" data-anim-in="false">

		<div class="c-featured-project__wrapper">

			<img class="c-featured-project--mobile-featured" src="<?= esc_url( $image['url'] ); ?>" alt="<?= esc_html( $image['alt'] ); ?>" width="<?= esc_attr( $image['width'] ); ?>" height="<?= esc_attr( $image['height'] ); ?>">

			<div class="c-featured-project__card">

				<p class="c-featured-project__services f-b--xs">
					<?= esc_html( $formatted_services ); ?>
				</p>

				<p class="c-featured-project__title f-hw--b f-hs--l">
					<?= esc_html( get_the_title() ); ?>
				</p>

				<p class="c-featured-project__description f-b--s">
					<?= esc_html( $description ); ?>
				</p>

				<div class="c-featured-project__meta">

					<p class="c-featured-project__client">
						<span class="c-featured-project__pre-meta">
							<?= esc_html( 'Client: ' ); ?>
						</span>
						<?= esc_html( $client_name ); ?>
					</p>

					<p class="c-featured-project__industry f-b--xs">
						<span class="c-featured-project__pre-meta">
							<?= esc_html( 'Industry: ' ); ?>
						</span>
						<?= esc_html( $formatted_terms ); ?>
					</p>

				</div>

				<a class="c-featured-project__action c-btn c-btn--secondary c-btn--secondary--dark" href="<?= esc_url( get_the_permalink() ) ?>">
					<span class="c-btn__text"><?= esc_html( 'View Project' ); ?></span>
				</a>

			</div>

		</div>

		<div class="c-featured-project__overlay"></div>

	</div>

<?php }