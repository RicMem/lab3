


<h2><?= esc($title) ?></h2>
<header>




<?php echo link_tag('css/main.css'); ?>

<?php if (! empty($guest) && is_array($guest)): ?>

    <?php foreach ($guest as $guest_item): ?>

        <div class="main">
		
		<br>
		<br>
		<b>
		
		 <?= esc($guest_item['name']) ?> 
		 <br>
         <?= esc($guest_item['email']) ?> 
		 <br>
		 <?= esc($guest_item['comment']) ?> 
		
		
        </div>
    <?php endforeach ?>

<?php else: ?>
    <h3>No guest</h3>
    <p>Unable to find any guest for you.</p>

<?php endif ?>

</header>
