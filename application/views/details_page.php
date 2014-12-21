<div class="row">
    <div class="col-md-2">
        <?php if($story->source_img != '') : ?>
            <div class="thumbnail">
                <img src="<?php echo($story->source_img); ?>" style="width:100%"/>
            </div>
        <?php endif; ?>
        <p style="text-align: center;"><strong><?php echo $story->source_name; ?></strong></p>
    </div>

    <div class="col-md-10 well well-sm">
        <h4>Story:</h4>
        <p><strong><?php echo $story->story_text; ?></strong></p>
        <h4>Time:</h4>
        <?php $story_time = strtotime($story->story_datetime); ?>
        <?php echo date("F j, Y, g:i a", $story_time); ?>
    </div>
</div>

<hr/>

<h4>Media:</h4>

<div class="row">
    <?php foreach($media_files as $media_file): ?>
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="<?php echo $media_file; ?>"/>
            </div>
        </div>
    <?php endforeach; ?>
</div>