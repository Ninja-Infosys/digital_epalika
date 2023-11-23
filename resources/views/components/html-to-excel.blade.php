<div>

    <button type="button" onclick="exportExcel()" style="height: 30px;" class="btn btn-sm btn-outline-success">

        <i class="fa fa-file-excel"> EXPORT</i>
    </button>
</div>

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
    <script>
        function exportExcel() {
            let export_table = document.getElementById('{{$targetTable}}');
            if (export_table) {
                let file = XLSX.utils.table_to_book(export_table, {sheet: "Sheet1"});

                XLSX.write(file, {bookType: '{{$fileType}}', bookSST: true, type: 'base64'});

                XLSX.writeFile(file, '{{$fileName}}.{{$fileType}}');
            } else {
                alert('Table Not Found')
            }
        }
    </script>
@endpush
