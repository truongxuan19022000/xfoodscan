<?php
$l = new App\Models\Language();
$l->name = 'Tiếng Việt';
$l->code = 'vi';
$l->display_mode = 5; // LTR
$l->status = 5; // Active
$l->save();
echo "Language added successfully.";
