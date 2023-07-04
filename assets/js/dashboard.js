
function preview(event) {

    document.querySelector('.preview').innerHTML = ""
    let file = event.target.files[0];

    let reader = new FileReader();

    reader.onload = function () {
        let imagePreview = document.querySelector('.preview')
        imagePreview.innerHTML = "";

        let img = document.createElement('img');
        img.src = reader.result;
        img.style.maxWidth = '100px';
        img.style.maxHeight = '100px';

        imagePreview.appendChild(img);
    }
 reader.readAsDataURL(file);

}