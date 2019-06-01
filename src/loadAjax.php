<?php
# src/loadAjax.php

use Frast\AjaxLoader;
use App\Ajax\MyAction;
use App\Ajax\InfileJavascript;
use App\Ajax\GetPosts;

// We register our ajax handlers
(new AjaxLoader())
	->register(MyAction::class)
	->register(InfileJavascript::class)
	->register(GetPosts::class)
	->load()
;