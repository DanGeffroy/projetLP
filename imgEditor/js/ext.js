
// 1er bloc
function draw(ev) {
      console.log(ev);
      var ctx = document.getElementById('canvas').getContext('2d'),
      img = new Image(),
      f = document.getElementById("uploadimage").files[0],
      url = window.URL || window.webkitURL,
      src = url.createObjectURL(f);

      img.src = src;
      img.onload = function() {
        ctx.drawImage(img, 0, 0);
        url.revokeObjectURL(src);
      }
    }

    document.getElementById("uploadimage").addEventListener("change", draw, false)

// 2 eme bloc

var imageLoader = document.getElementById('imageLoader');
  imageLoader.addEventListener('change', handleImage, false);

  function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
      var img = new Image();
      img.onload = function () {
        var imgInstance = new fabric.Image(img, {
          scaleX: 0.2,
          scaleY: 0.2
        })
        canvas.add(imgInstance);
      }
      img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
  }

// 3 eme bloc
  function handleImage(e){
  var reader = new FileReader();
  reader.onload = function(event){
    var img = new Image();
    img.onload = function(){
      canvas.width = img.width;
      canvas.height = img.height;
      ctx.drawImage(img,0,0);
    }
    img.src = event.target.result;
  }
  reader.readAsDataURL(e.target.files[0]);
}
canvas.add(imageLoader);
});

// 4 eme bloc
function(){
      var mainScriptEl = document.getElementById('main');
      if (!mainScriptEl) return;
      var preEl = document.createElement('pre');
      var codeEl = document.createElement('code');
      codeEl.innerHTML = mainScriptEl.innerHTML;
      codeEl.className = 'language-javascript';
      preEl.appendChild(codeEl);
      document.getElementById('bd-wrapper').appendChild(preEl);
    })();
    </script>
    <script>
    (function() {
      fabric.util.addListener(fabric.window, 'load', function() {
        var canvas = this.__canvas || this.canvas,
        canvases = this.__canvases || this.canvases;

        canvas && canvas.calcOffset && canvas.calcOffset();

        if (canvases && canvases.length) {
          for (var i = 0, len = canvases.length; i < len; i++) {
            canvases[i].calcOffset();
          }
        }
      });
    })();
