@section('styles')
<link href="{{ asset('js/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
<style>
    .upload-image:hover{
        cursor: pointer;
        opacity: 0.7;
    }
</style>
@endsection

@push('scripts')
<script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset("js/form.js") }}"></script>
<script>
    $(document).ready(function () {
        $("textarea").summernote({
            dialogsInBody: true,
            placeholder: 'Silahkan isi konten',
            tabsize: 2,
            height: 400,
            toolbar: [
                ['view', ['fullscreen', 'codeview', 'help','undo','redo']],
                ['font', ['bold', 'underline','italic','strikethrough','superscript','subscript', 'clear',]],
                ['fontname', ['fontname','fontsize','fontsizeunit']],
                ['color', ['color','forecolor','backcolor']],
                ['insert', ['link', 'video','hr','table']],
                ['para', ['ul', 'ol', 'paragraph','height','style']],
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            }

        });
    });
</script>
@endpush
