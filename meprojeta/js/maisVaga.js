$(document).ready(function () {
    var todasVagas = $('.todasvagas').html();
    $(document).on('click', '#maisVaga', function (e) {
        e.preventDefault();
        var i = $('.cadastro').length;
        var vaga = todasVagas.replace(/\[[0\]]\]/g, '[' + i++ + ']');
        $('.todasvagas').append(vaga);
    });
});


$(document).ready(function () {
    $(document).on('click', '#menosVaga', function (e) {
        e.preventDefault();
          var x = document.querySelector('.todasvagas');
          var y = x.children.length-1;
          if (y>0) x.children[y].remove();
          else document.getElementById('alert').style.display = 'block';
        });
});

$(document).ready(function () {
    $(document).on('click', '#butClose', function (e) {
        e.preventDefault();
        document.getElementById('alert').style.display = 'none';
    });

});
