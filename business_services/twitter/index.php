<?php

use Codebird\Codebird;

require('vendor/autoload.php');

$cb = new Codebird;
$cb->setConsumerKey('kOgKGkmcLR2dpahK6RVFtncKD', 'rxFXj2zUv7JNtc7dT91fVgveEAMd11meu4DivPhYfD5qPcfqqz'); 
$cb->setToken('81057639-gztAXjV3JHUsTURXqZmD7kDYulU4RpoMxKeYCfICo', 'UTyPHmzfD1ZRJ5Bx8d7CjkFYJSVSJX04w71o6Kj1Qo8ih');

$reply = $cb->statuses_update([
	'status'	=> '4'
	]);