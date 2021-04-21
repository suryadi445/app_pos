// // fungsi klik
// $('document').ready(function() {
//     var inputText = $('#qty')
//     $('.btn').click(function() {
//         var btnVal = $(this).val()
//         var inputVal = inputText.val()
//         inputText.val(inputVal + btnVal)
//     })
// })


// fungsi clear
$('#hapus').ready(function() {
    $('#hapus').click(function() {
        var value = document.getElementById('qty').value;
        document.getElementById('qty').value = value.slice(0, value.length - 1);
    })
})

// perkalian jumlah menu dengan harga


