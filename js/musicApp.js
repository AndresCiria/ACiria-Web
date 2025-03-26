const music = new Audio('../music/1.mp3');

const songs = [
    {
        id:"1",
        songName:`Intro <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/1.png"
    },
    {
        id:"2",
        songName:`Enjaulados <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/2.png"
    },
    {
        id:"3",
        songName:`Pensamiento Crítico <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/3.png"
    },
    {
        id:"4",
        songName:`Espejismo <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/4.png"
    },
    {
        id:"5",
        songName:`Inmanencia <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/5.png"
    },
    {
        id:"6",
        songName:`En el Juego  <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/6.png"
    },
    {
        id:"7",
        songName:`Enredo <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/7.png"
    },
    {
        id:"8",
        songName:`Lodo <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/8.png"
    },
    {
        id:"9",
        songName:`Ira Irracional <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/9.png"
    },
    {
        id:"10",
        songName:`Control Vital <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/10.png"
    },
    {
        id:"11",
        songName:`Vida Nominal <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/11.png"
    },
    {
        id:"12",
        songName:`Gigantes <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/12.png"
    },
    {
        id:"13",
        songName:`Momentos Esporádicos <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/13.png"
    },
    {
        id:"14",
        songName:`Si Muero Mañana<br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/14.png"
    },
    {
        id:"15",
        songName:`Excusas <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/15.png"
    },
    {
        id:"16",
        songName:`Habanos <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/16.png"
    },
    {
        id:"17",
        songName:`Reina <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/17.png"
    },
    {
        id:"18",
        songName:`Caminata  <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/18.png"
    },
    {
        id:"19",
        songName:`La Fe de los Reales <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/19.png"
    },
    {
        id:"20",
        songName:`Carencias Afectivas <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/20.png"
    },
    {
        id:"21",
        songName:`Viento en Popa <br><div class="subtitle">Calendario Terapéutico</div>`,
        poster:"../images/Logos/Canciones/21.png"
    },
    {
        id:"22",
        songName:`Paripés <br><div class="subtitle">Relatos de un Finde</div>`,
        poster:"../images/Logos/Canciones/22.png"
    },
    {
        id:"23",
        songName:`Quema la Escena <br><div class="subtitle">Relatos de un Finde</div>`,
        poster:"../images/Logos/Canciones/23.png"
    },
    {
        id:"24",
        songName:`Ya No Es Como Antes <br><div class="subtitle">Relatos de un Finde</div>`,
        poster:"../images/Logos/Canciones/24.png"
    },
    {
        id:"25",
        songName:`Imposible <br><div class="subtitle">Relatos de un Finde</div>`,
        poster:"../images/Logos/Canciones/25.png"
    },
    {
        id:"26",
        songName:`Enero <br><div class="subtitle">Relatos de un Finde</div>`,
        poster:"../images/Logos/Canciones/26.png"
    },
    {
        id:"27",
        songName:`Alzaté <br><div class="subtitle">Relatos de un Finde</div>`,
        poster:"../images/Logos/Canciones/27.png"
    },
    {
        id:"28",
        songName:`Pensando en Todo <br><div class="subtitle">Sencillo</div>`,
        poster:"../images/Logos/Canciones/28.png"
    }
]

Array.from(document.getElementsByClassName('songItem')).forEach((element, i) => {
    element.getElementsByTagName('img')[0].src = songs[i].poster;
    element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
})

/*let search_result = document.getElementsByClassName('search_result')[0];

songs.forEach(element => {
    const {id, songName, poster} = element;
    let card = document.createElement('a');
    card.classList.add('card');
    card.href = '#' + id;
    card.innerHTML = `
    <img src="${poster}" alt="">
    <div class="content">
    ${songName}
    </div>`;
    search_result.appendChild(card);
})

let input = document.getElementsByTagName('input')[0];

input.addEventListener('keyup', () => {
    let input_value = input.value.toUpperCase();
    let items = search_result.getElementsByTagName('a');

    for (let i = 0; i < items.length; i++) {
        let as = items[i].getElementsByClassName('content')[0];
        let text_value = as.textContent || as.innerText;

        if (text.value.toUpperCase().indexOf(input_value) > -1) {
            items[i].style.display = "flex";
        } else {
            items[i].style.display = "none";
        }
        if (input_value == 0) {
            search_result.style.display= "none";
        } else {
            search_result.style.display= "";
        }
    }
})*/

