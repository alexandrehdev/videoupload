import videojs from "video.js";

import "videojs-quality-selector-hls";

var options = {};

var player = videojs('my-video', options, function onPlayerReady(){

    player.qualitySelectorHls({
        displayCurrentQuality: true,
        placementIndex: 2,
        vjsIconClass: 'vjs-icon-hd'
    });

    videojs.log('player ready');

    this.on('ended', function() {
        videojs.log('Awww...over so soon?!');
    });
});
