<?php if ($args['mime_type'] == 'image/svg+xml'): ?>
	<?php echo file_get_contents($args['url']); ?>
<?php else : ?>
	<?php echo wp_get_attachment_image( $args['id'], $args['size'], false, array('class' => 'img-fluid '.$args['class'], 'alt' => $args['alt']) ); ?>
<?php endif ?>