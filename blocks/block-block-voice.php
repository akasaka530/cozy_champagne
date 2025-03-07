<?php
$ttl     = block_value('ttl');
$text     = block_value('text');
$answer     = block_value('answer');
?>


<li class="c-index-voice__item col-md-6">
	<div class="c-index-voice__question">
		<p class="c-index-voice__question-ttl">
			<?php echo $ttl; ?>
		</p>
		<p class="c-index-voice__question-text">
			<?php echo $text; ?>
		</p>
	</div>
	<div class="c-index-voice__answer">
		<p class="c-index-voice__answer-text">
			<?php echo $answer; ?>
		</p>
	</div>
</li><!-- col -->