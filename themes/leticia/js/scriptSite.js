//---------------------------------------SCRIPT MOBILE------------------------------------------------------
$(document).ready(function () {
    $(".boxsidebarBtn").click(function () {
        $(".boxsidebar").toggleClass('active');
        $(".boxsidebarBtn").toggleClass('toggle');
    });
});