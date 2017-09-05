<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title></title>
<!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>
    <script>
        function selectImage(el) {
            var src = el.getAttribute('src');
            window.opener.CKEDITOR.tools.callFunction({{ $CKEditorFuncNum }}, src);
            window.close();           
        }
    </script>
    <div>Images list</div>
     @foreach ($items as $item)   
     
    <div>      
        <img src="{{ $item->name }}" alt="" onclick="selectImage(this);">    
    </div><!-- /col -->
     @endforeach    
</body>
</html>