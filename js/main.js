let btn_dropdow = document.getElementById("btn-dropdow");
let dropdow_nav = document.getElementById("dropdow-nav");
let btn_logout = document.getElementById("btn-logout");
let show = true;
if (btn_dropdow) {
  btn_dropdow.addEventListener("click", () => {
    if (show == true) {
      dropdow_nav.style.display = "block";
      show = false;
    } else {
      dropdow_nav.style.display = "none";
      show = true;
    }
  });
}

if (btn_logout) {
  btn_logout.addEventListener("click", () => {
    console.log(document.cookie);
    document.cookie =
      "user_login_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie =
      "user_login_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    //   document.cookie =
    //     "user_login_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC, path=/";
    //   document.cookie =
    //     "=; expires=Thu, 01 Jan 1970 00:00:00 UTC, path=/";
    window.location.href = "http://localhost/wordpress/";
  });
}
