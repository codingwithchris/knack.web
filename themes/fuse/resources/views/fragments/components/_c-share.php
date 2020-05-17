<?php
namespace Fuse\Component;
use Fuse\AssetHandler;
use Reactor\Helpers\URLs;

/**
 * Type	: Component
 * Name	: Share
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

$post_id = isset( $data['post_id'] ) ? $data['post_id'] : get_the_id();

// We can't render the rest of this view without a post ID
if( ! $post_id ){
	return;
}

$post_url = urlencode( get_permalink( $post_id ) );

// Build the shareable title
$share_title = htmlspecialchars(urlencode(html_entity_decode( get_the_title( $post_id ) . ' » Knack Creative' , ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');

// Create an array of our available share methods we will ultimately loop through and output
$share_urls = [

	'facebook'	=> [
		'url' 	=> "https://www.facebook.com/sharer/sharer.php?u=$post_url",
		'icon'	=> '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17 2V6H15C14.31 6 14 6.81 14 7.5V10H17V14H14V22H10V14H7V10H10V6C10 4.93913 10.4214 3.92172 11.1716 3.17157C11.9217 2.42143 12.9391 2 14 2H17Z" /></svg>',
	],
	'twitter'	=> [
		'url' 	=> "https://twitter.com/intent/tweet?text=$share_title&amp;url=$post_url",
		'icon'	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23 5c-.7729.35-1.6061.58-2.4694.69.8834-.53 1.566-1.37 1.8872-2.38-.8332.5-1.7567.85-2.7304 1.05C18.8944 3.5 17.7801 3 16.5153 3c-2.359 0-4.2863 1.92-4.2863 4.29 0 .34.0401.67.1104.98-3.57363-.18-6.75575-1.89-8.87382-4.48-.37141.63-.58221 1.37-.58221 2.15 0 1.49.75286 2.81 1.9173 3.56-.71272 0-1.37524-.2-1.95746-.5v.03c0 2.08 1.48566 3.82 3.45316 4.21-.36138.1-.74283.15-1.13432.15-.27104 0-.54207-.03-.80306-.08.54206 1.69 2.11807 2.95 4.01529 2.98-1.46558 1.16-3.32265 1.84-5.35038 1.84-.3413 0-.6826-.02-1.0239-.06C3.90727 19.29 6.17591 20 8.60516 20 16.5153 20 20.8619 13.46 20.8619 7.79c0-.19 0-.37-.0101-.56C21.695 6.63 22.4178 5.87 23 5z"/></svg>',
	],
	'linkedin'	=> [
		'url' 	=> "https://www.linkedin.com/shareArticle?mini=true&amp;url=$post_url&amp;title=$share_title",
		'icon'	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 3a2.00005 2.00005 0 012 2v14c0 .5304-.2107 1.0391-.5858 1.4142A1.99997 1.99997 0 0119 21H5a2.00005 2.00005 0 01-2-2V5c0-.53043.21071-1.03914.58579-1.41421A1.99997 1.99997 0 015 3h14zm-.5 15.5v-5.3a3.2604 3.2604 0 00-.9548-2.3052A3.2604 3.2604 0 0015.24 9.94c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4.3713 0 .7274.1475.9899.4101.2626.2625.4101.6186.4101.9899v4.93h2.79zM6.88 8.56a1.68001 1.68001 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.68998 1.68998 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68zm1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>',
	],
	'email'	=> [
		'url' 	=> "mailto:myfriend@email.com?subject=$share_title",
		'icon'	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 4h16a2.00005 2.00005 0 012 2v12c0 .5304-.2107 1.0391-.5858 1.4142A1.99997 1.99997 0 0120 20H4c-1.11 0-2-.9-2-2V6c0-1.11.89-2 2-2zm8 7l8-5H4l8 5zm-8 7h16V8.37l-8 4.99-8-4.99V18z"/></svg>',
	],

];

/**
 * *************************************
 * Share • View Definition
 * *************************************
 */
?>
<div class="c-share">

	<p class="c-share__pre f-hp--base">Share via:</p>

	<div class="c-share-actions">

		<?php foreach( $share_urls as $platform => $options ){?>

			<a class="c-share-action --<?=$platform;?>" href="<?= $options['url']; ?>" target="_blank" rel="noopener">
				<p class="c-share-action__text u-screen-reader"><?=$platform; ?></p>
				<i class="c-share-action__icon">
					<?= $options['icon'] ?>
				</i>
			</a>

		<?php } ?>

		<button class="c-share-action --url js-copy-to-clipboard">
			<p class="c-share-action__text u-screen-reader">Copy URL</p>
			<i class="c-share-action__icon">

				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path d="M14.8231 9.16523c1.9594 1.96267 1.9594 5.20527 0 7.16787l-2.0445 2.048c-1.8741 1.8773-4.94088 2.2186-6.9002.512-1.78895-1.4507-2.30008-3.7546-1.53339-5.7173.34075-.9386 1.02225-1.7066 1.87414-2.3039l.34076-.256c.34075-.3413.85188 2.6453.85188 2.6453-1.02226 1.024-.93708 2.8159.34074 3.6692.93707.6827 2.30007.4267 3.15197-.3413l2.1297-2.1333c.9371-.9386 1.2778-2.8159.4259-3.7546-.2555-.0853 1.1075-1.70663 1.363-1.53597zm4.6854-4.69325c-1.9593-1.96264-5.1965-1.96264-7.1558 0l-2.2149 2.21863c-1.95932 1.96264-1.95932 5.11989 0 7.16789.6815-.6827 1.6186-1.3653 1.5334-1.536-.9371-.9386-.5963-2.81594.4259-3.75459l2.2149-2.21863c.9371-.93865 2.4705-.93865 3.4075 0 .9371.93865.8519 2.47463 0 3.41328 0 0 .5112 2.90124.8519 2.64534l1.1075-.768c1.7889-1.96267 1.7889-5.11996-.1704-7.16792z"/>
				</svg>

			</i>
			<div class="c-share-action__success">
				<span class="f-b--xs">URL Copied</span>
			</div>
		</button>

	</div>

</div>
