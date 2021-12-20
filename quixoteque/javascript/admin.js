//main upload photo
const mainProductImg = document.querySelector("#main-product-photo");
const mainProductFile = document.querySelector("#mainProductFile");
const mainUploadBtn = document.querySelector("#mainUploadBtn");

mainProductFile.addEventListener("change", function () {
  const choosedFile = this.files[0];

  if (choosedFile) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      mainProductImg.setAttribute("src", reader.result);
    });

    reader.readAsDataURL(choosedFile);
  }
});

// editable table
const form = document.querySelector("#productForm");
const tBody = document.querySelector("tbody");
const table = document.querySelector("table");

function onAddWebsite(e) {
  e.preventDefault();
  const name = document.getElementById("inputName").value;
  const category = document.getElementById("inputCategory").value;
  const size = document.getElementById("inputSize").value;
  const price = document.getElementById("inputPrice").value;
  const description = document.getElementById("inputDescription").value;
  tBody.innerHTML += `
  <tr>
      <td>
        <span class="table-image d-flex flex-column">
          <img
            class="product-img m-auto my-4"
            id="table-product-img"
            src="img/upload-image.png"
          />
          <input type="file" id="inputFile0" class="file" />
          <label
            class="shadow-sm border border-2 w-m-50 m-auto mb-3"
            for="inputFile0"
            id="uploadBtn"
            >Choose a file</label
          >
        </span>
      </td>
      <td class="pt-3-half align-middle" contenteditable="true">${name}</td>
      <td class="pt-3-half align-middle" contenteditable="true">${category}</td>
      <td class="pt-3-half align-middle" contenteditable="true">${size}</td>
      <td class="pt-3-half align-middle" contenteditable="true">${price}</td>
      <td class="pt-3-half align-middle" contenteditable="true">${description}</td>
      <td>
        <div class="
          table-edit-remove  
          d-flex
          flex-column
          justify-content-center
          align-items-center
          m-auto
          "
        >
          <button
              type="button"
              class="btn btn-success btn-rounded btn-sm my-3 w-75"
          >
             Edit
          </button>
          <button
            type="button"
            class="removeBtn btn btn-danger btn-rounded btn-sm my-3 w-75"
          >
            Remove
          </button>
        </div>
      </td>
    </tr>
  `;
}

function onDeleteRow(e) {
  if (!e.target.classList.contains("removeBtn")) {
    return;
  }

  const btn = e.target;
  btn.closest("tr").remove();
}

form.addEventListener("submit", onAddWebsite);
table.addEventListener("click", onDeleteRow);

//table upload photo
const tableImg = document.getElementById("#table-product-img");
const tableFile = document.getElementById("#inputFile0");
const tableUploadBtn = document.getElementById("#tableUploadBtn");

tableFile.addEventListener("change", function () {
  alert("hey");
  const choosedFile = this.files[0];

  if (choosedFile) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      tableImg.setAttribute("src", reader.result);
    });

    reader.readAsDataURL(choosedFile);
  }
});
