$('#emoji').click(function () {
    const title = $("#title").text().toLowerCase();
    let count = parseInt($('#count').text());
    count++;
    $('#count').text(count++);

    $.post("https://dylanwe.com/controller/updateClaps.php", {
		title: title
    });
});