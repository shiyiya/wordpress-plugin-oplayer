# WordPress-Plugin-OPlayer

Another HTML5 video player comes to WordPress.

```shell
docker-compose up
```

```
[oplayer src="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/君の名は.mp4" poster="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/poster.png"]
```

![](https://pic.peo.pw/a/2022/10/21/635223f766bc0.png)

## Options

| 名称             | shortcode  | 默认值                                  | 描述                                                                   |
| ---------------- | ---------- | --------------------------------------- | ---------------------------------------------------------------------- |
| container        | -          | document.querySelector('.oplayer-{id}') | 播放器容器元素                                                         |
| live             | live       | false                                   | 是否直播                                                               |
| autoplay         | autoplay   | false                                   | 视频自动播放                                                           |
| theme            | theme      | '#6668ab'                               | 主题色                                                                 |
| loop             | loop       | false                                   | 视频循环播放                                                           |
| screenshot       | screenshot | false                                   | 开启截图，如果开启，视频和视频封面需要开启跨域                         |
| preload          | preload    | 'metadata'                              | 预加载，可选值: 'none', 'metadata', 'auto'                             |
| volume           | volume     | 0.7                                     | 默认音量，请注意播放器会记忆用户设置，用户手动设置音量后默认音量即失效 |
| video.src        | src        | `required`                              | 视频链接                                                               |
| video.poster     | poster     | -                                       | 视频封面                                                               |
| video.thumbnails | thumbnails | -                                       | 视频缩略图                                                             |
| video.type       | type       | 'auto'                                  | 可选值: 'auto', 'hls', 'dash', 'normal'                                |
| subtitle         |            | -                                       | 外挂字幕链接                                                           |
| watermark        | watermark  | -                                       | 水印地址                                                               |
