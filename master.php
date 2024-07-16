<?php

//url route

define('HOME','index.php');
define('About','about.php');
define('Contact','contact.php');
define('Guitar', 'guitar-and-equipments.php');
define('Drums', 'drums-and-equipments.php');
define('ElectricGuitar', 'electric-guitar.php');
define('AcousticGuitar','acoustic-guitar.php');
define('BassGuitar','bass-guitar.php');
define('ClassicalGuitar', 'classical-guitar.php');
define('Tuner', 'tuner.php');
define('GuitarStraps', 'guitar-straps.php');
define('GuiterAmplifier', 'guitar-amplifier.php');
define('Pickups', 'pickups.php');
define('Processor','processor.php');
define('WirelessSystem', 'wireless-system.php');
define('AcousticElectronicDrums', 'acoustic-and-electronic-drums.php');
define('DrumHead', 'drum-head.php');
define('DrumStick', 'drum-stick.php');
define('DrumAmplifier', 'drum-amplifier.php');
define('Keyboard', 'keyboard-piano-midi.php');
define('Violin', 'violin.php');
define('Saxophone', 'saxophone.php');
define('Ukulele', 'ukulele.php');
define('Cymbals', 'cymbals.php');
define('Precussion', 'precussion.php');
define('Microphone', 'microphone.php');
define('StudioMonitor', 'studio-monitor.php');
define('Cables', 'cables.php');
define('Iem', 'iem.php');
define('Strings', 'strings.php');
define('JAM', 'jamroom.php');
define('header_logo','assets/images/jam-room-logo.png');
define('Terms', 'terms-and-conditions.php');
define('privacy', 'privacy-policy.php');
define('RPolicy','return-policy.php');




//payment
define("BASE_URL", "https://www.themetronome.store/");
define("API_STATUS", "LIVE"); //LIVE OR UAT
define("MERCHANTIDLIVE", "M22O4A08O7XNG");   //my live 
define("MERCHANTIDUAT", "PGTESTPAYUAT");  //Sandbox testing
define("SALTKEYLIVE", "4bd01510-2a38-407c-9204-77e1c50880e2");  //my live 
define("SALTKEYUAT", "099eb0cd-02cf-4e2a-8aca-3e6c6aff0399");
define("SALTINDEX", "1");
define("REDIRECTURL", "https://www.themetronome.store/verify.php");
// define("SUCCESSURL", "success.php");
// define("FAILUREURL", "failure.php");
define("UATURLPAY", "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay");
define("LIVEURLPAY", "https://api.phonepe.com/apis/hermes/pg/v1/pay");
define("STATUSCHECKURL", "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/");
define("LIVESTATUSCHECKURL", "https://api.phonepe.com/apis/hermes/pg/v1/status/");













?>