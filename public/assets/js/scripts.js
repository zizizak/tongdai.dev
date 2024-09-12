function playSound(soundFile) {
    var audio = new Audio(soundFile);
    audio.play();
}

function handleResponse(response) {
    if (response.play_sound) {
        let soundFile = '';
        switch (response.sound) {
            case 'success':
                soundFile = '/sounds/success.mp3';
                break;
            case 'miss':
                soundFile = '/sounds/miss.mp3';
                break;
        }
        if (soundFile) {
            playSound(soundFile);
        }
    }
    console.log(response.message);
    alert(response.message);
}

window.onload = function() {
    let response = {
        result: 'success',
        thamso: '*14*101234567#',
        data: null,
        message: 'Thực thi thành công.',
        play_sound: 1,
        sound: 'success',
        output: ''
    };
    handleResponse(response);
}
