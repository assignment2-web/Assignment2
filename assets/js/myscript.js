/*
    Make by Cao Khánh Nhật
*/

var count_question = 0;
var count_questions = [];

$('#add-question').on('click', function() {
    count_question++;
    newdiv = document.createElement("div");
    newlabel = document.createElement("label");
    newtextarea = document.createElement("textarea");
    newdiv2 = document.createElement("div");
    newa = document.createElement("a");
    newaremove = document.createElement("a");
    newa.innerHTML = "<span class='glyphicon glyphicon-plus add-question ' style='font-size:15px'>";
    newaremove.innerHTML = "<span class='glyphicon glyphicon-remove remove-question ' style='font-size:15px'>";
    newa.className = "add-question-item";
    newaremove.className = "remove-question-item";
    newa.href = "#";
    newtextarea.id = "question" + count_question;
    newdiv.className = "form-group";
    newdiv.id = "group-question" + count_question;
    newdiv2.className = 'form-group location-question';
    newdiv2.id = "location-question" + count_question;
    newlabel.innerHTML = "<p><strong>Câu hỏi số " + count_question + "<strong> </p>";
    newdiv.appendChild(newlabel);
    newdiv.appendChild(newa);
    newdiv.appendChild(newaremove);
    newdiv.appendChild(newtextarea);
    newdiv.appendChild(newdiv2);
    count_questions.push([count_question, 0]);
    $('#content').append(newdiv);

    //CKEDITOR.replace("question" + count_question);
});

$('#content').on('click', '.add-question-item', function() {

    var index = $(this).index(".add-question-item") + 1;
    var counter = count_questions[index - 1][1];
    counter++;
    count_questions[index - 1][1] = counter;
    newdiv = document.createElement("div");
    newdiv.className = "form-group";
    newdiv.id = "question" + index + "group-question-item" + counter;
    newlabel = document.createElement("label");
    newlabel.innerHTML = "<h4><label class='multi-choice'>Đáp án " + counter + " : <input type='radio'' name='dapan' ></label></h4>";
    newtextarea = document.createElement("textarea");
    newtextarea.id = "question" + index + "question-item" + counter;
    newdiv.appendChild(newlabel);
    newdiv.appendChild(newtextarea);
    $('#location-question' + index).append(newdiv);
    CKEDITOR.replace("question" + index + "question-item" + counter);

});







$('#content').on('click', '.remove-question-item', function() {

    var index = $(this).index(".remove-question-item") + 1;
    var counter = count_questions[index - 1][1];
    if (counter === 0) {
        alert('loi');
        return;
    }
    count_questions[index - 1][1] = counter - 1;
    $("#question" + index + "group-question-item" + counter).empty();
    $("#question" + index + "group-question-item" + counter).remove();

});

$('#done-question').on('click', function() {
    if (count_question === 0) {
        alert('loi ');
    } else {

    }
});

$('#remove-question').on('click', function() {

    if (count_question === 0) {
        alert('loi ');
        return;
    }
    var index = $(this).index(".remove-question-item") + 1;
    $('#group-question' + count_question).empty();
    $('#group-question' + count_question).remove();
    if (count_question === 0) {
        alert('loi ');

    } else {

    }
    count_question--;
});


$('#fab').click(function() {
    $('#fab-toggle').toggleClass('hidden');

});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

//$('.thumbnail').on('click', function() {
//    location.href = "../taode/modify.html";
//});