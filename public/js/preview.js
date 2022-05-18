$(document).ready(function() {
    var brand = $("div[id=nav-status] input.logo-id")[ 0 ];
    brand.className += ' attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    var brand2 = $("div[id=nav-notification] input.logo-id")[ 0 ];
    brand2.className += ' attachment_upload';
    brand2.onchange = function() {
        document.getElementById('fakeUploadLogo2').value = this.value.substring(12);
    };

    var brand3 = $("div[id=nav-security-login] input.logo-id")[ 0 ];
    brand3.className += ' attachment_upload';
    brand3.onchange = function() {
        document.getElementById('fakeUploadLogo3').value = this.value.substring(12);
    };

  
});
