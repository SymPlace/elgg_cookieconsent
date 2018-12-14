define(function(require) {
    var elgg = require("elgg");
    require("cookieconsent");
    
    var cookieconsent_settings = JSON.parse(elgg.data.elgg_cookieconsent.settings);
    
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": cookieconsent_settings.popup_background_color,
          "text": cookieconsent_settings.popup_text_color
        },
        "button": {
          "background": cookieconsent_settings.button_background_color,
          "text": cookieconsent_settings.button_text_color
        }
      },
      "showLink": cookieconsent_settings.link?true:false,
      "theme": cookieconsent_settings.theme,
      "position": cookieconsent_settings.position,
      "content": {
        "message": cookieconsent_settings.message,
        "dismiss": cookieconsent_settings.dismiss,
        "link": cookieconsent_settings.learnMore,
        "href": cookieconsent_settings.link
      }
    });
});