//main upload photo
const mainProfileImg = document.querySelector("#main-profile-photo");
const mainProfileFile = document.querySelector("#mainProfileFile");
const mainUploadBtn = document.querySelector("#mainUploadBtn");

mainProfileFile.addEventListener("change", function () {
  const choosedFile = this.files[0];

  if (choosedFile) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      mainProfileImg.setAttribute("src", reader.result);
    });

    reader.readAsDataURL(choosedFile);
  }
});
