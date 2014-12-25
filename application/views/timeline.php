<div style="width:100%;" id="timeline"></div>

<script type="text/javascript">
    var container = document.getElementById('timeline');

    // note that months are zero-based in the JavaScript Date object
    var items = new vis.DataSet([
        <?php foreach($stories as $story): ?>
        <?php $date_time = strtotime($story->story_datetime); ?>
        {start: new Date(<?php echo date("Y", $date_time); ?>,<?php echo date("m", $date_time); ?>,<?php echo date("d", $date_time); ?>,<?php echo date("H", $date_time); ?>,<?php echo date("i", $date_time); ?>,<?php echo date("s", $date_time); ?>), content: '<?php echo Utilities::construct_body($story); ?>'},
        <?php endforeach; ?>
    ]);

    var options = {
        editable: false,
        margin: {
            item: 20,
            axis: 40
        }
    };

    var timeline = new vis.Timeline(container, items, options);
</script>