function form_registration_show() {
  document.getElementById('registration_form').style.display = "flex";
  document.getElementById('black_form').style.display = "flex";
}

function form_registration_close() {
  document.getElementById('registration_form').style.display = "none";
  document.getElementById('black_form').style.display = "none";
  document.getElementById('head_menu').style.display = "none";
}
