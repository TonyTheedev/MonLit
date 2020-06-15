const inpFile = document.getElementById('inpFile');
const previewContainer = document.getElementById('imagePreview');

inpFile.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function () {
            document.getElementById('prvImage').style.backgroundImage = "url('" + this.result + "')";
        });
        reader.readAsDataURL(file);
    } else {
        document.getElementById('prvImage').style.display = null;
        document.getElementById('prvImage').style.backgroundImage = "";
    }
});

$("#inpFile").change(function () {
    document.getElementById('toolsImage1').style.visibility = "visible";
    document.getElementById('toolInput1').style.visibility = "hidden";
});
