document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById('video')
    const startButton = document.getElementById('start');
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