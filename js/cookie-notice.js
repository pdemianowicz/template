// cookie-notice
function acceptCookie() {
  (document.cookie = "cookieaccepted=1; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/"),
    (document.getElementById("cookie-notice").style.visibility = "hidden");
}
document.cookie.indexOf("cookieaccepted") < 0 && (document.getElementById("cookie-notice").style.visibility = "visible");
