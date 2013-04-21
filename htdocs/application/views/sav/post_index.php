
<!-- view post -->
<?php 
if($posts):
foreach($posts as $pst):
?>
<div>par : <?php echo($pst->user->username); ?></div>
<h1><?php echo ($pst->title); ?></h1>
<p><?php echo ($pst->content); ?></p>

<?php endforeach; endif; ?>