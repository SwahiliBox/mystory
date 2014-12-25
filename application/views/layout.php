<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>My Story Platform</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo URL::base().'assets/css/bootstrap.min.css'; ?>" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo URL::base().'assets/js/bootstrap.min.js';?>"></script>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="<?php echo URL::base().'assets/css/styles.css'; ?>" rel="stylesheet">

    <!-- Timeline -->

    <script type='text/javascript' src='<?php echo URL::base().'assets/js/vis/vis.js'?>'></script>
    <link rel="stylesheet" href="<?php echo URL::base().'assets/css/vis/vis.css'?>"/>

    <!-- Leaflet -->

    <link rel="stylesheet" href="<?php echo URL::base().'assets/css/leaflet/leaflet.css'?>"/>
    <script type='text/javascript' src='<?php echo URL::base().'assets/js/leaflet/leaflet.js'?>'></script>
</head>
<body>
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL::site().'story/'.urlencode($story_id);; ?>"><?php echo $story_name; ?></a>
            </div>
            <div class="navbar-default" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL::site().'story/media/'.urlencode($story_id);; ?>">Story Media</a></li>
                </ul>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Other Stories <span class="caret"></span></a>

                        <ul id="g-account-menu" class="dropdown-menu" role="menu">
                            <?php foreach($stories as $story_key => $story) : ?>
                                <?php if($story_id != $story_key) : ?>
                                    <li><a href="<?php echo URL::site().'story/'.urlencode($story_key); ?>"><?php echo $story['name']; ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <?php echo $page_layout; ?>
    </div>
    <!-- /Main -->

    <footer class="text-center">&copy;<?php echo(date("Y")); ?> <a href="http://swahilibox.co.ke" target="_blank">SwahiliBox</a>. This Bootstrap 3 dashboard layout is compliments of <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a></footer>
    <script src="<?php echo URL::base().'assets/js/scripts.js';?>"></script>
</body>
</html>
