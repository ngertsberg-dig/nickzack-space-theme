<footer>



</footer>



<?php
global $post;
if(is_single() != 1){
	$name = $post -> post_name;
}
else{
	$name = $post -> post_type;
}
$theme = get_template_directory_uri() . '/';
$scriptToLoad = $theme.'build/js/'.$name.'.js';
$loadMenu  = $theme.'/build/js/menu.js';
?>
<script src = <?php echo $scriptToLoad;?>></script>
<script src = <?php echo $loadMenu;?>></script>
</body>

</html>
