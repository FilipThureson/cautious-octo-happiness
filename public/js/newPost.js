// skapar tinyMCE-editor istället för textarea

tinymce.init({
    selector: 'textarea',
    //plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    menubar: false,
    resize: false,
    toolbar: "undo redo | bold italic underline",
    width : "100%",
    skin: "oxide-dark",
    content_css: "dark"
});
