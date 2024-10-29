let s_btn=document.querySelector('#search');
let s_bar=document.querySelector('.search_bar'); 

s_btn.addEventListener('click',() =>{
    s_btn.classList.toggle('bx-x');
    s_bar.classList.toggle('active');
});

let vid_btn=document.querySelectorAll('.vid_control');
let vid_idx=0;
vid_btn.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        let videoElement = document.querySelector('#video');
        const newVideoIndex = index;
        const direction = newVideoIndex > vid_idx ? 'slide-left' : 'slide-right';
        currentVideoIndex = newVideoIndex;
        videoElement.classList.add(direction); // Add the appropriate slide class
        setTimeout(() => {
            videoElement.src = src; // Change video source
            videoElement.classList.remove(direction); // Remove slide class after animation
        }, 300); // Match animation duration
    });
});