<?php
/**
 * Displays preloader
 *
 * @package Magze
 */
?>
<style type="text/css">
.preloader-rotating-circles{width:4rem;height:4rem;--c:radial-gradient(farthest-side,var(--global--color-accent) 92%,#0000);background:var(--c) 50% 0,var(--c) 50% 100%,var(--c) 100% 50%,var(--c) 0 50%;background-size:1rem 1rem;background-repeat:no-repeat;animation:uf-rotate-180 1s infinite}@keyframes uf-rotate-180{to{transform:rotate(180deg)}}
</style>
<div id="magze-preloader-wrapper">
	<div class="preloader-loader-wrapper">
		<div class="loading"> 
			<div class="preloader-rotating-circles"></div>
		</div>
	</div>
</div>