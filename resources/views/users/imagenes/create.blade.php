<style>
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
</style>
<div class="container" >
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Agregar imagen</div>
        <div class="panel-body">
          {!! Form::open(["route"=>["imagenes.store",$habitacion->id], "class"=>"form-horizontal","files"=>true]) !!}
          <div class="form-group">
            {!! Form::label("imagen","Imagen",["class"=>"col-md-4 control-label"]) !!}
            <div class="col-md-6">
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary">
                    Buscar <input type="file" name="imagen"style="display: none;">
                  </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              {!! Form::submit("Agregar",["class" => "btn btn-primary"]) !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
<script>
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
    $(':file').on('fileselect', function(event, numFiles, label) {

      var input = $(this).parents('.input-group').find(':text'),
      log = numFiles > 1 ? numFiles + ' files selected' : label;

      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }

    });
  });

});
</script>
