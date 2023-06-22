jQuery(document).ready(function($) {
    // Retrieve the value of the cookie
    var cookieValue = getCookie('stechbd-cookiecons');
    
    if (cookieValue === 'accepted') {
        $('div#stechbd-cookiecons').hide();
    }
    
    $('button#stechbd-cookiecons').click(function() {
        setCookie('stechbd-cookiecons', 'accepted');
    });
    
    // Function to set a cookie
    function setCookie(name, value) {
        var date = new Date();
        date.setTime(date.getTime() + (10 * 365 * 24 * 60 * 60 * 1000)); // Set expiration date to 10 years in the future
        var expires = 'expires=' + date.toUTCString();
        document.cookie = name + '=' + value + ';' + expires + ';path=/';
    }

    // Function to retrieve the value of a cookie
    function getCookie(name) {
        var cookieName = name + '=';
        var cookieArray = document.cookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        
        return null;
    }
});