let masterPlay = document.getElementById('masterPlay');

masterPlay.addEventListener('click', () => {
    if (music.paused || music.currentTime <= 0) {
        music.play();
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
    } else {
        music.pause();
        masterPlay.classList.add('bi-play-fill');
        masterPlay.classList.remove('bi-pause-fill');
    }
})

const makeAllPlays = () => {
    Array.from(document.getElementsByClassName('playListPlay')).forEach((element) => {
            element.classList.add('bi-play-circle-fill');
            element.classList.remove('bi-pause-circle-fill');
        })
}

const makeAllBackgrounds = () => {
    Array.from(document.getElementsByClassName('songItem')).forEach((element) => {
            element.style.background = "rgb(105, 105, 170, 0)";
        })
}

let index = 0;
let poster_master_play = document.getElementById('poster_master_play');
let download_music = document.getElementById('download_music');
let title = document.getElementById('title');

Array.from(document.getElementsByClassName('playListPlay')).forEach((element) => {
    element.addEventListener('click', (e) =>{
        index = e.target.id;
        makeAllPlays();

        e.target.classList.remove('bi-play-circle-fill');
        e.target.classList.add('bi-pause-circle-fill');

        music.src = `../music/${index}.mp3`;
        download_music.href = `../music/${index}.mp3`;
        poster_master_play.src = `../images/Logos/Canciones/${index}.png`;

        music.play();

        let song_title = songs.filter((ele) => {
            return ele.id == index;
        })
        
        song_title.forEach(ele => {
            let {songName} = ele;
            title.innerHTML = songName;
            download_music.setAttribute('download', songName);
        })

        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');

        //music.addEventListener('ended', () =>  {
        //    masterPlay.classList.add('bi-play-fill');
        //    masterPlay.classList.remove('bi-pause-fill');
        //})

        makeAllBackgrounds();
        Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
    })
})

let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];

music.addEventListener('timeupdate', () => {
    let music_curr = music.currentTime;
    let music_dur = music.duration;

    let min = Math.floor(music_dur/60);
    let sec = Math.floor(music_dur%60);

    if (sec < 10) {
        sec = `0${sec}`
    }
    currentEnd.innerText = `${min}:${sec}`;

    let min1 = Math.floor(music_curr/60);
    let sec1 = Math.floor(music_curr%60);

    if (sec1 < 10) {
        sec1 = `0${sec1}`
    }
    currentStart.innerText = `${min1}:${sec1}`;

    let progress_bar = parseInt((music.currentTime/music.duration)*100);
    seek.value = progress_bar;
    let seek_bar = seek.value;
    bar2.style.width = `${seek_bar}%`;
    dot.style.left = `${seek_bar}%`;
})

seek.addEventListener('change', () => {
    music.currentTime = seek.value * music.duration/100;
})

const next_music = () => {
    masterPlay.classList.add('bi-pause-fill');
    
    if (index = songs.length) {
        index == 0;
    }

    index++;
    music.src = `../music/${index}.mp3`;
    download_music.href = `../music/${index}.mp3`;
    poster_master_play.src = `../images/Logos/Canciones/${index}.png`;

    music.play();

    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })
    
    song_title.forEach(ele => {
        let {songName} = ele;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    })

    makeAllBackgrounds();

    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
}

const repeat_music = () => {
    masterPlay.classList.add('bi-pause-fill');
    index;
    music.src = `../music/${index}.mp3`;
    download_music.href = `../music/${index}.mp3`;
    poster_master_play.src = `../images/Logos/Canciones/${index}.png`;

    music.play();

    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })
    
    song_title.forEach(ele => {
        let {songName} = ele;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    })

    makeAllBackgrounds();

    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
}

