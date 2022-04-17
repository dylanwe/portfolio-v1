CKEDITOR.replace("editor1");

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function addHeaderSave() {
	preview();
}

function preview() {
	const output = document.querySelector("#output");
	const data = CKEDITOR.instances.editor1.getData();
	output.innerHTML = data;

	const id = $("#id").text();

	$.post("https://dylanwe.com/controller/updatePage.php", {
		id: id,
		content: data,
	});
	Prism.highlightAll();
}

Prism.highlightAll();

let typingTimer;



CKEDITOR.instances.editor1.on("change", function () {
	clearTimeout(typingTimer);
	typingTimer = setTimeout(doneTyping, 1000);
});

function doneTyping() {
	preview();
}

$("#img-button").click(function () {
	$("#img-container").show();
});
$("#black-bg").click(function () {
	$("#img-container").hide();
});

$("#upload-form").on('submit',(function (e) {
    e.preventDefault();
	$.ajax({
		url: "https://dylanwe.com/controller/uploadImage.php",
		type: "POST",
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function (response) {
			if (response === 'error') {
                console.log('error when uploading');
            } else {
				$("#img-list").html(response);
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})
            }
		},
		error: function (e) {
			console.log('fail');
		},
	});
}));

$('body').on('click', '.img img', function () {
	const value = $(this).attr("src");
    const $temp = $("<textarea>");
    $("body").append($temp);
    $temp.val(value).select();
    document.execCommand("copy");
    $temp.remove();
    $('.tooltip').html('<div class="arrow" style="left: 18px;"></div><div class="tooltip-inner">Copied!</div>');
    setTimeout(function () {
        $("#img-container").hide();
    }, 500);
})

$('#chosen-img').change(function () {
	const filename = document.getElementById("chosen-img").files[0].name;
	$('#label-chosen').text(filename);
});

$('#chosen-img').change(function () {
	const filename = document.getElementById("chosen-img").files[0].name;
	$('#label-chosen').text(filename);
});

$("#header-img").on("keyup paste" ,function () {
    const id = $("#id").text();
    const data = $("#header-img").val();
    $.post("https://dylanwe.com/controller/updateCtHeader.php", {
		id: id,
		img: data,
	});
	$('#preview-header').attr('src', data);
});

$("#project-type").on("change" ,function () {
    const id = $("#id").text();
    const projectType = $("#project-type").val();
    $.post("https://dylanwe.com/controller/updateProjectType.php", {
		id: id,
		projectType: projectType,
	});
});

$("#description").on("change" ,function () {
    const id = $("#id").text();
    const description = $("#description").val();

    $.post("https://dylanwe.com/controller/updateDescription.php", {
		id: id,
		description: description,
	});
});

$("#published").change(function () {
    const id = $("#id").text();
    const checked = $("#published").prop("checked");
    const bool = checked ? '1' : '0';
    $.post("https://dylanwe.com/controller/updatePublished.php", {
		id: id,
		bool: bool,
	});
});

$("#featured").change(function () {
    const id = $("#id").text();
    const checked = $("#featured").prop("checked");
    const bool = checked ? '1' : '0';
    $.post("https://dylanwe.com/controller/updateFeatured.php", {
		id: id,
		bool: bool,
	});
});

$("#delete-page").click(function () {
    const deletePage = confirm("Are you sure you want to delete this page?");
    if (deletePage) {
        const id = $("#id").text();
        $.post("https://dylanwe.com/controller/deletePage.php", {
            id: id,
        });
        window.location.href = "https://dylanwe.com/dashboard.php";
    }
})