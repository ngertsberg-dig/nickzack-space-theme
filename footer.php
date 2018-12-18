<footer>

<h2> footers</h2>

</footer>



<?php
global $post;
if(is_single() != 1){
	$name = $post -> post_name;
}
else{
	$name = $post -> post_type;
}
$scriptToLoad = WP_CONTENT_URL . '/themes/nickzack/build/js/'.$name.'.js';
$loadMenu = WP_CONTENT_URL . '/themes/nickzack/build/js/menu.js';
?>
<script src = <?php echo $scriptToLoad;?>></script>
<script src = <?php echo $loadMenu;?>></script>
</body>

</html>
