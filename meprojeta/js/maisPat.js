$(document).ready(function () {
    var todospat = $('.todospat').html();
    $(document).on('click', '#maisPat', function (e) {
        e.preventDefault();
        var i = $('.pat').length;
        var pat = todospat.replace(/\[[0\]]\]/g, '[' + i++ + ']');
        $('.todospat').append(pat);
    });

});


$(document).ready(function () {
    $(document).on('click', '#menosPat', function (e) {
        e.preventDefault();
          var x = document.querySelector('.todospat');
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

$(document).ready(function () {
      jQuery(".selectPats").change(function(){
            if(jQuery(this).val() !== 'null'){
            $('.invest').attr("required", true);
            $('.invest').removeAttr("disabled");
            $('#maisPat').removeAttr("disabled");
          }
          if(jQuery(this).val() === 'null'){
            $('#maisPat').attr("disabled",true);
            $('.invest').removeAttr("required");
            $('.invest').attr("disabled",true);
          }
    });


});
