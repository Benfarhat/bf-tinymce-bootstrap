(function() {
  tinymce.PluginManager.add("bf_mce_bootstrap", function(editor, url) {
    editor.addButton("bf_mce_bootstrap", {
      text: "BS4",
      icone: false,
      type: "menubutton",
      menu: [
        {
          text: "Alert",
          menu: [
            {
              text: "Info alert",
              onclick: function() {
                editor.insertContent(
                  `<div class="alert alert-info alert-dismissible fade show" role="info">
                  <strong>Hello!</strong> This is an info alert.
                  <button type="button" class="close" data-dismiss="info" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`
                );
              }
            },
            {
                text: "Info alert",
                onclick: function() {
                  editor.insertContent(
                    `<div class="alert alert-info alert-dismissible fade show" role="info">
                    <strong>Hello!</strong> This is an info alert.
                    <button type="button" class="close" data-dismiss="info" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>`
                  );
                }
              },
              {
                text: "Success alert",
                onclick: function() {
                  editor.insertContent(
                    `<div class="alert alert-success alert-dismissible fade show" role="success">
                    <strong>Hello!</strong> This is an success alert.
                    <button type="button" class="close" data-dismiss="success" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>`
                  );
                }
              },
              {
                text: "Warning alert",
                onclick: function() {
                  editor.insertContent(
                    `<div class="alert alert-warning alert-dismissible fade show" role="warning">
                    <strong>Hello!</strong> This is an warning alert.
                    <button type="button" class="close" data-dismiss="warning" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>`
                  );
                }
              },
              {
                text: "Danger alert",
                onclick: function() {
                  editor.insertContent(
                    `<div class="alert alert-danger alert-dismissible fade show" role="danger">
                    <strong>Hello!</strong> This is an danger alert.
                    <button type="button" class="close" data-dismiss="danger" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>`
                  );
                }
              },
          ]
        },
        {
          text: "Sample Item 2",
          onclick: function() {
            editor.insertContent("[wdm_shortcode 2]");
          }
        }
      ]
    });
  });
})();
