var count_question = parseInt(document.getElementById('size-answer').value);

$('#add-question').on('click', function() {
    count_question++;
    var html = '<hr id="hr' + count_question + '"> ';
    html += '<div class = "form-group" id="incorrect-header' + count_question + '">';
    html += '<h2 class = " col-sm-4 col-sm-offset-2 text-left"> Đáp án sai ' + count_question + ' </h2> ';
    html += '</div>';
    html += '<div class = "form-group row" id="incorrect-row' + count_question + '">';
    html += '<label class = "control-label col-sm-2" for = "incorrect-question' + count_question + '" > Đáp án sai ' + count_question + ' </label> ';
    html += '<div class = "col-sm-10" >';
    html += '<input type = "text" class = "form-control" name="incorrectquestion[]" id = "incorrect-question' + count_question + '" required>';
    html += '</div> </div> ';
    $('#form-question').append(html);
});

$('#remove-question').on('click', function() {

    if (count_question <= 1) {
        return;
    }
    $('#hr' + count_question).remove();
    $('#incorrect-header' + count_question).empty();
    $('#incorrect-header' + count_question).remove();
    $('#incorrect-row' + count_question).empty();
    $('#incorrect-row' + count_question).remove();
    count_question--;


});


$('#fab').click(function() {
    $('#fab-toggle').toggleClass('hidden');

});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$('#submit').click(function(){
    for(i = 2; i <= count_question; i++){
        if($('#incorrect-question' + i).val().length == 0){
            var txt1 = "<p>Text.</p>";   
            $('#incorrect-question' + i).parent.append(txt1);
            return false;
        }
    }         
             
});
//
//$( "#frm-validate" ).submit(function( event ) {
//  event.preventDefault();
//    for(i = 2; i <= count_question; i++){
//        if($('#incorrect-question' + i).val().length == 0){
//            var txt1 = "<label id='incorrect-question-error'"+count_question+" class='error'' for='incorrect-question'"+count_question+">Câu trả lời sai phải có nội dung</label>";   
//            $('#incorrect-question' + i).parent().append(txt1);
//        }
//    }
//});

