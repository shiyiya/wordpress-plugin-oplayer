# WordPress-Plugin-OPlayer

Another HTML5 video player comes to WordPress.

## Options

| 名称              | shortcode        | 默认值                                  | 描述                                                                   |
| ----------------- | ---------------- | --------------------------------------- | ---------------------------------------------------------------------- |
| container         | -                | document.querySelector('.oplayer-{id}') | 播放器容器元素                                                         |
| live              | live             | false                                   | 直播                                                                   |
| autoplay          | autoplay         | false                                   | 视频自动播放                                                           |
| theme             | theme            | '#FADFA3'                               | 主题色                                                                 |
| loop              | loop             | false                                   | 视频循环播放                                                           |
| screenshot        | screenshot       | false                                   | 开启截图，如果开启，视频和视频封面需要开启跨域                         |
| hotkey            | hotkey           | true                                    | 开启热键                                                               |
| preload           | preload          | 'metadata'                              | 预加载，可选值: 'none', 'metadata', 'auto'                             |
| volume            | volume           | 0.7                                     | 默认音量，请注意播放器会记忆用户设置，用户手动设置音量后默认音量即失效 |
| video.src         | src              | -                                       | 视频链接                                                               |
| video.poster      | poster           | -                                       | 视频封面                                                               |
| video.thumbnails  | thumbnails       | -                                       | 视频缩略图                                                             |
| video.type        | type             | 'auto'                                  | 可选值: 'auto', 'hls', 'dash', 'normal'                                |
| subtitle          |                  | -                                       | 外挂字幕                                                               |
| subtitle.src      | subtitlesrc      | `required`                              | 字幕链接                                                               |
| subtitle.type     | subtitletype     | 'webvtt'                                | 字幕类型，可选值: 'webvtt', 'ass'，目前只支持 webvtt                   |
| subtitle.fontSize | subtitlefontsize | '20px'                                  | 字幕字号                                                               |
| subtitle.bottom   | subtitlebottom   | '40px'                                  | 字幕距离播放器底部的距离，取值形如: '10px' '10%'                       |
| subtitle.color    | subtitlecolor    | '#b7daff'                               | 字幕颜色                                                               |
