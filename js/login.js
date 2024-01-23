document.addEventListener("DOMContentLoaded", () => {
  document
    .getElementById("loginForm")
    .addEventListener("submit", (e) => {
      e.preventDefault();
      loginUser();
    });

  const loginUser = () => {
    let formData = new FormData(document.getElementById("loginForm"));

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onload = () => {
      let response = JSON.parse(xhr.responseText);

      if (response.redirect) {
        window.location.href = response.redirect;
      } else {
        document.getElementById("message").innerHTML = response.message;
      }
    };
    xhr.send(formData);
  };
});
