for (var i = 0; i < __oplayers__.length; i++) {
  var o = __oplayers__[i]
  var plugins = [
    OUI({
      theme: o['theme'],
      controller: {
        header: Boolean(o['title']),
        slideToSeek: 'always',
      },
      screenshot: o['screenshot'],
      subtitle: o['subtitle'] ? [{ source: { src: o['subtitle'], default: true } }] : undefined,
      thumbnails: o['thumbnails']
        ? {
            src: o['thumbnails'],
            number: o['thumbnailsCount'],
          }
        : undefined,
    }),
    OHls({
      forceHLS: true,
      library: 'https://cdn.jsdelivr.net/npm/hls.js@0.14.17/dist/hls.min.js',
    }),
    ODash({ library: 'https://cdn.dashjs.org/latest/dash.all.min.js' }),
  ]

  OPlayer.make(document.getElementById('player' + o['id']), {
    source: {
      src: o['src'],
      poster: o['poster'],
      title: o['title'],
    },
    loop: o['loop'],
    volume: o['volume'],
    preload: o['preload'],
    autoplay: o['autoplay'],
    autopause: o['autopause'],
  })
    .use(plugins)
    .create()
}
