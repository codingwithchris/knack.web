<?php
use function Fuse\Controllers\render as render;
use Fuse\Controllers;
use Samrap\Acf\Acf;
?>

<section id="studio-rental-gallery" class="f-section p-section--studio-rental__gallery">

	<?= render( 'fragments/components/_c-gallery--photo', $data['photos'] ); ?>

</section>
