<script async src="https://www.youtube.com/iframe_api"></script>

function onYouTubeIframeAPIReady() {
    var player;
    player = new YT.Player("YouTubeAutoPlayChSilencio", {
    videoId: "iu8qe-NpduI", // Id del vídeo de YouTube christiandve.com
    width: 560, // Ancho del reproductor (en px)
    height: 315, // Alto del reproductor (en px)
    playerVars: {
    autoplay: 1, // Reproducir automáticamente el vídeo al comenzar
    controls: 0, // Mostrar botones de play/pausa
    showinfo: 0, // Ocultar el título del vídeo
    modestbranding: 1, // Ocultar el logo de YouTube
    loop: 1, // Reproducir el vídeo en bucle
    fs: 0, // Mostrar el botón de pantalla completa
    cc_load_policty: 0, // Ocultar modo de privacidad
    iv_load_policy: 3, // Ocultar las anotaciones del vídeo
    autohide: 1, // Ocultar los controles mientras se reproduce
    playlist: "iu8qe-NpduI" // Lista de reproducción en uso (poner aquí el identificador del vídeo de YouTube)
},
events: {
    onReady: function(e) {
    e.target.mute();
    }
  }
});
}