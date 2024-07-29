for (var i = 0; i < __oplayersOptions__.length; i++) {
  var options = __oplayersOptions__[i]
  console.log(options)
  var plugins = [
    OUI({
      theme: options['theme'],
      screenshot: options['screenshot'],
      hotkey: options['hotkey'],
      subtitle: options['subtitle']['src']
        ? [
            {
              source: { src: options['subtitle']['src'], default: true },
              fontSize: options['subtitle']['fontSize'],
              bottom: options['subtitle']['bottom'],
              color: options['subtitle']['color'],
            },
          ]
        : undefined,
      thumbnails: {
        src: options['thumbnails'],
        number: options['thumbnails']['thumbnailsCount'],
      },
    }),
    OHls({
      forceHLS: true,
      library: 'https://cdn.jsdelivr.net/npm/hls.js@0.14.17/dist/hls.min.js',
    }),
    ODash({ library: 'https://cdn.dashjs.org/latest/dash.all.min.js' }),
  ]

  OPlayer.make(document.getElementById('player' + options['id']), {
    source: {
      src: options['src'],
      poster: options['poster'],
      format: options['type'],
    },
    volume: options['volume'],
    preload: options['preload'],
    autoplay: options['autoplay'],
    loop: options['loop'],
  })
    .use(plugins)
    .create()
}
