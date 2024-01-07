for (var i = 0; i < __oplayersOptions__.length; i++) {
  var options = __oplayersOptions__[i]
  var plugins = [
    OUI({
      theme: { primaryColor: options['theme'], watermark: options['watermark'] },
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
  ]

  if (window.Hls && window.OHls) plugins.push(OHls())
  if (window.ODash) plugins.push(ODash())

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
