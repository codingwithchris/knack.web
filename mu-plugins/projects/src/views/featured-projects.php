<?php
namespace Knack\Projects;
use Samrap\Acf\Acf;
use function Fuse\Controllers\render as render;

// start the loop
while ( $projects->have_posts() ) {

	// Tap into the projects post
	$projects->the_post();

	// Set upo Variables
	$image = Acf::field( 'featured_image' )->get();
	$description = Acf::field( 'short_description' )->get();
	$terms = wp_get_post_terms( get_the_id(), 'industry', array( 'fields' => 'names' ) );
	$services = wp_get_post_terms( get_the_id(), 'type', array( 'fields' => 'names' ) );
	$formatted_terms = implode( $terms, ', ' );
	$formatted_services = implode( $services, ', ' );
	$client_name = Acf::field( 'client_name' )->get();

	?>

	<div class="c-featured-project" data-anim-in="false">

		<div class="c-featured-project__background">
			<?php render( 'fragments/components/_c-progressive', [ 'media' => $image ] ); ?>
		</div>

		<div class="c-featured-project__wrapper">

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

				<div class="c-featured-project__action">
					<a class="c-btn c-btn--tertiary c-btn--tertiary--dark" href="<?= esc_url( get_the_permalink() ) ?>">
						<span class="c-btn__text"><?= esc_html( 'View Project' ); ?></span>
						<span class="c-btn__icon">
            				<svg aria-hidden="true" data-prefix="fal" data-icon="long-arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>
        				</span>
					</a>
				</div>

			</div>

		</div>

	</div>

<?php }
