<div class="container">
    <h4>Media</h4>
    <hr/>
    <div class="row">
        <?php foreach($media as $media_item) : ?>
            <div class="thumbnail col-md-4">
                <a href='<?php echo URL::site().'story/details/'.$media_item->story_id; ?>'><img src="<?php echo $media_item->media_file; ?>"/></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>