@echo off
echo Lancement du flux Tapo C310 en HLS...

REM ✅ Utilise le chemin exact vers ffmpeg.exe
"C:\ffmpeg\bin\ffmpeg.exe" -rtsp_transport tcp -i "rtsp://optiplant1:saegeii@192.168.163.49:554/stream1" ^
 -c:v libx264 -preset ultrafast -tune zerolatency -f hls ^
 -hls_time 1 -hls_list_size 3 -hls_flags delete_segments ^
 hls/stream.m3u8

pause
