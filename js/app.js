function scrollIndicate() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById("progress").style.width = scrolled + "%";
}
$( window ).scroll(function() {
    scrollIndicate();
});

// $('body').html('<div class="loading"><h1 style="margin-top: 20vh">De website is binnenkort weer online.</h1><br><p style="font-size: 148px">🚧</p><div/>');