<?php

use ZFTInfo\Knowledge\Http\Controllers\KnowledgeController;

Route::get('knowledge', KnowledgeController::class.'@index');