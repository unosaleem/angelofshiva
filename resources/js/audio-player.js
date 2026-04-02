const audio = new Audio();
const player = document.getElementById('audioPlayer');
const title = document.getElementById('audioTitle');
const playBtn = document.getElementById('playPause');

document.addEventListener('click',e=>{
    if(!e.target.classList.contains('play-audio')) return;
    const card = e.target.closest('.media-card');
    audio.src = card.dataset.audio;
    title.textContent = card.dataset.title;
    audio.play();
    player.classList.remove('hidden');
    playBtn.textContent='Pause';
});

playBtn.onclick=()=> audio.paused?audio.play():audio.pause();
document.getElementById('closePlayer').onclick=()=>{
    audio.pause();
    player.classList.add('hidden');
};
