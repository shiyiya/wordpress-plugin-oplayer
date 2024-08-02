# WordPress-Plugin-OPlayer

https://github.com/shiyiya/oplayer

Another HTML5 video player comes to WordPress.

```
[oplayer
title="君の名は"
src="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/君の名は.mp4"
poster="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/poster.png"
subtitle="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/君の名は-jp.srt"
watermark="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/poster.png"
thumbnails="https://cdn.jsdelivr.net/gh/shiyiya/QI-ABSL@master/o/thumbnails.jpg"
thumbnailsCount="100"
]
```

![](https://pic.peo.pw/a/2022/10/21/635223f766bc0.png)

## Options

| name            | shortcode       | default                                 |
| --------------- | --------------- | --------------------------------------- |
| container       | -               | document.querySelector('.oplayer-{id}') |
| src             | src             | `required`                              |
| title           | title           | -                                       |
| poster          | poster          | -                                       |
| theme           | theme           | '#6668ab'                               |
| live            | live            | false                                   |
| autoplay        | autoplay        | false                                   |
| autopause       | autopause       | true                                    |
| loop            | loop            | false                                   |
| screenshot      | screenshot      | false                                   |
| volume          | volume          | 0.8                                     |
| thumbnails      | thumbnails      | -                                       |
| thumbnailsCount | thumbnailsCount | -                                       |
| subtitle        | subtitle        | -                                       |
| watermark       | watermark       | -                                       |

## Devolopment

http://localhost:8000

```shell
docker-compose up
```
