<style>
    #map_div { height: 400px; width: 100%; }
</style>

<div id="map_div"></div>

<script type="text/javascript">
    var map = L.map('map_div').setView(['<?php echo $map_config['lat'] ?>', '<?php echo $map_config['lon'] ?>'], <?php echo $map_config['zoom_level'] ?>);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: '<?php echo $map_config['attribution']; ?>'}).addTo(map);

    // Start adding stories

    <?php $marker_count = 0; ?>

    <?php foreach($stories as $story) : ?>
        <?php if($story->story_lat != 0 && $story->story_lon != 0): ?>
            var marker_<?php echo $marker_count; ?> = L.marker([<?php echo $story->story_lon; ?>, <?php echo $story->story_lat; ?>]).addTo(map);
            marker_<?php echo $marker_count; ?>.bindPopup('<?php echo(Utilities::construct_body($story)); ?>');
            <?php $marker_count ++; ?>
        <?php endif;?>
    <?php endforeach; ?>
</script>