document.addEventListener('DOMContentLoaded', () => {
    let vid_btn = document.querySelectorAll('.vid_control');
    let vid_idx = 0;

    if (vid_btn.length === 0) {
        console.error("No .vid_control elements found in the DOM.");
        return; // Stop if no controls are found
    }
    
    vid_btn.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            let activeBtn = document.querySelector('.controls .active');
            if (activeBtn) {
                activeBtn.classList.remove('active');
            }
            btn.classList.add('active');

            let src = btn.getAttribute('data-src');
            let videoElement = document.querySelector('#video');

            if (!videoElement) {
                console.error("Video element (#video) not found.");
                return;
            }

            const newVideoIndex = index;
            const direction = newVideoIndex > vid_idx ? 'slide-left' : 'slide-right';
            vid_idx = newVideoIndex;

            videoElement.classList.add(direction);
            setTimeout(() => {
                videoElement.src = src;
                videoElement.classList.remove(direction);
            }, 300); // Match animation duration
        });
    });
});
