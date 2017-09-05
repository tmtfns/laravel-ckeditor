@if (! isset($error)) 
<script type="text/javascript">   
    /*
     * crossbrowers way
     */
    var parent = (window.opener) ? window.opener : window.parent;
    parent.CKEDITOR.tools.callFunction({{ $cknum }}, '{{ $url }}');    
    window.close();    
</script>
@endif