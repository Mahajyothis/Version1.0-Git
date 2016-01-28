/* Facebook Script */

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=239906539466537";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/* Facebook private initialization */

window.fbAsyncInit = function() {
	FB.init({
		appId      : '886499728106754',
		xfbml      : true,
		version    : 'v2.5'
	});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	/*js.src = "//connect.facebook.net/en_US/sdk.js";*/
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=886499728106754";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/* Facebook private message script */
function facebook_send_message(to) {
	FB.ui({
	app_id:'886499728106754',
	method: 'send',
	name: "sdfds jj jjjsdj j j ",
	link: 'http://version.mahajyothis.in/',
	to:to,
	description:'sdf sdf sfddsfdd s d  fsf s '

	});
}
/* Facebook Script ends */

/* Viber Script */
    /*var buttonID = 'viber_share';
    var text = "Check this out: ";
    document.getElementById(buttonID).setAttribute('href', "viber://forward?text=" + encodeURIComponent(text + " " + window.location.href));*/
/* Viber Script Ends */

/* Twitter Script */
window.twttr = (function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0],
	t = window.twttr || {};
	if (d.getElementById(id)) return t;
	js = d.createElement(s);
	js.id = id;
	js.src = "https://platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js, fjs);

	t._e = [];
	t.ready = function(f) {
	t._e.push(f);
	};

	return t;
}(document, "script", "twitter-wjs"));
/* Twitter Script Ends */


/* Skype Script 
Skype.ui({
	"name": "dropdown",
	"element": "SkypeButton_Call_abhilash.m.r.001_1",
	"participants": ["abhilash.m.r.001"],
	"imageSize": 0
});
/*
$(document).ready(function(){
	$(document).on('click','#skype_img',function(e){
		$(this).addClass('hide');
		$('.something').removeClass('hide');
	});
});*/
	  
/* Skype Script ends */

$(document).ready(function(){
	$(document).on('click','.modelPopup',function(e){
		var id = $(this).attr('href');
		id = id.substr(1);
		$('.modal').css('z-index',99);
		$('#'+id).css('z-index',9999);
	});
});