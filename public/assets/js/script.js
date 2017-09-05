$(function() {
    var $form = $('form.js-ajax-form');
    if ($form.length > 0) {         
        var ckeditorItems = [];
        var isCkeditor = false;       
        $form.find('.js-ckeditor').each(function(){
            var $this = $(this);
            var name = $this.attr('name');
            var id = $this.attr('id');   
            var browser = $this.attr('data-ckbrowser');
            var upload = $this.attr('data-ckupload');
            ckeditorItems.push({"name": name, "id": id });
            CKEDITOR.replace(id, {
                filebrowserImageBrowseUrl: browser,                
                filebrowserImageUploadUrl: upload
            });            
            isCkeditor = true;
        });
    }   
            
});