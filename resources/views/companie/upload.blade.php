<form class="form-horizontal" accept-charset="UTF-8" 
          method="POST" 
          action="{{  url('/companie/upload/'.$companie->id) }}"
          data-model='companie'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
          <div class="form-group">
            <div class="form-group">
              <div class="col-sm-10"><input type='file' name="logo" accept='image/*' onchange='openFile(event)'></div>
            </div>
            <div class="form-group">
              <div class="col-sm-10"><img id="output" width="150" src='{{ "data:image/png;base64,".$companie->logo }}' height="50"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-10"><button type="button" class="btn btn-primary upload">Upload</button></div>
            </div>
          </div>
      </div>
</form>