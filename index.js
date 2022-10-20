for (var i = 0; i < __oplayersOptions__.length; i++) {
  var options = __oplayersOptions__[i];
  var plugins = [
    OUI({
      theme: { primaryColor: options["theme"] },
      screenshot: options["screenshot"],
      hotkey: options["hotkey"],
      subtitle: [
        { source: { src: options["subtitle"]["src"], default: true } },
      ],
      thumbnails: {
        src: options["thumbnails"],
        number: options["thumbnails"]["thumbnailsCount"],
      },
    }),
  ];

  if (Hls && OHls) plugins.push(OHls());
  if (ODash) plugins.push(ODash());

  OPlayer.make(document.getElementById("player" + options["id"]), {
    source: {
      src: options["video"]["url"],
      poster: options["video"]["pic"],
      format: options["video"]["type"],
    },
    volume: options["volume"],
    preload: options["preload"],
    autoplay: options["autoplay"],
    loop: options["loop"],
  })
    .use(plugins)
    .create();
}
