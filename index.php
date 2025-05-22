<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Flux vidéo Tapo C310</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            padding: 40px;
        }
        video {
            width: 800px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>
<body>
    <h1>Flux en direct – Caméra Tapo C310</h1>
    <video id="video" controls autoplay muted></video>

    <script>
        const video = document.getElementById('video');
        if (Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource('hls/stream.m3u8');
            hls.attachMedia(video);
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = 'hls/stream.m3u8';
        }
    </script>
</body>
</html>

