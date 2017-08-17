<?php

require_once get_template_directory() . '/lib/twitter-widget/twitteroauth.php';


$twitter_customer_key = 'sSX9hcoGsabB2Ay3b4edxFtft';

$twitter_customer_secret = 'c27ZpRNtEGdwgco2pBE4g2XbHeAt6TcrQrk8HQ9lIsSPfUziZZ';

$twitter_access_token = '4179367623-oOzb3vPaDJ4joadIcPIRTnspXUV5Kcbqim9bL2V';

$twitter_access_token_secret = 'MGJTJbbObZrPRO0pcQKHr2l4k92apCa4a4XzaqpaD51vI';

$connection = new TwitterOAuth( $twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret );
$x          = 0;
$my_tweets  = $connection->get( 'statuses/user_timeline', array(
	'screen_name' =>  get_option("twitter_profile") ,
	'count'       => 25
) );

for ( $p = 0; $p < 25; $p ++ ) {
	//function 9preg_replace) to convert text url into links.
	$string = preg_replace( '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<br><a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $my_tweets[ $p ]->text );
	if ( ! preg_match( "/@(\w+)/", $string ) ) {
		$tweets[ $x ] = $string;
		$x ++;
	}
}

if ( isset( $my_tweets->errors ) ) {
	echo 'Error :' . $my_tweets->errors[0]->code . ' - ' . $my_tweets->errors[0]->message;
} else {
	echo '<ul class="list-group">';
	for ( $u = 0, $x = 0; $u < 4; $u ++, $x ++ ) {
		echo '<li class="list-group-item text-style-tweets list-unstyled">' . $tweets[ $x ] . '</li>';
	}
	echo '</ul>';
}

?>


