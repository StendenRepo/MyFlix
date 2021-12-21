"use strict";

// Waits until the page if fully loaded
document.addEventListener("DOMContentLoaded", () => {

    // Finds the video on the page
    const video = document.getElementById('video');
    if (!video) return

    // Finds the start button on the page
    const startButton = document.getElementById('start');
    // Checks if the browser can play the video
    const videoWorks = !!document.createElement('video').canPlayType;
    if (videoWorks) {
        video.controls = false;
        startButton.classList.remove('hidden');
    }

    function play_video() {
        video.play();
        startButton.classList.add('hidden')
        video.controls = true;
    }

    startButton.addEventListener('click', play_video);
})