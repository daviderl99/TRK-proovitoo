document.addEventListener("DOMContentLoaded", () => {
  document
    .getElementById("registrationForm")
    .addEventListener("submit", (e) => {
      e.preventDefault();
      registerUser();
    });

  const registerUser = () => {
    let formData = new FormData(document.getElementById("registrationForm"));

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onload = () => {
      let response = JSON.parse(xhr.responseText);
      document.getElementById("message").innerHTML = response.message;
    };
    xhr.send(formData);
  };
});
