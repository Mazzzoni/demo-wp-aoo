<?php

use Frast\AjaxLoader;
use App\Ajax\MyAction;

// We register our ajax handlers
(new AjaxLoader())
	->register(MyAction::class)
	->load()
;