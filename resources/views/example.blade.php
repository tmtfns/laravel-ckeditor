<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
<!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

  <link rel="stylesheet" type="text/css" href="/assets/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/fonts/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">  
 
</head>

<body>
  <div class="common">
    <div class="main">
    <div class="wrapper">
        <div class="content">
          <div class="row">
            <div class="col col50">
              <div class="form_item">
                <label class="form_label">description</label>
                <div class="form_wrapper">
                  <textarea class="form_field js-ckeditor" id="ck-description"
                     data-ckbrowser="{{  route('textimage', ['folder' => 'first-folder'], FALSE)}}" data-ckupload="{{  route('textimage.save', ['folder' => 'first-folder'], FALSE)}}"name="description">{{ $item->description or '' }}</textarea>
                </div>
               
              </div><!-- /form_item -->
            </div> <!-- /col -->
            <div class="col col50">
              <div class="form_item">
                <label class="form_label">conditions</label>
                <div class="form_wrapper">
                  <textarea class="form_field js-ckeditor" id="ck-conditions"
                     data-ckbrowser="{{  route('textimage', ['folder' => 'second-folder'], FALSE)}}" data-ckupload="{{  route('textimage.save', ['folder' => 'second-folder'], FALSE)}}" name="conditions">{{ $item->conditions or '' }}</textarea>
                </div>
                
              </div><!-- /form_item -->
            </div> <!-- /col -->
          </div> <!-- /row -->
            
            
            
        </div>  <!-- /content -->
      </div> <!-- /wrapper -->

    </div><!-- /main -->
    
  </div><!-- /common -->
  <script src="/assets/js/vendor/jquery-3.2.1.min.js"></script>
  <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
  <script src="/assets/js/script.js"></script>
</body>

</html>