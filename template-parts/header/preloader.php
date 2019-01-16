<?php // Preloader styles. JS is in the footer ?>
<style>
	/* Preloader styles */
	#preloader {
		position: fixed;
		left: 0;
		top: 0;
		z-index: 9999;
		width: 100vw;
		height: 100vh;
		overflow: visible;
		background: #FFF;
		transition: all 0.3s ease;
	}
	#preloader:before,
	#preloader::before {
		width: 100vw;
		height: 100vh;
		position: fixed;
		top: 0;
		left: 0;
		content: '';
		background: url('<?php echo get_stylesheet_directory_uri();?>/assets/loading.svg') no-repeat center center;
		background-size: 200px auto;
	}
	.ie #preloader:before,
	.ie #preloader::before {
		content: 'Loading...';
		display: flex;
		align-content: center;
		justify-content: center;
	}
	@-webkit-keyframes fadeOut{from{opacity:1}to{opacity:0}}
	@keyframes fadeOut{from{opacity:1}to{opacity:0}}
	#preloader.fadeOut {
		-webkit-animation-name: fadeOut;
		animation-name: fadeOut;
		animation-duration: 0.3s;
		z-index: -100;
	}
	@-webkit-keyframes fadeIn{from{opacity:0}to{opacity:1}}
	@keyframes fadeIn{from{opacity:0}to{opacity:1}}
	#preloader.fadeIn {
		-webkit-animation-name: fadeIn;
		animation-name: fadeIn;
		animation-duration: 0.3s;
		z-index: 1000;
	}
</style>