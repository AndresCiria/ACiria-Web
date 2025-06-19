// Elementos del DOM
const music = new Audio();
const masterPlay = document.getElementById('masterPlay');
const back = document.getElementById('back');
const next = document.getElementById('next');
const poster_master_play = document.getElementById('poster_master_play');
const title = document.getElementById('title');
const seek = document.getElementById('seek');
const bar2 = document.getElementById('bar2');
const currentStart = document.getElementById('currentStart');
const currentEnd = document.getElementById('currentEnd');
const vol_icon = document.getElementById('vol_icon');
const vol = document.getElementById('vol');

// Estado del reproductor
let currentAppIndex = null;
let audioContextUnlocked = false;

// Función para desbloquear audio
async function unlockAudio() {
    if (audioContextUnlocked) return true;
    
    // Crear un contexto de audio invisible
    const AudioContext = window.AudioContext || window.webkitAudioContext;
    const audioContext = new AudioContext();
    
    // Crear un nodo de ganancia silencioso
    const gainNode = audioContext.createGain();
    gainNode.gain.value = 0;
    gainNode.connect(audioContext.destination);
    
    // Crear una fuente de audio vacía
    const source = audioContext.createBufferSource();
    source.buffer = audioContext.createBuffer(1, 1, 22050);
    source.connect(gainNode);
    source.start(0);
    
    // Cuando el estado cambie a 'running', el audio está desbloqueado
    if (audioContext.state === 'running') {
        audioContextUnlocked = true;
        return true;
    }
    
    // Si no está corriendo, intentar reanudar
    try {
        await audioContext.resume();
        audioContextUnlocked = true;
        return true;
    } catch (error) {
        console.error('Error al desbloquear audio:', error);
        return false;
    }
}

// Función para reproducir canción
async function playSong(appIndex) {
    try {
        // Primero intentar desbloquear el audio
        const isUnlocked = await unlockAudio();
        if (!isUnlocked) {
            throw new Error('Audio no desbloqueado');
        }

        const result = findSongByAppIndex(appIndex);
        if (!result) {
            console.error('Canción no encontrada');
            return;
        }

        const { song, album } = result;
        const audioPath = `../${song.file}`;
        
        // Detener la reproducción actual
        music.pause();
        music.currentTime = 0;
        music.src = audioPath;
        
        // Reproducir la canción
        await music.play();
        
        console.log('Reproduciendo:', song.title);
        currentAppIndex = appIndex;
        updateUI(song, album);
    } catch (error) {
        console.error('Error al reproducir:', error);
        // No mostrar alerta aquí para no molestar al usuario
    }
}

// Función para mostrar instrucciones
function showAudioInstructions() {
    const instructions = document.createElement('div');
    instructions.id = 'audio-instructions';
    instructions.innerHTML = `
        <div style="position: fixed; top: 0; left: 0; right: 0; 
                   background: #ffeb3b; padding: 15px; text-align: center;
                   z-index: 1000; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
            <p style="margin: 0; font-size: 16px; font-weight: bold;">
                Para escuchar música, haz clic en cualquier parte de la página
            </p>
        </div>
    `;
    document.body.prepend(instructions);
    
    // Eliminar las instrucciones después de la interacción
    const removeInstructions = () => {
        document.getElementById('audio-instructions')?.remove();
        document.removeEventListener('click', removeInstructions);
        document.removeEventListener('keydown', removeInstructions);
        document.removeEventListener('touchstart', removeInstructions);
    };
    
    document.addEventListener('click', removeInstructions);
    document.addEventListener('keydown', removeInstructions);
    document.addEventListener('touchstart', removeInstructions);
}

// Inicialización
document.addEventListener('DOMContentLoaded', () => {
    console.log('Reproductor inicializado');
    
    // Configurar volumen inicial
    music.volume = 0.7;
    if (vol) vol.value = 70;
    
    // Configurar controles principales
    if (masterPlay) {
        masterPlay.addEventListener('click', async () => {
            if (music.paused) {
                if (!currentAppIndex) {
                    const firstSong = getAllSongs()[0];
                    if (firstSong) await playSong(firstSong.appIndex);
                } else {
                    try {
                        await music.play();
                        masterPlay.classList.remove('bi-play-fill');
                        masterPlay.classList.add('bi-pause-fill');
                    } catch (error) {
                        console.error('Error al reanudar:', error);
                    }
                }
            } else {
                music.pause();
                masterPlay.classList.add('bi-play-fill');
                masterPlay.classList.remove('bi-pause-fill');
            }
        });
    }
    
    // Configurar otros controles
    if (back) back.addEventListener('click', playPrevious);
    if (next) next.addEventListener('click', playNext);
    
    // Configurar barra de progreso
    if (seek) {
        seek.addEventListener('input', () => {
            if (music.duration) {
                music.currentTime = (seek.value / 100) * music.duration;
            }
        });
    }
    
    // Configurar volumen
    if (vol && vol_icon) {
        vol.addEventListener('input', () => {
            const volValue = vol.value;
            music.volume = volValue / 100;
            
            vol_icon.className = 'bi ' + (
                volValue == 0 ? 'bi-volume-mute-fill' :
                volValue > 50 ? 'bi-volume-up-fill' :
                'bi-volume-down-fill'
            );
        });
    }
    
    // Configurar eventos de canciones - ESTA ES LA PARTE CLAVE
    document.querySelectorAll('.songItem, .playListPlay').forEach(element => {
        element.addEventListener('click', async function(e) {
            e.stopPropagation();
            
            // Obtener el appIndex de la canción
            const appIndex = this.getAttribute('data-app-index') || this.id;
            if (!appIndex) return;
            
            // Intentar desbloquear el audio primero
            try {
                await unlockAudio();
                // Luego reproducir la canción
                await playSong(appIndex);
            } catch (error) {
                console.error('Error al reproducir:', error);
            }
        });
    });
});

// Funciones auxiliares (mantén las que ya tienes)
function getAllSongs() {
    let allSongs = [];
    window.albumsData.forEach(album => {
        album.songs.forEach(song => {
            allSongs.push({
                ...song,
                albumTitle: album.title
            });
        });
    });
    return allSongs;
}

function findSongByAppIndex(appIndex) {
    for (const album of window.albumsData) {
        for (const song of album.songs) {
            if (song.appIndex === appIndex) {
                return { song, album };
            }
        }
    }
    return null;
}

function updateUI(song, album) {
    if (poster_master_play) poster_master_play.src = song.image;
    if (title) {
        title.innerHTML = `${song.title}<div class="subtitle">${album.title}</div>`;
    }
    if (masterPlay) {
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
    }
}

function playNext() {
    const allSongs = getAllSongs();
    if (allSongs.length === 0) return;
    
    const currentIndex = currentAppIndex ? 
        allSongs.findIndex(s => s.appIndex === currentAppIndex) : 0;
    const nextIndex = (currentIndex + 1) % allSongs.length;
    playSong(allSongs[nextIndex].appIndex);
}

function playPrevious() {
    const allSongs = getAllSongs();
    if (allSongs.length === 0) return;
    
    const currentIndex = currentAppIndex ? 
        allSongs.findIndex(s => s.appIndex === currentAppIndex) : 0;
    const prevIndex = (currentIndex - 1 + allSongs.length) % allSongs.length;
    playSong(allSongs[prevIndex].appIndex);
}