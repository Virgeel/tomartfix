$(document).ready(function() {
    $('select[name="pegawai_id"]').on('change', function() {
        var selectedOption = $(this).find(':selected');
        var namaPegawai = selectedOption.data('nama');
        var foto = selectedOption.data('foto');
        $('#namaPegawai').val(namaPegawai);
        $('#foto').val(foto);
    });
});