const random_music = () => {
    masterPlay.classList.add('bi-pause-fill');
    if (index = songs.length) {
        index == 0;
    }
    index = math.floor((Math.random() * songs.length)+1);

    music.src = `../music/${index}.mp3`;
    download_music.href = `../music/${index}.mp3`;
    poster_master_play.src = `../images/Logos/Canciones/${index}.png`;

    music.play();

    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })
    
    song_title.forEach(ele => {
        let {songName} = ele;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    })

    makeAllBackgrounds();

    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
}

let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_dot = document.getElementById('vol_dot');
let vol_bar = document.getElementsByClassName('vol_bar')[0];

vol.addEventListener('change', () => {
    if (vol.value == 0) {
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.add('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if (vol.value == 0) {
        vol_icon.classList.add('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if (vol.value > 50) {
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.add('bi-volume-up-fill');
    }

    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    music.volume = vol_a/100;
})

let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', () => {
    index -= 1;

    if (index < 1) {
        index = Array.from(document.getElementsByClassName('songItem')).length;
    }

    music.src = `../music/${index}.mp3`;
    download_music.href = `../music/${index}.mp3`;
    poster_master_play.src = `../images/Logos/Canciones/${index}.png`;

    music.play();

    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })
        
    song_title.forEach(ele => {
        let {songName} = ele;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    })

    makeAllPlays();
    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');

    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
})

next.addEventListener('click', () => {
    index -= 0;
    index += 1;

    if (index > Array.from(document.getElementsByClassName('songItem')).length) {
        index = 1;
    }

    music.src = `../music/${index}.mp3`;
    download_music.href = `../music/${index}.mp3`;
    poster_master_play.src = `../images/Logos/Canciones/${index}.png`;

    music.play();

    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })
        
    song_title.forEach(ele => {
        let {songName} = ele;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    })

    makeAllPlays();
    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');

    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
})

// Obtener todos los botones de desplazamiento y divs pop_song
let left_scrolls = document.querySelectorAll('.bi-arrow-left');
let right_scrolls = document.querySelectorAll('.bi-arrow-right');
let pop_songs = document.querySelectorAll('.pop_song');

// Agregar event listeners a los botones de desplazamiento izquierdo
left_scrolls.forEach((left_scroll, index) => {
    left_scroll.addEventListener('click', function() {
        let pop_song = this.closest('.popular_song').querySelector('.pop_song');
        pop_song.scrollLeft -= 330;
    });
});

// Agregar event listeners a los botones de desplazamiento derecho
right_scrolls.forEach((right_scroll, index) => {
    right_scroll.addEventListener('click', function() {
        let pop_song = this.closest('.popular_song').querySelector('.pop_song');
        pop_song.scrollLeft += 330;
    });
});

let shuffle = document.getElementsByClassName('shuffle')[0];

shuffle.addEventListener('click', () => {
    let a = shuffle.innerHTML;

    switch (a) {
        case "next":
            shuffle.classList.add('bi-arrow-repeat');
            shuffle.classList.remove('bi-music-note-beamed');
            shuffle.classList.remove('bi-shuffle');
            shuffle.innerHTML = "repeat";
            break;

        case "repeat":
            shuffle.classList.remove('bi-arrow-repeat');
            shuffle.classList.remove('bi-music-note-beamed');
            shuffle.classList.add('bi-shuffle');
            shuffle.innerHTML = "random";
            break;

        case "random":
            shuffle.classList.remove('bi-arrow-repeat');
            shuffle.classList.add('bi-music-note-beamed');
            shuffle.classList.remove('bi-shuffle');
            shuffle.innerHTML = "next";
            break;
    }
})

music.addEventListener('ended', () => {
    let b = shuffle.innerHTML;

    switch (b) {
        case "next":
            next_music();
            break;

        case "repeat":
            repeat_music();
            break;

        case "random":
            random_music();
            break;
    }
})

let menu_list_active_button = document.getElementById('menu_list_active_button');
let menu_side = document.getElementsByClassName('menu_side')[0];

menu_list_active_button.addEventListener('click', () => {
    menu_side.style.transform = "unset";
    menu_list_active_button.style.opacity = 0;
})

let song_side = document.getElementsByClassName('song_side')[0];
song_side.addEventListener('click', () => {
    if(window.innerWidth < 930) {
        menu_side.style.transform = "translateX(-100%)";
        menu_list_active_button.style.opacity = 1;
    }
})