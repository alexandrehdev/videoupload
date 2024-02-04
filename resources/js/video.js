import videojs from "video.js";

import 'videojs-quality-selector-hls'

import 'videojs-mobile-ui';



var player = videojs('my-video');

player.mobileUi();

player.dynamicWatermark();


player.qualitySelectorHls({
    displayCurrentQuality: false,
    placementIndex: 2,
    vjsIconClass: 'vjs-icon-hd'
});